<?php

    /**
     * Class Artiste
     *
     * @author Carlos Vasquez
     * @version 1.0
     * @update 2015-12-10
     * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
     * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
     *
     */

    class Artiste {



        /**
         *
         * @var Int id Artiste (autoincrement)
        **/

        public $idArtiste;

        /**
         *
         * @var Char nom de Artiste
        **/

        public $nomArtiste;

        /**
         *
         * @var Char prenomArtiste
        **/

        public $prenomArtiste;

        /**
         *
         * @var Char Collectif
        **/

        public $collectif;

        /**
         *
         * @var Char url photo artiste
        **/

        public $photoArtiste;

        /**
         * @var BaseDDonnee Objet base de données qui permet la connexion
         */
        static $database;


        /**
         *
         * @brief set l'id d'un artiste
         */
        public function setIdArtiste($val) {

            $this->idArtiste=$val;
        }

        /**
         *
         * @brief set le nom d'artiste
         */

        public function setNomArtiste($val) {

            $this->nomArtiste=$val;

        }

        /**
         *
         * @brief set le prenom d'un artiste
         */

        public function setPrenomArtiste($val) {

            $this->prenomArtiste=$val;

        }
        /**
         *
         * @brief set le collectif d'un artiste
         */

        public function setCollectif($val) {

            $this->collectif=$val;

        }

        /**
         *
         * @brief set le chemin de la photo pour les artiste
         */

        public function setPhotoArtiste($val) {

            $this->photoArtiste=$val;

        }

        /**
         *
         * @brief get l'id de l'artiste
         */


        public function getIdArtiste() {

            echo $this->idArtiste;

        }
        
        /**
         *
         * @brief get le nom de l'artiste
         */
        
        public function getNomArtiste() {

            echo $this->nomArtiste;

        }
        
        /**
         *
         * @brief get le prenom de l'artiste
         */

        public function getPrenomArtiste() {

            echo $this->prenomArtiste;

        }
        
         /**
         * @brief get le collectif de l'artiste
         */

        public function getCollectif() {

            echo $this->collectif;

        }
        
         /**
         * @brief get les photo de l'artiste
         */

        public function getPhotoArtiste() {

            echo $this->photoArtiste;

        }



        /**
         * @brief Constructeur de la classe Artiste
         * @param INT $idArtiste
         * @param string $nomArtiste
         * @param string $prenomArtiste
         * @param string $collectif
         * @param string $photoArtiste
         * @author Carlos VASQUEZ          
         */

        public function __construct($idArtiste, $nomArtiste, $prenomArtiste, $collectif, $photoArtiste) {
            if (!isset(self::$database))
                self::$database = new pdoBDD();

                $this->idArtiste = $idArtiste;

                $this->nomArtiste = $nomArtiste;

                $this->prenomArtiste = $prenomArtiste;

                $this->collectif = $collectif;

                $this->photoArtiste = $photoArtiste;


        }

         /**
         * @brief Méthode qui affiche la liste des artistes
         * @author Carlos VASQUEZ          
         */

        public static function afficheListeArtiste()
        {

            self::$database->query("SELECT * FROM artiste ORDER BY Nom ASC" );

            $lignes = self::$database->resultset();

            foreach ($lignes as $ligne) {

                $unArtiste = new Artiste($ligne['IdArtiste'], $ligne['Nom'], $ligne['Prenom'], $ligne['Collectif'], $ligne['photoArtiste']);

                $listeArtiste[] = $unArtiste;
            }

            return $listeArtiste;
        }

        /**
         * @brief méthode qui affiche les artiste grace a leur idArtiste
         * @param int $idArtiste
         * @author Alexandre BOUET 
         */

        public static function afficheArtisteParId($idArtiste)
        {

            self::$database->query("SELECT Nom, Prenom, Collectif, photoArtiste FROM artiste WHERE IdArtiste = :idArtiste");

            //On lie les paramètres auxvaleurs
            self::$database->bind(':idArtiste', $idArtiste);

            $ligne = self::$database->uneLigne();

            return $ligne;

        }

        /**
         * @brief méthode qui affiche les artiste grace a leur oeuvres
         * @param string $titreOeuvre
         * @author Alexandre BOUET 
         */

        public static function afficheArtisteDuneOeuvre($idOeuvre)
        {

            self::$database->query("SELECT Nom, Prenom, Collectif, photoArtiste FROM artiste JOIN oeuvre ON artiste.IdArtiste = oeuvre.IdArtiste WHERE oeuvre.IdOeuvre = :idOeuvre");

            //On lie les paramètres auxvaleurs
            self::$database->bind(':idOeuvre', $idOeuvre);

            $ligne = self::$database->uneLigne();

            return $ligne;

        }

        /**
         * @brief méthode qui enregistre un artiste  dans la BD
         * @author Carlos VASQUEZ 
         */

        public function enregistreArtiste()
         {

            self::$database->query(" INSERT INTO artiste (IdArtiste, Nom, Prenom, Collectif, photoArtiste) values (:IdArtiste, :Nom, :Prenom, :Collectif, :photoArtiste)");

            //On lie les paramètres auxvaleurs
            self::$database->bind(':IdArtiste', $this->idArtiste);
            
            self::$database->bind(':Nom', $this->nomArtiste);

            self::$database->bind(':Prenom', $this->prenomArtiste);

            self::$database->bind(':Collectif', $this->collectif);

            self::$database->bind(':photoArtiste', $this->photoArtiste);

            self::$database->execute();
        }

        //Vérifier si un artiste existe dans la bd.

        public function existArtiste()
        {

            self::$database->query("SELECT * FROM artiste WHERE Nom=:Nom AND Prenom=:Prenom ");

            self::$database->bind(':Nom', $this->nomArtiste);

            self::$database->bind(':Prenom', $this->prenomArtiste);

            $lignes = self::$database->resultset();

            if (count($lignes) > 0)

                return true;

            else 

                return false;

        }

        //Récuperer l'id d'un artiste par son nom

        public function recuperIdArtiste($NomArtiste){

            self::$database->query("SELECT IdArtiste FROM artiste WHERE Nom = :NomArtiste");

            self::$database->bind(':NomArtiste', $NomArtiste);

            $lignes = self::$database->resultset();

            if (count($lignes))
              return $lignes[0]["IdArtiste"]; 
            else 
               return -1; 
         
        }

        /**
         * @brief méthode qui retourne le derniere ID
         * @author Carlos VASQUEZ 
         */

        public function recupererDernierId(){

          return (self::$database->dernierId());
        }
           
        /**
         * @brief méthode qui retourne le nom et prénom de l'artiste d'un oeuvre
         * @author Stéphane Leclerc
         */
     
        public function afficheArtisteUneOeuvre($idOeuvre)
        {
            self::$database->query("SELECT Nom, Prenom FROM artiste JOIN oeuvre ON artiste.IdArtiste = oeuvre.IdArtiste WHERE oeuvre.IdOeuvre = :IdOeuvre");
        
            self::$database->bind("IdOeuvre",$idOeuvre);
            
            $ligne = self::$database->uneLigne();
            return $ligne;


        }
        
            
         /**
         * @brief méthode qui change la catégorie d'une oeuvre
         * @author Stéphane Leclerc  
         * @author Alexandre BOUET  
         */

        public function metAjourArtisteUneOeuvre($idOeuvre, $idArtiste)
        {
             self::$database->query("UPDATE oeuvre SET oeuvre.IdArtiste = :idAritste WHERE oeuvre.IdOeuvre = :idOeuvre");

             self::$database->bind(":idOeuvre", $idOeuvre);
             self::$database->bind(":idAritste", $idArtiste);

             self::$database->execute();
        }
        
        
        /**
         * @brief Méthode qui affiche la liste des artistes sans photographie
         * @author Alexandre BOUET      
         */

        public static function afficheListeArtisteSansPhoto()
        {

            self::$database->query("SELECT * FROM artiste WHERE photoArtiste ='' ");

            $lignes = self::$database->resultset();

            foreach ($lignes as $ligne) {

                $unArtiste = new Artiste($ligne['IdArtiste'], $ligne['Nom'], $ligne['Prenom'], $ligne['Collectif'], $ligne['photoArtiste']);

                $listeArtiste[] = $unArtiste;
            }

            return $listeArtiste;
        }
        
        
         /**
         * @brief méthode qui ajoute une photographie d'artiste
         * @author Alexandre BOUET  
         */

        public function ajoutImageArtiste($idArtiste, $newFilePath)
        {
             self::$database->query("UPDATE artiste SET photoArtiste = :image WHERE IdArtiste =:idArtiste");

             self::$database->bind(":idArtiste", $idArtiste);
             self::$database->bind(":image", $newFilePath);

             self::$database->execute();
        }


    }

?>
