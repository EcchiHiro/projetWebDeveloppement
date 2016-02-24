<?php
    /**
     * Class Admin
     *
     * @author Cristian Manrique
     * @version 1.0
     * @update 2015-12-10
     * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
     * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
     *
     */
    class Admin {
        /*****************************************************
        ****** Attributs de la classe Adresse *************
        ******************************************************/
        /**
         *
         * @var Int id Admin (autoincrement)
        **/
        public $IdAdmin;
        /**
         *
         * @var varchar Login
        **/
        public $Login;
        /**
         *
         * @var varchar MD5 MotPasse
        **/
        public $MotPasse;
        /**
         * @var BaseDDonnee Objet base de données qui permet la connexion
         */
        static $database;
        /*****************************************************
            **Methodes de la class Adresse (setters)***
        ******************************************************/
        /**
         *
         * @brief set l'id de l'admin
         */
        public function setIdAdmin($val) {
            $this->IdAdmin=$val;
        }
        /**
         *
         * @brief set du MotPasse
         */
        public function setLogin($val) {
            $this->Login=$val;
        }
        /**
         *
         * @brief set du MotPasse
         */
        public function setMotPasse($val) {
            $this->MotPasse=$val;
        }
        /*****************************************************
            ***Methodes de la class Admin (getters)*******
        ******************************************************/
        public function getIdAdmin() {
            echo $this->IdAdmin;
        }
        public function getLogin() {
            echo $this->Login;
        }
        public function getMotPasse() {
            echo $this->MotPasse;
        }
        /**
         * @brief Constructeur de la classe Admin
         * @param INT $IdAdmin
         * @param string $Login
         * @param string $MotPasse
         */
        public function __construct($IdAdmin, $Login, $MotPasse) {
            if (!isset(self::$database))
                self::$database = new pdoBDD();
                $this->IdAdmin = $IdAdmin;
                $this->Login = $Login;
                $this->MotPasse = $MotPasse;
        }
        
        /**
        * @brief méthode qui retourne l'utilisateur dans la BDD selon le nom d'utilisateur
        */
        public static function UserNameBDD($Login)
        {
            self::$database->query( "SELECT Login FROM admin WHERE admin.Login = :Login");
            self::$database->bind(':Login', $Login);
            $ligne = self::$database->uneLigne();
            //utf8_encode($ligne);//convertir en utf8
            return $ligne['Login'];
        }
        
        /**
        * @brief méthode qui retourne le mot de passe encrypté selon le nom d'utilisateur
        */
        public function MotDePasse($Login)
        {
            //var_dump($Login);
            self::$database->query( "SELECT MotPasse FROM admin WHERE admin.Login = :Login");
            self::$database->bind(':Login', $Login);
            $ligne = self::$database->uneLigne();
            //utf8_encode($ligne);//convertir en utf8
            //var_dump($ligne['MotPasse']);
            return $ligne["MotPasse"];
            
        }
                    
        /**
         * @brief méthode qui retourne le dernier id
         * 
         */
        public function recupererDernierId(){
          return (self::$database->dernierId());
        }
    }
?>