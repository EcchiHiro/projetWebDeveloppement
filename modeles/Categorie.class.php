<?php

/**
 * Class Categorie
 *
 * @author Alexandre BOUET
 * @version 1.0
 * @update 2015-12-10
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

class Categorie {


    /**
     *
     * @var Int id Categorie (autoincrement)
    **/

    public $idCat;

    /**
     *
     * @var Char nom de Categorie
    **/

    public $nomCat;

    /**
     *
     * @var Char nom anglais de Categorie
    **/

    public $nomCatEN;

    /**
     *
     * @var Char nom de SousCategorie
    **/

    public $nomSousCat;

    /**
     *
     * @var Char nom de SousCategorie en anglais
    **/

    public $nomSousCatEN;

    /**
     *
     * @var Char image de Categorie
    **/

    public $photoCat;


    /**
     * @var BaseDDonnee Objet base de données qui permet la connexion
     */
    static $database;

    /**
     *
     * @brief set l'id de Categorie
     */
    public function setIdCat($val) {

        $this->idCat=$val;
    }

    /**
     *
     * @brief set le nom de Categorie
     */

    public function setnomCat($val) {

        $this->nomCat=$val;

    }

    /**
     *
     * @brief set le nom anglais de Categorie
     */

    public function setnomCatEN($val) {

        $this->nomCatEN=$val;

    }

    /**
     *
     * @brief set le nom de Sous-Categorie
     */

    public function setnomSousCat($val) {

        $this->nomSousCat=$val;

    }
        /**
     *
     * @brief set le nom anglais de Sous-Categorie
     */

    public function setnomSousCatEN($val) {

        $this->nomSousCatEN=$val;

    }
     /**
     *
     * @brief set le chemin  de l'image de la  Categorie
     */

    public function setPhotoCat($val) {

        $this->photoCat=$val;

    }


     /**
     * @brief get l'id de la catégorie
     */

    public function getIdCat() {

        echo $this->idCat;

    }
     /**
     * @brief get le nom de la catégorie
     */
    public function getNomCat() {

        echo $this->nomCat;

    }
     /**
     * @brief get le nom de la catégorie en anglais
     */

    public function getNomCatEN() {

        echo $this->nomCatEN;

    }
    
     /**
     * @brief get le nom de la sous catégorie
     */


    public function getNomSousCat() {

        echo $this->nomSousCat;

    }
    
     /**
     * @brief get le nom de la sous catégorie en anglais
     */


    public function getNomSousCatEN() {

        echo $this->nomSousCatEN;

    }
    
     /**
     * @brief get le lien de la photo de la catégorie
     */

    public function getPhotoCat() {

        echo $this->photoCat;

    }


    /**
     * @brief Constructeur de la classe Categorie
     * @param INT $idCat
     * @param string $nomCat
     * @param string $nomCatEN
     * @param string $nomSousCat
     * @param string $nomSousCatEN
     * @param string $photoCat
     * @author Alexandre BOUET 
     */

    public function __construct($idCat, $nomCat, $nomCatEN, $nomSousCat ,$nomSousCatEN ,$photoCat) {
        if (!isset(self::$database))
            self::$database = new pdoBDD();

            $this->idCat = $idCat;

            $this->nomCat = $nomCat;

            $this->nomCatEN = $nomCatEN;

            $this->nomSousCat = $nomSousCat;

            $this->nomSousCatEN = $nomSousCatEN;

            $this->photoCat = $photoCat;

    }

    /**
     * @brief méthode qui affiche toutes les catégories
     * @author Alexandre BOUET 
     */

    public static function afficheCategories()
    {
        self::$database->query("SELECT *  FROM categorie");

        $lignes = self::$database->resultset();

        foreach ($lignes as $ligne) {

            $uneCategorie = new Categorie($ligne['IdCat'], "", "", $ligne['NomSousCat'], "", $ligne['PhotoCat']);

            $categories[] = $uneCategorie;

        }

        return $categories;
    }

    /**
    * @brief Méthode qui affiche la catégorie d'une oeuvre par le titre de l'oeuvre
    * @param string $titreOeuvre
    * @author Alexandre BOUET 
    */


        public static function afficheCategorieDuneOeuvre($idOeuvre)
        {
            self::$database->query("SELECT NomSousCat, NomSousCatEN FROM categorie JOIN oeuvre ON categorie.IdCat = oeuvre.IdCat WHERE oeuvre.IdOeuvre = :idOeuvre");

            self::$database->bind(':idOeuvre', $idOeuvre);

            $ligne = self::$database->uneLigne();

            return $ligne;

        } 
    
    /**
    * @brief Méthode qui affiche le nom de la catégorie par le idCat
    * @param int $idCat
    * @author Stéphane LECLERC 
    */


    public static function afficheNomCategorieParIdCat($idCat)
    {
        self::$database->query("SELECT * FROM categorie WHERE categorie.idCat=:idCat");

        self::$database->bind(':idCat', $idCat);

        $ligne = self::$database->uneLigne();

        return $ligne;

    }

    /**
     * @brief méthode qui enregistre une categorie  dans la BD
     * @param string $nomSousCat
     * @param string $nomSousCatEN
     * @author Stéphane LECLERC 
     */

    public function enregistreCategorie($nomSousCat, $nomSousCatEN)
       {

           self::$database->query(" INSERT INTO categorie (IdCat, NomSousCat, NomSousCatEN, PhotoCat) values (:IdCat, :NomSousCat, :NomSousCatEN, :PhotoCat)");

           //On lie les paramètres auxvaleurs
           self::$database->bind(':IdCat', "");

           self::$database->bind(':NomSousCat',$nomSousCat );

           self::$database->bind(':NomSousCatEN', $nomSousCatEN); 

           self::$database->bind(':PhotoCat', null);   

           self::$database->execute();
       }
       
       public function enregistreCategorieBD()
       {

           self::$database->query(" INSERT INTO categorie (IdCat, NomSousCat, NomSousCatEN, PhotoCat) values (:IdCat, :NomSousCat, :NomSousCatEN, :PhotoCat)");

           //On lie les paramètres auxvaleurs
           self::$database->bind(':IdCat', -1);

           self::$database->bind(':NomSousCat',$this->nomSousCat);

           self::$database->bind(':NomSousCatEN', $this->nomSousCatEN); 

           self::$database->bind(':PhotoCat', null);   

           self::$database->execute();
       }

    //Méthode qui vérifie si une categorie existe dans la bd

    public function existCategorie()
    {

        self::$database->query("SELECT NomSousCat FROM categorie WHERE NomSousCat= :NomSousCat");

        self::$database->bind(':NomSousCat', $this->nomSousCat);

        $lignes = self::$database->resultset();

        if (count($lignes) > 0)

            return true;

        else 

            return false;
    }

    //Méthode qui récupere l'id de la categorie par son nom

    public function recuperIdCaT($NomCategorie)
    {

        self::$database->query("SELECT IdCat FROM categorie WHERE NomSousCat= :NomSousCat");

        self::$database->bind(':NomSousCat', $NomCategorie);

        $lignes = self::$database->resultset();

        return $lignes[0]["IdCat"];

    }
    
    /**
     * @brief méthode qui supprime une categorie  dans la BD
     * @param int $idCat
     * @author Stéphane LECLERC      
     */

    public static function supprimerCategorie($idCat)
    {
        self::$database->query("DELETE FROM categorie WHERE IdCat= :idCat");

        self::$database->bind(':idCat', $idCat);

        self::$database->execute();
    }
    
     
     /**
     * @brief méthode qui supprime une categorie  dans la BD
     * @param int $idCat
     * @author Stéphane LECLERC      
     */

     public function afficheCategorieUneOeuvre($idOeuvre)
     {
            self::$database->query(" SELECT NomSousCat, NomSousCatEN FROM categorie JOIN oeuvre ON categorie.IdCat = oeuvre.IdCat WHERE oeuvre.idOeuvre =:IdOeuvre");

            self::$database->bind("IdOeuvre",$idOeuvre);
         
            $ligne = self::$database->uneLigne();

            return $ligne;


     }
    
    
         /**
         * @brief méthode qui change la catégorie d'une oeuvre
         * @author Stéphane Leclerc  
         * @author Alexandre BOUET  
         */

        public function metAjourCategorieUneOeuvre($idOeuvre, $idCat)
        {
         self::$database->query("UPDATE oeuvre SET oeuvre.IdCat = :idCat WHERE oeuvre.IdOeuvre = :idOeuvre");

         self::$database->bind(":idOeuvre",$idOeuvre);
         self::$database->bind(":idCat", $idCat);
        
         self::$database->execute();
        }
    
    
        /**
         * @brief Méthode qui affiche la liste des catégories sans photographie
         * @author Alexandre BOUET      
         */

        public static function afficheListeCatSansPhoto()
        {

            self::$database->query("SELECT * FROM categorie WHERE PhotoCat = '' OR PhotoCat IS NULL");

            $lignes = self::$database->resultset();

            foreach ($lignes as $ligne) {

                $uneCategorie = new Categorie($ligne['IdCat'], "", "", $ligne['NomSousCat'], "", $ligne['PhotoCat']);

                $categories[] = $uneCategorie;

            }
            if(!empty($categories)) 
            {
                return $categories;
            }
        }
    
         /**
         * @brief méthode qui ajoute une photographie de catégorie
         * @author Alexandre BOUET  
         */

        public function ajoutImageCat($idCat, $newFilePath)
        {
             self::$database->query("UPDATE categorie SET PhotoCat = :image WHERE IdCat =:idCat");

             self::$database->bind(":idCat", $idCat);
             self::$database->bind(":image", $newFilePath);

             self::$database->execute();
        }


}

?>
