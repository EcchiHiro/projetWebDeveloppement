<?php

    /**
     * Class Materiaux
     *
     * @author Carlos Vasquez & Alexandre BOUET
     * @version 1.0
     * @update 2015-12-10
     * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
     * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
     *
     */

    class Materiaux {


        /**
         *
         * @var Int id Materiaux (autoincrement)
        **/

        public $idMat;

        /**
         *
         * @var Char nom de Materiaux
        **/

        public $nomMateriaux;

        /**
         *
         * @var Char nom materiauxEN
        **/

        public $nomMateriauxEN;

        /**
         * @var BaseDDonnee Objet base de données qui permet la connexion
         */
        static $database;


        /**
         *
         * @brief set l'id d'un Arrondissement
         */
        public function setIdMat($val) {

            $this->idMat=$val;
        }

        /**
         *
         * @brief set le nom de Materiaux
         */

        public function setNomMateriaux($val) {

            $this->nomMateriaux=$val;

        }

        /**
         *
         * @brief set le nom materiauxEN
         */

        public function setNomMateriauxEN($val) {

            $this->nomMateriauxEN=$val;

        }
        

        /**
         * @brief set l'id des matériaux
         */

        public function getIdMat() {

            echo $this->idMat;

        }
        
         /**
         * @brief set le nom des matériaux
         */

        public function getNomMateriaux() {

            echo $this->nomMateriaux;

        }
        
         /**
         * @brief set le nom des matériaux anglais
         */

        public function getNomMateriauxEN() {

            echo $this->nomMateriauxEN;

        }


        /**
         * @brief Constructeur de la classe Materiaux
         * @param INT $IdMat
         * @param string $nomMateriaux
         * @param string $nomMateriauxEN
         * @author Carlos VASQUEZ          
         */

        public function __construct($idMat, $nomMateriaux, $nomMateriauxEN) {

            if (!isset(self::$database))

                self::$database = new pdoBDD();

                $this->idMat = $idMat;

                $this->nomMateriaux = $nomMateriaux;

                $this->nomMateriauxEN = $nomMateriauxEN;

        }

        /**
         * @brief Méthode qui affiche la liste de toute matériaux
         * @author Carlos VASQUEZ 
         */


        public static function afficheListeMateriaux()
        {

            self::$database->query("SELECT * FROM materiaux");

            $lignes = self::$database->resultset();

            foreach ($lignes as $ligne) {

                $unMat = new Materiaux($ligne['IdMat'], $ligne['NomMateriaux'], $ligne['NomMateriauxEN']);

                $listeMat[] = $unMat;
            }

            return $listeMat;
        }

        /**
         * @brief Méthode qui affiche les matériaux d'une oeuvre
         * @param string $titreOeuvre
         * @author Alexandre BOUET          
         */


        public static function afficheListeMateriauxDuneOeuvre($idOeuvre)
        {

            self::$database->query("SELECT NomMateriaux, NomMateriauxEN FROM materiaux JOIN est_composee ON materiaux.IdMat = est_composee.IdMat JOIN oeuvre ON  oeuvre.IdOeuvre = est_composee.IdOeuvre WHERE  oeuvre.IdOeuvre = :idOeuvre");

            self::$database->bind(':idOeuvre', $idOeuvre);

            $lignes = self::$database->resultset();

            foreach ($lignes as $ligne) {

                $unMat = new Materiaux('', $ligne['NomMateriaux'], $ligne['NomMateriauxEN']);

                $listeMat[] = $unMat;
            }
            
            if (!empty($listeMat))
            {
                return $listeMat;
            }
        }

        /**
         * @brief méthode qui enregistre un materiaux  dans la BD
         * @author Carlos VASQUEZ  
         */

        public function enregistreMateriaux()
         {

            self::$database->query(" INSERT INTO materiaux (IdMat, NomMateriaux, NomMateriauxEN) values (:IdMat, :NomMateriaux, :NomMateriauxEN)");

            //On lie les paramètres auxvaleurs
            self::$database->bind(':IdMat', $this->idMat);
            
            self::$database->bind(':NomMateriaux', $this->nomMateriaux);

            self::$database->bind(':NomMateriauxEN', $this->nomMateriauxEN);   

            self::$database->execute();
        }

        /**
         * @brief méthode qui vérifie si un materiel existe  dans la BD
         * @author Carlos VASQUEZ  
         */

        public function existMateriaux()
        {

            self::$database->query("SELECT NomMateriaux FROM materiaux WHERE NomMateriaux= :NomMateriaux");

            self::$database->bind(':NomMateriaux', $this->nomMateriaux);

            $lignes = self::$database->resultset();

            if (count($lignes) > 0)

                return true;

            else 
                
                return false;

        }

        /**
         * @brief méthode qui récupere l'id d'un materiel par son nom
         * @author Carlos VASQUEZ  
         */

        public function recuperIdMatParNom($NomMateriaux){

            self::$database->query("SELECT IdMat FROM materiaux WHERE NomMateriaux= :NomMateriaux");

            self::$database->bind(':NomMateriaux', $NomMateriaux);

            $lignes = self::$database->resultset();

             if (count($lignes))
              return $lignes[0]["IdMat"]; 
            else 
               return -1; 

        }
        
        /**
         * @brief méthode qui affiche un materiaux  d'une oeuvre
         * @author Stéphane Leclerc  
         */
     
      public function afficherMaterielUneOeuvre($idOeuvre)
      {
          self::$database->query("SELECT materiaux.IdMat, NomMateriaux, NomMateriauxEN FROM materiaux JOIN est_composee ON materiaux.IdMat = est_composee.IdMat JOIN oeuvre ON  oeuvre.IdOeuvre = est_composee.IdOeuvre WHERE  oeuvre.IdOeuvre =:IdOeuvre");

          self::$database->bind("IdOeuvre",$idOeuvre);
          $lignes=self::$database->resultset();

          foreach($lignes as $ligne)
                   {
                
                      $unMateriauxOeuvre=new Materiaux($ligne["IdMat"],$ligne["NomMateriaux"],$ligne["NomMateriauxEN"]);

                   }
          
            if (!empty($unMateriauxOeuvre))
            {
                return $unMateriauxOeuvre;
            }
            

      }
     
         /**
         * @brief méthode qui met à jour  un materiaux  d'une oeuvre
         * @author Stéphane Leclerc  
         */
     
     public function metAjourMaterielUneOeuvre($idOeuvre, $idMat)
     {
                 self::$database->query("UPDATE est_composee SET IdMat =:IdMat WHERE est_composee.IdOeuvre = :IdOeuvre AND est_composee.IdMat = :IdMat;");

                 self::$database->bind(":IdOeuvre",$idOeuvre);
                 self::$database->bind(":IdMat",$idMat);

                 self::$database->execute();
             }
        

    }

?>
