<!--
Titre : M151 Forum Chapitre 2
Auteur : Jonathan Borel-Jaquet
Date : 07.11.2018
Description : class EDatabase qui retourne un objet PDO connecté à la base de données
Version 2.0
-->
<?php
require 'config.php';
/**
 * Retourne un objet PDO connecté à la base de données
 * @return \PDO
 */
class EDatabase {

    private static $pdoInstance;

    /**
     * @brief   Class Constructor - Créer une nouvelle connextion à la database si la connexion n'existe pas
     *          On la met en privé pour que personne puisse créer une nouvelle instance via ' = new EDatabase();'
     */
    private function __construct() {
        
    }

    /**
     * @brief   Comme le constructeur, on rend __clone privé pour que personne ne puisse cloner l'instance
     */
    private function __clone() {
        
    }

    /**
     * @brief   Retourne l'instance de la Database ou créer une connexion initiale
     * @return $objInstance;
     */
    public static function getInstance() {
        if (!self::$pdoInstance) {
            try {

                $dsn = EDB_DBTYPE . ':host=' . EDB_HOST . ';port=' . EDB_PORT . ';dbname=' . EDB_DBNAME;
                self::$pdoInstance = new PDO($dsn, EDB_USER, EDB_PASS, array('charset' => 'utf8'));
                self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "EDatabase Error: " . $e->getMessage();
            }
        }
        return self::$pdoInstance;
    }

# end method
    /**
     * @brief   Passes on any static calls to this class onto the singleton PDO instance
     * @param   $chrMethod      The method to call
     * @param   $arrArguments   The method's parameters
     * @return  $mix            The method's return value
     */

    final public static function __callStatic($chrMethod, $arrArguments) {
        $pdo = self::getInstance();
        return call_user_func_array(array($pdo, $chrMethod), $arrArguments);
    }

# end method
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

