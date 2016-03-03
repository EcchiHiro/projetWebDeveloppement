<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log
 *
 * @author caed0
 */
class Log {

    /**
    *
    * @var int $db_installe
   **/
    public $db_installe;
    
    /**
    *
    * @var int $date
   **/
    public $date;

    /**
     * @var BaseDDonnee Objet base de données qui permet la connexion
     */
    static $database;
    
    /**
    * @brief Constructeur de la classe log
    * @param INT $db_installe
    * @param string $date    
    */
    
    function __construct($db_installe, $date) {
        
       if (!isset(self::$database)){
           self::$database = new pdoBDD();
       }    
       
        $this->db_installe = $db_installe;
        $this->date = $date;
    }
    
    /**
    *
    * @brief get du db_installe
    */    
    function getDb_installe() {
        return $this->db_installe;
    }
    
    /**
    *
    * @brief get du date
    */
    function getDate() {
        return $this->date;
    }
    
    /**
    *
    * @brief set du db_installe
    */
    function setDb_installe($db_installe) {
        $this->db_installe = $db_installe;
    }
    
    /**
    *
    * @brief set du date
    */
    function setDate($date) {
        $this->date = $date;
    }
    
    /**
    * @brief méthode qui verifie si la bd est installée
    */
    
    public function estBdInstalle(){
        
        self::$database->query("SELECT db_installe FROM log WHERE db_installe = 1");

        $lignes = self::$database->resultset();

        if (count($lignes) > 0)

            return true;

        else 

            return false;
        
    }
    
    /**
    * @brief méthode qui enregistre un donner pour verifier si la bd est installée
    */
    
    public function enregistrer(){
     
            self::$database->query(" INSERT INTO log (db_installe) values (:bdInstalle)");

            self::$database->bind(':bdInstalle', $this->db_installe);  

            self::$database->execute();    
        
    }
}
