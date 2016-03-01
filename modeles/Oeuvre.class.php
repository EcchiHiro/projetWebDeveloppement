<?php
/**
 * Class oeuvre
 *
 * @author Alexandre BOUET
 * @version 1.0
 * @update 2015-12-19
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */
class Oeuvre {
        /**
         *
         * @var Int id Oeuvre (autoincrement)
        **/
        public $idOeuvre;
        /**
         *
         * @var Char titre de l'oeuvre
        **/
        public $titre;
        /**
         *
         * @var Char variante du titre de l'oeuvre
        **/
        public $titreVariante;
        /**
         *
         * @var Char nom de collection de l'oeuvre
        **/
        public $collection;
        /**
         *
         * @var Char nom de collection de l'oeuvre en anglais
        **/
        public $collectionEN;
        /**
         *
         * @var Char technique utilisée pour créer l'oeuvre
        **/
        public $technique;
        /**
         *
         * @var Char technique utilisée pour créer l'oeuvre en anglais
        **/
        public $techniqueEN;
        /**
         *
         * @var float des dimensions de l'oeuvre
        **/
        public $dimensions;
        /**
         *
         * @var char de l'arrondissement ou est située l'oeuvre
        **/
        public $arrondissement;
        /**
         *
         * @var float des coordonnées en latitude de l'oeuvre
        **/
        public $coordonneeLatitude;
        /**
         *
         * @var float des coordonnées en longitude de l'oeuvre
        **/
        public $coordonneeLongitude;
        /**
         *
         * @var Boolean pour savoir si l'oeuvre à étée validée par l'administrateur du site
        **/
        public $estValide;
        /**
         *
         * @var int adresse de l'oeuvre
        **/
        public $idAdresse;
        /**
         *
         * @var int artiste de l'oeuvre
        **/
        public $idArtiste;
        /**
         *
         * @var int cat de l'oeuvre
        **/
        public $idCategorie;

        /**
        *
        * @var Char Photoprésentation
        **/
        public $photoPresentation;
    
        /**
        *
        * @var Char idMateriaux
        **/
        public $description;

        /**
        *
        * @var Char idMateriaux
        **/
        public $IdMateriaux; 
       
