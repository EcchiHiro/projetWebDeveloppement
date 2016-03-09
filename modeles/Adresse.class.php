<?php

    /**
     * Class Materiaux
     *
     * @author Alexandre BOUET
     * @version 1.0
     * @update 2015-12-10
     * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
     * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
     *
     */

    class Adresse {



        /**
         *
         * @var Int id Adresse (autoincrement)
        **/

        public $idAdresse;

        /**
         *
         * @var int NumRue
        **/

        public $numRue;

        /**
         *
         * @var Char Nom de la rue
        **/

        public $rue;

        /**
         *
         * @var Char Nom de la ville
        **/

        public $ville;

        /**
         * @var BaseDDonnee Objet base de données qui permet la connexion
         */
        static $database;


        /**
         * @brief set l'id d'une adresse
         */
        public function setIdAdresse($val) {

            $this->idAdresse=$val;
        }

        /**
         * @brief set le numero de la rue
         */

        public function setNumRue($val) {

            $this->numRue=$val;

        }

        /**
         * @brief set le nom de la rue
         */

        public function setRue($val) {

            $this->rue=$val;

        }

        /**
         * @brief set le nom de la ville
         */

        public function setVille($val) {

            $this->ville=$val;

        }



        /**
         * @brief get l'id de l'adresse
         */
        
        public function getIdAdresse() {

            echo $this->idAdresse;

        }
        /**
         *
         * @brief get le numero de rue
         */

        public function getNumRue() {

            echo $this->numRue;

        }
        /**
         *
         * @brief get le nom de la rue
         */

        public function getRue() {

            echo $this->rue;

        }

        /**
         *
         * @brief get le nom de la ville
         */
        public function getVille() {

            echo $this->ville;

        }


        /**
         * @brief Constructeur de la classe Adresse
         * @param INT $idAdresse
         * @param int $numRue
         * @param string $rue
         * @param string $ville
         * @author Alexandre BOUET
         */

        public function __construct($idAdresse, $numRue, $rue, $ville) {

            if (!isset(self::$database))

                self::$database = new pdoBDD();

                $this->idAdresse = $idAdresse;

                $this->numRue = $numRue;

                $this->rue = $rue;

                $this->ville = $ville;

        }

        /**
        * @brief méthode qui affiche toutes les catégories
        * @author Carlos VASQUEZ
        */

        public static function afficherListeAdresses()
        {

            self::$database->query("SELECT * FROM adresse");

            $lignes = self::$database->resultset();

            foreach ($lignes as $ligne) {

                $uneAdresse = new Adresse($ligne['IdAdresse'], $ligne['NumRue'], $ligne['Rue'], $ligne['Ville'] );

                $adresses[] = $uneAdresse;
            }

            return $adresses;
        }


        /**
         * @brief Méthode qui affiche les matériaux d'une oeuvre
         * @param string $titreOeuvre
         * @author Alexandre BOUET
         */


        public static function afficheAdresseDuneOeuvre($idOeuvre)
        {
            self::$database->query("SELECT NumRue, Rue, Ville FROM adresse JOIN oeuvre ON adresse.IdAdresse = oeuvre.IdAdresse WHERE oeuvre.IdOeuvre = :idOeuvre");

            self::$database->bind(':idOeuvre', $idOeuvre);

            $ligne = self::$database->uneLigne();

            return $ligne;
        }

        /**
         * @brief méthode qui enregistre une adresse  dans la BD
         * @author Carlos VASQUEZ
         */

        public function enregistreAdresse()
         {

            self::$database->query(" INSERT INTO adresse (IdAdresse, NumRue, Rue, Ville) values (:IdAdresse, :NumRue, :Rue, :Ville)");

            //On lie les paramètres auxvaleurs
            self::$database->bind(':IdAdresse', $this->idAdresse);
            
            self::$database->bind(':NumRue', $this->numRue);

            self::$database->bind(':Rue', $this->rue); 

            self::$database->bind(':Ville', $this->ville);  

            self::$database->execute();
        }

        /**
         * @brief méthode qui retourne le dernier id
         * @author Carlos VASQUEZ 
         */

        public function recupererDernierId(){

          return (self::$database->dernierId());
        }
        
             /**
         * @brief méthode qui retourne l'addresse d'une oeuvre
         * @author Stéphane Leclerc
         */

     public function afficheAddresseUneOeuvre($idOeuvre)
     {
            self::$database->query(" SELECT NumRue, Rue, Ville FROM adresse JOIN oeuvre ON adresse.IdAdresse = oeuvre.IdAdresse WHERE  oeuvre.IdOeuvre=:IdOeuvre");

            self::$database->bind("IdOeuvre",$idOeuvre);
            $ligne = self::$database->uneLigne();

            return $ligne;

     }
     
         /**
         * @brief méthode qui met à jour  une adresse  d'une oeuvre
         * @author Stéphane Leclerc  
         */

     public function metAjourAdresseUneOeuvre($idAdresse, $numRue, $nomRue)
     {
      self::$database->query("UPDATE adresse SET NumRue=:NumRue, Rue=:Rue WHERE adresse.IdAdresse =:idAdresse;");

      self::$database->bind(":idAdresse", $idAdresse);
      self::$database->bind(':NumRue', $numRue);
      self::$database->bind(':Rue', $nomRue); 
  

      self::$database->execute();
     }
        
        /**
         * @brief méthode qui transforme l'adresse en latitude longitude
         * @author Alexandre BOUET 
         * @return array 
         */    
        
    function getXmlCoordsFromAdress($adresseComplete)
    {
        $coords=array();
        $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
        // ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
        $request_url = $base_url . "address=" . urlencode($adresseComplete).'&sensor=false';
        $xml = simplexml_load_file($request_url) or die("url not loading");
        //print_r($xml);
        $coords['lat']=$coords['lon']='';
        $coords['status'] = $xml->status ;
        if($coords['status']=='OK')
        {
            $coords['lat'] = $xml->result->geometry->location->lat ;
            $coords['lon'] = $xml->result->geometry->location->lng ;
        }
        return $coords;
    }

 

}

?>