        /**
         * @var BaseDDonnee Objet base de données qui permet la connexion
         */
        static $database;
        //////SETTER
        /**
         *
         * @brief set l'id de l'oeuvre
         */
        public function setIdOeuvre($val) {
            $this->idOeuvre=$val;
        }
        /**
         *
         * @brief set le titre  de l'oeuvre
         */
        public function setTitre($val) {
            $this->titre=$val;
        }
        /**
         *
         * @brief set la variante du titre de l'oeuvre
         */
        public function setTitreVariante($val) {
            $this->titreVariante=$val;
        }
        /**
         *
         * @brief set la collection de l'oeuvre
         */
        public function setCollection($val) {
            $this->collection=$val;
        }
        /**
         *
         * @brief set la collection anglais de l'oeuvre
         */
        public function setCollectionEN($val) {
            $this->collectionEN=$val;
        }
        /**
         *
         * @brief set la technique utilisée pour la création de l'oeuvre
         */
        public function setTechnique($val) {
            $this->technique=$val;
        }
        /**
         *
         * @brief set la technique anglais utilisée pour la création de l'oeuvre
         */
        public function setTechniqueEN($val) {
            $this->techniqueEN=$val;
        }
        /**
         *
         * @brief set la dimension de l'oeuvre
         */
        public function setDimensions($val) {
            $this->dimensions=$val;
        }
        /**
         *
         * @brief set l'arrondissement de l'oeuvre
         */
        public function setArrondissement($val) {
            $this->arrondissement=$val;
        }
        /**
         *
         * @brief set coordonnées latitude de l'oeuvre
         */
        public function setCoordonneeLatitude($val) {
            $this->coordonneeLatitute=$val;
        }
        /**
         *
         * @brief set coordonnées longitude de l'oeuvre
         */
        public function setCoordonneeLongitude($val) {
            $this->coordonneeLongitude=$val;
        }
        /**
         *
         * @brief set validation de l'oeuvre
         */
        public function setEstValide($val) {
            $this->estValide=$val;
        }
        /**
         *
         * @brief set id adresse ouvre
         */
        public function setIdAdresse($val) {
            $this->idAdresse=$val;
        }
        /**
         *
         * @brief set id artiste l ouvre
         */
        public function setIdArtiste($val) {
            $this->idArtiste=$val;
        }
        /**
         *
         * @brief id categorie de l ouvre
         */
        public function setIdCategorie($val) {
            $this->idCat=$val;
        }
        /**
         *
         * @brief set photoPresentation
         */
        public function setPhotoPresentation($val) {
            $this->photoPresentation=$val;
        }
        /**
         *
         * @brief set description
         */
        public function setDescription($val) {
            $this->description=$val;
        }
        //////GETTER
        /**
         *
         * @brief get id de l'oeuvre
         */
        public function getIdOeuvre() {
            echo $this->idOeuvre;
        }
        /**
         *
         * @brief get titre de l'oeuvre
         */
        public function getTitre() {
            echo $this->titre;
        }
        /**
         *
         * @brief get titre variante de l'oeuvre
         */
        public function getTitreVariante() {
            echo $this->titreVariante;
        }
        /**
         *
         * @brief get la collection de l'oeuvre
         */
        public function getCollection() {
            echo $this->collection;
        }
        /**
         *
         * @brief get la collection de l'oeuvre anglais
         */
        public function getCollectionEN() {
            echo $this->collectionEN;
        }
        /**
         *
         * @brief get la technique utilisée pour créer l'oeuvre
         */
        public function getTechnique() {
            echo $this->technique;
        }
        /**
         *
         * @brief  get la technique utilisée pour créer l'oeuvre anglais
         */
        public function getTechniqueEN() {
            echo $this->techniqueEN;
        }
        /**
         *
         * @brief  get les dimensions de l'oeuvre 
         */
        public function getDimensions() {
            echo $this->dimensions;
        }
         /**
         *
         * @brief  get l'arrondissements de l'oeuvre 
         */
        public function getArrondissement() {
            echo $this->arrondissement;
        }
         /**
         *
         * @brief  get coordonnes Latitude
         */
        public function getCoordonneeLatitude() {
            echo $this->coordonneeLatitute;
        }
         /**
         *
         * @brief  get coordonnes longitude
         */
        public function getCoordonneeLongitude() {
            echo $this->coordonneeLongitude;
        }
         /**
         *
         * @brief  get la validation ou non de l'oeuvre
         */
        public function getEstValide() {
            echo $this->estValide;
        }
         /**
         *
         * @brief  get l'id de l'adresse de l'oeuvre
         */
        public function getIdAdresse($val) {
            echo $this->idAdresse=$val;
        }
         /**
         *
         * @brief  get l'id de l'artiste de l'oeuvre
         */
         public function getIdArtiste($val) {
            echo $this->idArtiste=$val;
        }
         /**
         *
         * @brief  get l'id de la catégorie de l'oeuvre
         */
        public function getIdCategorie($val) {
            echo $this->idCat=$val;
        }
         /**
         *
         * @brief  get l'adresse de la photo de présentation de l'oeuvre
         */
        public function getPhotoPresentation() {
        echo $this->photoPresentation;
        }
        /**
         *
         * @brief  get la description de l'oeuvre
         */
        public function getDescription($val) {
        echo $this->description=$val;
        }
        /**
         * @brief Constructeur de la classe ouvres
         * @param INT $idOeuvre
         * @param string $titre
         * @param string $titreVariante
         * @param string $collection
         * @param string $collectionEN
         * @param string $technique
         * @param string $techniqueEN
         * @param string $dimensions
         * @param string $arrondissement
         * @param float $coordonneeLatitude
         * @param float $coordonneeLongitude
         * @param Bool $estValide
         * @param INT $idAdresse
         * @param INT $idArtiste
         * @param INT $idCat
         * @param string $photoPresentation
         * @param string $description
         */
    public function __construct($idOeuvre, $titre, $titreVariante, $collection ,$collectionEN ,$technique, $techniqueEN, $dimensions, $arrondissement, $coordonneeLatitude, $coordonneeLongitude, $estValide, $idAdresse, $idArtiste, $idCat, $photoPresentation, $description) {
        if (!isset(self::$database))
            self::$database = new pdoBDD();
            $this->idOeuvre = $idOeuvre;
            $this->titre = $titre;
            $this->titreVariante = $titreVariante;
            $this->collection = $collection;
            $this->collectionEN = $collectionEN;
            $this->technique = $technique;
            $this->techniqueEN = $techniqueEN;
            $this->dimensions = $dimensions;
            $this->arrondissement = $arrondissement;
            $this->coordonneeLatitute = $coordonneeLatitude;
            $this->coordonneeLongitude = $coordonneeLongitude;
            $this->estValide = $estValide;
            $this->idAdresse = $idAdresse;
            $this->idArtiste = $idArtiste;
            $this->idCategorie = $idCat;
            $this->photoPresentation = $photoPresentation;
            $this->description = $description;
    }


    /**
     * @brief méthode qui affiche les informations des oeuvres valides et non valides
     */

    public static function afficheOeuvres()
    {

        self::$database->query("SELECT * FROM oeuvre");

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {

            $uneOeuvre=new Oeuvre($ligne["IdOeuvre"],$ligne["Titre"], $ligne["TitreVariante"], $ligne["Collection"], $ligne["CollectionEN"], $ligne["Technique"], $ligne["TechniqueEN"], $ligne["Dimensions"], $ligne["Arrondissement"], $ligne["CoordonneeLatitude"], $ligne["CoordonneeLongitude"], $ligne["EstValide"], $ligne["IdAdresse"],  $ligne["IdArtiste"], $ligne["IdCat"],"","");

            $LesOeuvres[] = $uneOeuvre;
        }

        return $LesOeuvres;

    }
    
    /**
     * @brief méthode qui affiche les informations des oeuvres valides
     * @param string $titreOeuvre
     */

    public static function afficheOeuvresValides()
    {

        self::$database->query("SELECT * FROM oeuvre WHERE estValide=1");

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {

            $uneOeuvre=new Oeuvre($ligne["IdOeuvre"],$ligne["Titre"], $ligne["TitreVariante"], $ligne["Collection"], $ligne["CollectionEN"], $ligne["Technique"], $ligne["TechniqueEN"], $ligne["Dimensions"], $ligne["Arrondissement"], $ligne["CoordonneeLatitude"], $ligne["CoordonneeLongitude"], $ligne["EstValide"], $ligne["IdAdresse"],  $ligne["IdArtiste"], $ligne["IdCat"],"","");

            $LesOeuvres[] = $uneOeuvre;
        }

        return $LesOeuvres;

    }
    
    /**
     * @brief méthode qui affiche les informations sur les oeuvres non validées
     */

    public static function afficheOeuvresNonValides()
    {

        self::$database->query("SELECT * FROM oeuvre WHERE estValide=0");

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {

            $uneOeuvre=new Oeuvre( $ligne["IdOeuvre"], $ligne["Titre"], $ligne["TitreVariante"], $ligne["Collection"], "", $ligne["Technique"], "", $ligne["Dimensions"], $ligne["Arrondissement"],"", "" , $ligne["EstValide"],"","","" ,"","");

            $LesOeuvres[] = $uneOeuvre;
        }

        if (!empty($LesOeuvres))
        {
            return $LesOeuvres;
        }

    }  
    
    /**
     * @brief méthode qui récupere les informations de l'oeuvre non validée
     * @param int $idOeuvre
     */

    public static function afficheInfoOeuvreNonValide($idOeuvre)
    {

        self::$database->query("SELECT * FROM oeuvre WHERE idOeuvre=:idOeuvre");
        self::$database->bind(':idOeuvre', $idOeuvre);
        $ligne = self::$database->uneLigne();
        return $ligne;

    }
    
    /**
     * @brief méthode qui récupere les informations de l'oeuvre non validée
     * @param int $idOeuvre
     */

    public static function valideOeuvre($idOeuvre)
    {

        self::$database->query("UPDATE oeuvre SET EstValide = 1 WHERE IdOeuvre = :idOeuvre;");
        self::$database->bind(':idOeuvre', $idOeuvre);
        self::$database->execute();


    }


    /**
     * @brief méthode qui affiche la liste des arrondissements
     */
    public static function afficheListeArrondissement()
    {
        self::$database->query("SELECT DISTINCT Arrondissement FROM oeuvre");
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
            $unArrondissement = new Oeuvre("", "", "", "" ,"" ,"", "", "", $ligne['Arrondissement'], "", "", "","","","","","");
            $listeArrondissement[] = $unArrondissement;
        }
        return $listeArrondissement;
    }
    
    /**
     * @brief méthode qui affiche les oeuvres par categorie
     * @param string $nomSousCat
     */
    public static function afficheOeuvreParCategories($idCat)
    {
        self::$database->query("SELECT IdOeuvre, Titre, photoPresentation  FROM oeuvre JOIN categorie ON oeuvre.IdCat = categorie.IdCat WHERE categorie.IdCat = :IdCat AND EstValide = 1");
        //On lie les paramètres auxvaleurs
        self::$database->bind(':IdCat', $idCat);
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
         $oeuvre = new Oeuvre($ligne['IdOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","","","",$ligne['photoPresentation'],"");
        $listeOeuvres[] = $oeuvre;
        }
        if (!empty($listeOeuvres))
        {
            return $listeOeuvres;
        }
    }
    
    /**
     * @brief méthode qui affichage les oeuvres d'un artiste donné
     * @param int $idArtiste
     */
    public static function afficheOeuvreParArtiste($idArtiste)
    {
        self::$database->query("SELECT IdOeuvre, Titre, photoPresentation FROM oeuvre JOIN artiste ON oeuvre.IdArtiste = artiste.IdArtiste WHERE artiste.IdArtiste = :idArtiste AND EstValide = 1");
        //On lie les paramètres aux valeurs
        self::$database->bind(':idArtiste', $idArtiste);
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
         $oeuvre = new Oeuvre($ligne['IdOeuvre'], $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","","","",$ligne['photoPresentation'],"");
        $listeOeuvres[] = $oeuvre;
        }
            return $listeOeuvres;
    }
    /**
     * @brief méthode qui affiche les informations d'une oeuvre donné
     * @param string $titreOeuvre
     */
    public static function afficheInformationsOeuvre($idOeuvre)
    {
        self::$database->query("SELECT * FROM oeuvre WHERE oeuvre.IdOeuvre = :idOeuvre");
        //On lie les paramètres aux valeurs
        self::$database->bind(':idOeuvre', $idOeuvre);
        $ligne = self::$database->uneLigne();
            return $ligne;
    }

    /**
     * @brief méthode soummet une nouvelle oeuvre dans la bdd
     */

    public function enregistreOuvres()
    {
        //On lie les paramètres auxvaleurs
        
        $db = self::$database->getDatabase();
        $titre =  $this->titre;
        $arrondissement =$this->arrondissement;
        $latitude =$this->coordonneeLatitute;
        $longitud =$this->coordonneeLongitude;
        $validation=0;
        $idAdresse=$this->idAdresse;
        $idArtiste =$this->idArtiste;
        $idCat=$this->idCategorie;
        $photoPresentation = "";


        $requete = $db->prepare("INSERT INTO oeuvre (Titre, Arrondissement, CoordonneeLatitude, CoordonneeLongitude, EstValide, IdAdresse, IdArtiste, IdCat, photoPresentation) values (?,?, ?, ?, ?, ?, ?, ?, ?)");

        $requete->execute(array($titre, $arrondissement, $latitude, $longitud, $validation, $idAdresse, $idArtiste, $idCat, $photoPresentation));


    }

    /**
     * @brief méthode qui vérifie si une oeuvre existe
     */

    public function existOuvres()
        {


            self::$database->query("SELECT Titre FROM oeuvre WHERE Titre= :Titre");

            self::$database->bind(':Titre', $this->titre);

            $lignes = self::$database->resultset();

            if (count($lignes) > 0)

                return true;

            else 

                return false;
        }


    /**
     * @brief méthode qui retourne le dernier id
     */

    public function recupererDernierId(){

      return (self::$database->dernierId());
    }

    /**
     * @brief méthode qui enregistre une oeuvre composee par des materiaux dans la BD
     * @param int $IdOeuvre
     * @param int $IdMat
     */

    public function enregistreEst_composee($IdOeuvre, $IdMat)
     {

        self::$database->query("INSERT INTO est_composee (IdOeuvre, IdMat) values (:IdOeuvre,:IdMat)");
        self::$database->bind(':IdOeuvre', $IdOeuvre);
        self::$database->bind(':IdMat', $IdMat);
        self::$database->execute();
    }

    /**
     * @brief méthode qui recupere les localisations des oeuvres de la base de donnée
     */

    public function recupLocalisationOeuvres()
    {

       self::$database->query("SELECT Titre, CoordonneeLatitude, CoordonneeLongitude FROM oeuvre");
        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {

            $oeuvreCoordonnees=new Oeuvre("",$ligne["Titre"], "", "", "", "", "", "","", $ligne["CoordonneeLatitude"], $ligne["CoordonneeLongitude"], "", "",  "", "","","");

            $oeuvresCoordonnes[] = $oeuvreCoordonnees;
        }

        return $oeuvresCoordonnes;

    }
    
        /**
     * @brief méthode qui modifier une oeuvre dans la BD
     *
     */

 public function modifieUneOeuvre($idOeuvre, $titre, $titreVariante,$collection, $collectionEN,$technique,$techniqueEN, $dimensions,$arrondissement,$coordonneeLatitude, $coordonneeLongitude)
    {
        self::$database->query("UPDATE oeuvre SET Titre=:titre, TitreVariante=:titreVariante, Collection=:collection, CollectionEN=:collectionEN, Technique=:technique, TechniqueEN=:techniqueEN, Dimensions=:dimensions, Arrondissement=:arrondissement, CoordonneeLatitude=:coordonneeLatitude, CoordonneeLongitude=:coordonneeLongitude WHERE IdOeuvre=:idOeuvre");

   
     self::$database->bind("idOeuvre",$idOeuvre);
     self::$database->bind('titre', $titre);
     self::$database->bind('titreVariante', $titreVariante);
     self::$database->bind('collection', $collection);
     self::$database->bind('collectionEN', $collectionEN);
     self::$database->bind('technique', $technique);
     self::$database->bind('techniqueEN',$techniqueEN);
     self::$database->bind('dimensions', $dimensions);
     self::$database->bind('arrondissement', $arrondissement);
     self::$database->bind('coordonneeLatitude', $coordonneeLatitude);
     self::$database->bind('coordonneeLongitude', $coordonneeLongitude);
 
        self::$database->execute();
    
    }
    
    /**
     * @brief méthode qui affiche une oeuvres
     * @param string $idOeuvre
     */
    public static function afficherUneOeuvre($idOeuvre)
    {
        self::$database->query("SELECT IdOeuvre, Titre, TitreVariante, Collection, CollectionEN, Technique, TechniqueEN, Dimensions, Arrondissement, CoordonneeLatitude, CoordonneeLongitude, EstValide, IdAdresse, IdArtiste, IdCat, photoPresentation, description FROM oeuvre WHERE IdOeuvre=:IdOeuvre");
        self::$database->bind("IdOeuvre",$idOeuvre);
        
        $ligne = self::$database->uneLigne();
        return $ligne;

    }


    /**
     * @brief méthode qui ajoute du XML contenant les localisations des oeuvres (pour google MAPS)
     * @param object contenant le titre et coordonnées de toutes les oeuvres de la BDD
     */

    public function creationXMLCoordonnesOeuvres($oeuvresCoordonnees)
    {


        $dom = new DOMDocument('1.0', 'UTF-8');
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);

        foreach ($oeuvresCoordonnees as $localisation)
        {
          // Ajoute du XML dans le DOM du document
          $node = $dom->createElement("marker");
          $newnode = $parnode->appendChild($node);
          $newnode->setAttribute("titre", utf8_encode($localisation->titre));
          $newnode->setAttribute("lat", utf8_encode($localisation->coordonneeLatitute));
          $newnode->setAttribute("lng", utf8_encode($localisation->coordonneeLongitude));

        }
        echo $dom->saveXML();
    }
    
    /**
     * @brief méthode qui supprime une oeuvre dans la BD
     * @param int $idOeuvre
     */

    public function supprimerUneOeuvre($idOeuvre)
    {
        self::$database->query("DELETE FROM oeuvre WHERE IdOeuvre=:idOeuvre");
        self::$database->bind("idOeuvre",$idOeuvre);

        self::$database->execute();
    }    

    /**
     * @brief méthode qui supprime le liens entre les tables matériaux et Oeuvres
     * @param int $idOeuvre
     */

    public function supprimerLienOeuvreMat($idOeuvre)
    {
        self::$database->query("DELETE FROM est_composee WHERE IdOeuvre =:idOeuvre");
        self::$database->bind("idOeuvre",$idOeuvre);

        self::$database->execute();
    }   

    /**
     * @brief méthode qui supprime le liens entre les tables possedePhoto et Oeuvres
     * @param int $idOeuvre
     */

    public function supprimerLienOeuvrePhoto($idOeuvre)
    {
        self::$database->query("DELETE FROM possede WHERE IdOeuvre =:idOeuvre ");
        self::$database->bind("idOeuvre",$idOeuvre);

        self::$database->execute();
    }
 
 /**
     * @brief méthode soummet une nouvelle oeuvre dans la bdd
     */

 public function enregistreOuvresAdmin()
 {
  //On lie les paramètres aux valeurs

  $db = self::$database->getDatabase();
  $titre =  $this->titre;
  $varianteTitre = $this->titreVariante;
  $collection =$this->collection;
  $collectionEN =$this->collectionEN;
  $technique =$this->technique;
  $techniqueEN =$this->techniqueEN;
  $dimensions =$this->dimensions;
  $arrondissement =$this->arrondissement;
  $latitude =$this->coordonneeLatitute;
  $longitud =$this->coordonneeLongitude;
  $validation=1;
  $idAdresse=$this->idAdresse;
  $idArtiste =$this->idArtiste;
  $idCat=$this->idCategorie;
  $photoPresentation = "";


  $requete = $db->prepare("INSERT INTO oeuvre (Titre, TitreVariante, Collection, CollectionEN, Technique, TechniqueEN, Dimensions, Arrondissement, CoordonneeLatitude, CoordonneeLongitude, EstValide, IdAdresse, IdArtiste, IdCat, photoPresentation) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

  $requete->execute(array($titre, $varianteTitre, $collection, $collectionEN, $technique, $techniqueEN, $dimensions, $arrondissement, $latitude, $longitud, $validation, $idAdresse, $idArtiste, $idCat, $photoPresentation));


 }
    
    
   /**
   * @brief Méthode qui affiche la liste des oeuvres sans photographies de présentation
   * @author Alexandre BOUET      
   */

    public static function afficheListeOeuvresSansPhotoPresentation()
    {

        self::$database->query("SELECT * FROM oeuvre WHERE photoPresentation = '' OR photoPresentation IS NULL");

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {

            $oeuvre = new Oeuvre($ligne['IdOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","","","",$ligne['photoPresentation'],"");
            $listeOeuvres[] = $oeuvre;
        }
        
        if (!empty($listeOeuvres))
        {
            return $listeOeuvres;
        }
    }
    
    
    /**
    * @brief méthode qui ajoute une photographie de présentation d'oeuvre
    * @author Alexandre BOUET  
    */

    public function ajoutImagePresentation($idOeuvre, $newFilePath)
       {
            self::$database->query("UPDATE oeuvre SET photoPresentation = :image WHERE IdOeuvre =:idOeuvre");

            self::$database->bind(":idOeuvre", $idOeuvre);
            self::$database->bind(":image", $newFilePath);

            self::$database->execute();
       }
       
    

}//Fin Class Oeuvre


/**
 * Class photoOeuvre extends oeuvre
 *
 * @author Alexandre BOUET
 * @version 1.0
 * @update 2015-12-19
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

class photoOeuvre extends Oeuvre
{

    /**
     *
     * @var Int id photo (autoincrement)
    **/

    public $idPhotographie;

    /**
     *
     * @var Char titre de l'oeuvre
    **/

    public $photo;

     /**
     * @var BaseDDonnee Objet base de données qui permet la connexion
     */
    static $database;

     /**
     *
     * @brief set l'id de la photographie
     */
    public function setIdPhotographie($val) {
        $this->idPhotographie=$val;
    }

    /**
     *
     * @brief set le titre  de l'oeuvre
     */

    public function setPhoto($val) {
        $this->photo=$val;

    }

    /**
     * @brief getIdPhotographie
     */

    public function getIdPhotographie() {
        echo $this->idPhotographie;

    }
     /**
     * @brief getPhoto
     */
    public function getPhoto() {
        return $this->photo;

    }
        /**
         * @brief Constructeur de la classe PhotoOeuvre
         * @param INT $idOeuvre
         * @param string $titre
         * @param string $titreVariante
         * @param string $collection
         * @param string $collectionEN
         * @param string $technique
         * @param string $techniqueEN
         * @param string $dimensions
         * @param string $arrondissement
         * @param float $coordonneeLatitude
         * @param float $coordonneeLongitude
         * @param Bool $estValide
         * @param INT $idAdresse
         * @param INT $idArtiste
         * @param INT $idCat
         * @param string $photoPresentation
         * @param INTO $idPhotographie
         * @param string $photo
         * @author Alexandre BOUET           
         */


    public function __construct($idOeuvre, $titre, $titreVariante, $collection ,$collectionEN ,$technique, $techniqueEN, $dimensions, $arrondissement, $coordonneeLatitude, $coordonneeLongitude, $estValide,$idAdresse, $idArtiste, $idCat, $photoPresentation, $description, $idPhotographie, $photo)
    {

        if (!isset(self::$database))
            self::$database = new pdoBDD();

            //:: on va chercher le parent (class oeuvres)
            parent::__construct($idOeuvre, $titre, $titreVariante, $collection ,$collectionEN ,$technique, $techniqueEN, $dimensions, $arrondissement, $coordonneeLatitude, $coordonneeLongitude, $estValide, $idAdresse, $idArtiste, $idCat, $photoPresentation,$description);

            $this->idPhotographie = $idPhotographie;
            $this->photo = $photo;
    }



    /**
     * @brief méthode qui affiche toute les photographies des oeuvres
     * @author Alexandre BOUET
     * @author Cristian MANRIQUE 
     */

    public static function afficheToutesLesPhotos()
    {
        self::$database->query("SELECT oeuvre.idOeuvre, oeuvre.Titre, oeuvre.photoPresentation FROM oeuvre WHERE EstValide = 1");

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {
            $unePhoto = new photoOeuvre ($ligne['idOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","", "","",$ligne['photoPresentation'] ,"","","");
            $ListePhotosOeuvres[] = $unePhoto;
        }

        if (!empty($ListePhotosOeuvres))
        {
            return $ListePhotosOeuvres;
        }
    }



    /**
     * @brief méthode qui affiche les photos d'une oeuvre par son titre
     * @param string $titreOeuvre
     * @author Alexandre BOUET       
     */

    public static function affichePhotoOeuvre($idOeuvre)
    {
        self::$database->query("SELECT Photo FROM photos JOIN possede ON photos.IdPhotographie = possede.IdPhotographie JOIN oeuvre ON  oeuvre.IdOeuvre = possede.IdOeuvre WHERE oeuvre.IdOeuvre = :idOeuvre");
        //On lie les paramètres aux valeurs
        self::$database->bind(':idOeuvre', $idOeuvre);
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
            $unePhoto = new photoOeuvre ("","","","","","","","","","","","","", "","","","",$ligne['Photo'],"");
                     $listePhoto[] = $unePhoto;
            }
        if (!empty($listePhoto))
        {
            return $listePhoto;
        }


    }


    /**
     * @brief méthode qui affiche une photo par id
     * @param int $idArtiste
     * @author Cristian MANRIQUE       
     */

    public static function affichePhotosOeuvresParIdArt($idArtiste)
    {
        self::$database->query("SELECT oeuvre.idOeuvre, oeuvre.Titre, oeuvre.photoPresentation FROM oeuvre JOIN artiste ON oeuvre.IdArtiste = artiste.IdArtiste WHERE oeuvre.IdArtiste=:idArtiste AND EstValide = 1");

        //On lie les paramètres aux valeurs
        self::$database->bind(':idArtiste', $idArtiste);

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {
            $unePhoto = new photoOeuvre ($ligne['idOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","", "","",$ligne['photoPresentation'] ,"","","");
            $ListePhotosOeuvres[] = $unePhoto;
        }

        if (!empty($ListePhotosOeuvres))
        {
            return $ListePhotosOeuvres;
        }
    }



    /**
     * @brief méthode qui affiche une photo par nom cat de la Categorie
     * @param string $NomSousCat
     * @author Cristian MANRIQUE       
     */

    public static function affichePhotosOeuvresParNomCat($NomSousCat)
    {
        self::$database->query("SELECT oeuvre.idOeuvre, oeuvre.Titre, oeuvre.photoPresentation FROM oeuvre JOIN categorie ON oeuvre.IdCat = categorie.IdCat WHERE categorie.NomSousCat =:NomSousCat AND EstValide = 1");
        //On lie les paramètres auxvaleurs
        self::$database->bind(':NomSousCat', $NomSousCat);
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
            $unePhoto = new photoOeuvre ($ligne['idOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","", "","",$ligne['photoPresentation'] ,"","","");
            $ListePhotosOeuvres[] = $unePhoto;
        }
        if (!empty($ListePhotosOeuvres))
        {
            return $ListePhotosOeuvres;
        }
    }



    /**
     * @brief méthode qui affiche une photo par id du Materiaux
     * @param string $NomMateriaux 
     * @author Cristian MANRIQUE      
     */

    public static function affichePhotosOeuvresParNomMat($NomMateriaux)
    {
        self::$database->query("SELECT oeuvre.idOeuvre, oeuvre.Titre, oeuvre.photoPresentation FROM oeuvre JOIN est_composee ON oeuvre.IdOeuvre = est_composee.IdOeuvre JOIN materiaux ON est_composee.IdMat = materiaux.IdMat WHERE materiaux.NomMateriaux=:NomMateriaux AND EstValide = 1");
        //On lie les paramètres auxvaleurs
        self::$database->bind(':NomMateriaux', $NomMateriaux);
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
            $unePhoto = new photoOeuvre($ligne['idOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","", "","",$ligne['photoPresentation'] ,"","","");
            $ListePhotosOeuvres[] = $unePhoto;
        }
        if (!empty($ListePhotosOeuvres))
        {
            return $ListePhotosOeuvres;
        }
    }

    /**
     * @brief méthode qui affiche une photo par le nom d'un arrondissement
     * @param int $NomArrond
     * @author Cristian MANRIQUE    
     */

    public static function affichePhotosOeuvresParNomArrond($NomArrond)
    {
        self::$database->query("SELECT oeuvre.idOeuvre, oeuvre.Titre, oeuvre.photoPresentation FROM oeuvre WHERE oeuvre.Arrondissement = :NomArrond AND EstValide = 1");
        //On lie les paramètres auxvaleurs
        self::$database->bind(':NomArrond', $NomArrond);
        $lignes = self::$database->resultset();
        foreach ($lignes as $ligne) {
            $unePhoto = new photoOeuvre($ligne['idOeuvre'],  $ligne['Titre'], "", "" ,"" ,"", "", "", "", "", "", "","", "","",$ligne['photoPresentation'] ,"","","");
            $ListePhotosOeuvres[] = $unePhoto;
        }
        if (!empty($ListePhotosOeuvres))
        {
            return $ListePhotosOeuvres;
        }
    }

    /**
     * @brief méthode qui enregistre une photo dans la BD
     * @author Carlos VASQUEZ     
     */

    public function enregistreEstPhoto()
     {

        self::$database->query(" INSERT INTO photos (Photo) values (:Photo)");
        self::$database->bind(':Photo', $this->photo);
        self::$database->execute();
    }

    /**
     * @brief méthode qui lie les foreing key dans la table possede. (On lie l'oeuvre avec ces photos)
     * @param int $IdOeuvre
     * @param int $IdPhotographie
     * @author Carlos VASQUEZ     
     */

    public function enregistreEst_possede_photo($IdOeuvre, $IdPhotographie)
     {

        self::$database->query(" INSERT INTO possede (IdOeuvre, IdPhotographie) values ($IdOeuvre, $IdPhotographie)");

        self::$database->execute();
    }

    /**
     * @brief méthode qui retourne le dernier id
     * @author Carlos VASQUEZ
     */

    public function recupererDernierId(){

      return (self::$database->dernierId());
    }
    
    
        
}





?>
