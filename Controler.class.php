 <?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 *
 * @author BOUET Alexandre
 * @version 1.0
 * @update 2013-12-10
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */
class Controler
{

        /**
         * Traite la requête
         * @return void
         */
        public function gerer()
        {

            switch ($_GET['page']) {
                case 'accueil':
                    $this->accueil();
                    break;
                case 'oeuvre':
                    $this->oeuvres();
                    break;
                case 'artistes':
                    $this->artistes();
                    break;
                case 'soumettre':
                    $this->soumettre();
                    break;
                case 'geolocalisation':
                    $this->geolocalisation();
                    break;
                case 'infoArtiste' :
                    $this->infoArtiste();
                    break;
                case 'infoOeuvre' :
                    $this->infoOeuvre();
                    break;
                case 'migration' :
                    $this->migration();
                    break; 
                case 'installBD' :
                    $this->installBD();
                    break;        
                case 'recherche' :
                    $this->recherche();
                    break;
                case 'admin' :
                    $this->admin();
                    break;
                case 'adminAjout' :
                    $this->adminAjoutOeuvre();
                    break;
                case 'adminModifSupp' :
                    $this->adminGereOeuvres();
                    break;
                case 'adminModif' :
                    $this->adminModifOeuvre();
                    break;                    
                case 'adminValide' :
                    $this->adminValideOeuvre();
                    break;
                case 'adminAjoutCat' :
                    $this->adminAjoutCat();
                    break;
                case 'adminSuppCat' :
                    $this->adminSuppCat();
                    break;                
                case 'login' :
                    $this->adminLogin();
                    break; 
                case 'detruireSession' :
                    $this->detruireSession();
                    break;                       
                case 'adminAjoutImgArt' :
                    $this->adminAjoutImageArtiste();
                    break;                  
                case 'adminAjoutImgCat' :
                    $this->adminAjoutImgCat();
                    break;                             
                case 'adminAjoutImgOeuvre' :
                    $this->adminAjoutImgPresentationOeuvre();
                    break; 
                case 'adminAjoutDescriptionArtiste':
                    $this->adminAjoutDescriptionArtiste();
                    break;
                default:
                    $this->accueil();
                    break;
            }
        }
    
     /**
     * @brief Méthode qui affiche la page d'accueil du site
     * @author Alexandre BOUET
     */

        private function accueil()
        {
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
            
            $oVue = new Vue();
            $cat= new Categorie("", "", "", "", "", "");
            //  Liste des categories
            $categories  = $cat->afficheCategories();
            $artiste = new Artiste("","","","","","");
            //Liste des artistes
            $artisteListe = $artiste->afficheListeArtiste();
            $mat = new Materiaux("","","");
            //liste des materiaux
            $listeMat = $mat->afficheListeMateriaux();
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            //Liste des arrondissements
            $listeArrondissement = $oeuvre->afficheListeArrondissement();
            $oVue->Vheader($geolocalisation);
            $oVue->afficheAccueil($categories, $artisteListe, $listeMat, $listeArrondissement);
            $oVue->Vfooter();


        }
    
     /**
     * @brief Méthode qui affiche la page d'oeuvres par catégories
     * @author Alexandre BOUET
     */

        private function oeuvres()
        {
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
            
            $erreur = '';
            $oVue = new Vue();
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $cat= new Categorie("", "", "", "", "", "");
            //Liste des Oeuvres par categories

            if (isset($_GET['categorie']))
            {
                 $idCat = intval($_GET['categorie']);
                try
                {
                    $listeOeuvresParCat = $oeuvre->afficheOeuvreParCategories($idCat);
                    $titreCat = $cat->afficheNomCategorieParIdCat($idCat);
                }
                catch (Exception $e)
                {
                    $erreur = $e->getMessage();
                }

                $oVue->Vheader($geolocalisation);
                $oVue->afficheOeuvres($listeOeuvresParCat, $erreur, $titreCat);
                $oVue->Vfooter();
            }


        }
    
     /**
     * @brief Méthode qui affiche la page de la liste des artistes
     * @author Carlos Vasquez
     */

        private function artistes()
        {
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
            
            $oVue = new Vue();
            $artiste = new Artiste("","","","","","");
            $artisteListe = $artiste->afficheListeArtiste();
            $oVue->Vheader($geolocalisation);
            $oVue->afficheArtistes($artisteListe);
            $oVue->Vfooter();


        }
    
     /**
     * @brief Méthode qui affiche et gerer la page de soumission d'oeuvre
     * @author Carlos Vasquez
     */
    
    private function soumettre()
    {

            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
        
        $oVue = new Vue();
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");


        //Liste des arrondissements
        $listeArrondissement = $oeuvre->afficheListeArrondissement();
     

         $cat= new Categorie("", "", "", "", "", "");
        //  Liste des categories
        $categories  = $cat->afficheCategories();

        $artistes=new Artiste("", "", "", "", "","");

        //  Liste des Artistes
        $listeArtistes=$artistes->afficheListeArtiste();

        $adresses=new Adresse("", "", "", "");

         //  Liste des Artistes
        $listeAdresses=$adresses->afficherListeAdresses();

        $materiaux=new Materiaux("", "", "");

         //  Liste des Artistes
        $listeAMateriaux=$materiaux->afficheListeMateriaux();

        $oVue->Vheader($geolocalisation);

        $oVue->afficheSoumettre($listeArrondissement, $categories, $listeArtistes, $listeAdresses, $listeAMateriaux);

        $oVue->Vfooter();


        if(isset($_POST['nomArtiste']))
            {

                $unArtiste=new Artiste("",$_POST['nomArtiste'], $_POST['PrenomArtiste'], $_POST['collectif'], "");

                $unArtiste->enregistreArtiste();

                if (isset($unArtiste))

                    echo 'Artiste inséré';

                else {

                    echo "Erreur lors de l'insertion";
                }
            }



        if(isset($_POST['titre']))
        {

            $unAdresse=new Adresse("",$_POST['nbRue'], $_POST['nomRue'], $_POST['ville']);

            $unAdresse->enregistreAdresse();

            $dernierIdAdresse=$unAdresse->recupererDernierId();


          $uneOeuvre = new Oeuvre("",$_POST["titre"], "","", "", "","","", $_POST["arrondissement"], $_POST["latitude"], $_POST["longitud"], "", $dernierIdAdresse, $_POST["artisteOeuvre"], $_POST["categorieOeuvre"], "","");

            $uneOeuvre->enregistreOuvres();
          
            $dernierIdOeuvre=$uneOeuvre->recupererDernierId();
      

            for($i=0; $i<count($_FILES['upload']['name']); $i++) {
              
              $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

              
              if ($tmpFilePath != ""){
                
                $newFilePath = 'images/oeuvres/' . $_FILES['upload']['name'][$i];

                
                if(!move_uploaded_file($tmpFilePath, $newFilePath)) {

                   echo "Erreur";

                }else{
                    $photoOeuvre= new photoOeuvre("","","","","","","","","","","","","", "","","","","$newFilePath","");
                    $photoOeuvre->enregistreEstPhoto();
                    $dernierIdPhoto=$photoOeuvre->recupererDernierId();
                    $photoOeuvre->enregistreEst_possede_photo($dernierIdOeuvre, $dernierIdPhoto);
                }
              }
            }

            if (isset($uneOeuvre))
            {
              echo 'Oeuvre insérée';
          
            }

                

            else {

                echo "Erreur lors de l'insertion";
            }
   
        }

    }

     /**
     * @brief Méthode qui affiche la page de géolocalisation
     * @author Alexandre BOUET
     */
    
        private function geolocalisation()
        {
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = true;
            $oVue = new Vue();
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $oeuvresCoordonnees = $oeuvre->recupLocalisationOeuvres();
            $docXML=$oeuvre->creationXMLCoordonnesOeuvres($oeuvresCoordonnees);
            $oVue->Vheader($geolocalisation);
            $oVue->afficheGeolocalisation($oeuvresCoordonnees);
            $oVue->Vfooter();
        }
    
     /**
     * @brief Méthode qui affiche la page de infomations des artistes
     * @author Alexandre BOUET
     */
    
        private function infoArtiste()
        {
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
            
            $oVue = new Vue();
            $oVue->Vheader($geolocalisation);
            // On recupere l'id de l'artiste passé en param
            $idArtiste = intval($_GET['artiste']);

            $artiste = new Artiste("","","","","","");
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");

           
            // Appel de la fonction d'affichage des informations d'un artiste grace à son id

            $artisteResultat = $artiste->afficheArtisteParId($idArtiste);
            // Affichage de toutes les oeuvres d'un artiste grace a son id.
            $oeuvresListe = $oeuvre->afficheOeuvreParArtiste($idArtiste);
            $oVue->afficheInfoArtiste($artisteResultat, $oeuvresListe);
            $oVue->Vfooter();
        }
    
     /**
     * @brief Méthode qui affiche la page d'information d'une oeuvre
     * @author Alexandre BOUET
     */

        private function infoOeuvre()
        {
            
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
            
            $oVue = new Vue();
            $oVue->Vheader($geolocalisation);
            // On recupere l'id de l'artiste passé en param
            $idOeuvre = $_GET['idOeuvre'];
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $oeuvreInfo = $oeuvre->afficheInformationsOeuvre($idOeuvre);
            $artiste = new Artiste("","","","","","");
            $artisteResultat = $artiste->afficheArtisteDuneOeuvre($idOeuvre);
            $mat = new Materiaux("","","");
            //liste des materiaux
            $listeMat = $mat->afficheListeMateriauxDuneOeuvre($idOeuvre);
            $cat = new Categorie("", "", "", "", "", "");
            //liste des materiaux
            $categorie = $cat->afficheCategorieDuneOeuvre($idOeuvre);
            $adresse = new Adresse("", "", "", "");
            //liste des materiaux
            $adresse = $adresse->afficheAdresseDuneOeuvre($idOeuvre);
            $photoOeuvre = new photoOeuvre("","","","","","","","","","","","","","", "","","", "","");
            //liste des materiaux
            $photosOeuvre = $photoOeuvre->affichePhotoOeuvre($idOeuvre);
            $oVue->afficheInfoOeuvre($oeuvreInfo, $artisteResultat, $listeMat, $categorie, $adresse, $photosOeuvre);
            $oVue->Vfooter();

        }

     /**
     * @brief Méthode qui affiche la page de recherche
     * @author Cristian Manrique
     */
    
        private function recherche()
        {
            // Boolean pour appeler ou non le script de geo
            $geolocalisation = false;
            
            $oVue = new Vue();

            // connection
            $cat= new Categorie("", "", "", "", "", "");
            //  Liste des categories
            $categories  = $cat->afficheCategories();

            // connection
            $artiste = new Artiste("","","","","","");
            //Liste des artistes
            $artisteListe = $artiste->afficheListeArtiste();

            // connection
            $mat = new Materiaux("","","");
            //liste des materiaux
            $listeMat = $mat->afficheListeMateriaux();

            // connection
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $photoOeuvre = new photoOeuvre("","","","","","","","","","","","","","", "","","", "","");

            // On recupere tous titres et les photos des oeuvres
            $resultatPhotoOeuvresEtTitre = $photoOeuvre->afficheToutesLesPhotos();


            //Liste des arrondissements
            $listeArrondissement = $oeuvre->afficheListeArrondissement();
            $oVue->Vheader($geolocalisation);
            $oVue->afficheRecherche($resultatPhotoOeuvresEtTitre, $categories, $artisteListe, $listeMat, $listeArrondissement);
            $oVue->Vfooter();

        }

     /**
     * @brief Méthode qui affiche la page d'accueil du pannel admin
     * @author Alexandre BOUET
     * @author Cristian MANRIQUE
     */
        private function admin()
        {
            //Si la variable session User existe            
            if($_SESSION["User"])
            {
                $oVue = new VueAdmin();
                $oVue->AdminTopPage();
                $oVue->adminNavSide();
                $oVue->adminMain();
                $oVue->AdminPiedPage();             
            }
            else
            {
                //Si non, rediriger vers Login
                header("Location: index.php?page=login");
            }
        }
    
    /**
    * @brief Méthode qui détruite la variable session lorsqu'on clique sur logout
    * @author Cristian MANRIQUE
    */
        private function detruireSession()
        {
            
            session_destroy();
            //Rediriger vers Login
            header("Location: index.php?page=accueil");
        }
    
      /**
     * @brief Méthode qui affiche la page login du pannel admin
     * @brief validation PHP de l'utilisateur et du mot de passe
     * @author Cristian MANRIQUE
     */
    
        private function adminLogin()
        {
            
            $oVue = new VueAdmin();
            $oVue->adminLogin();


            
                //valider si l'usager est authentifié. S'il l'est, le rediriger vers la vue admin
                if(isset($_POST["username"]) && isset($_POST["password"]))
                {		

                    //Connection à la class Admin de la BD
                    $admin = new Admin("", "", "");

                    //Chercher le MotPasse selon le nom de utilisateur
                    $motDePasseMD5 = $admin->MotDePasse($_POST["username"]);

                    //MotPass plus grainSel
                    $motDePassePlusGrainSel = md5($_SESSION["grainSel"] . $motDePasseMD5);

                    //Validation
                    if($_POST["password"] === $motDePassePlusGrainSel)
                    {
                        //créer la variable session "User" avec le nom d'utilisateur
                        $_SESSION["User"] = $_POST["username"];

                        //rediriger vers la vue admin
                        header("Location: index.php?page=admin");
                    }
                    
                    else
                    {
                        
                        //Afficher le message d'erreur
                         $_SESSION["message"]= "Votre combinaison utilisateur et mot de passe invalide.";

                    }     

                }
            
        }

    
     /**
     * @brief Méthode qui affiche la page d'ajout d'oeuvre du pannel admin
     * @author Stéphane LECLERC
     */
    
    private function adminAjoutOeuvre()
        {
        $oVue = new VueAdmin();
     
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");


        //Liste des arrondissements
        $listeArrondissement = $oeuvre->afficheListeArrondissement();


        $cat= new Categorie("", "", "", "", "", "");
        //  Liste des categories
        $categories  = $cat->afficheCategories();

        $artistes=new Artiste("", "", "", "", "","");

        //  Liste des Artistes
        $listeArtistes=$artistes->afficheListeArtiste();

    
            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminAjoutOeuvre($listeArrondissement, $categories, $listeArtistes);
            $oVue->AdminPiedPage();
        
      

        if(isset($_POST['nomArtiste']))
            {

                $unArtiste=new Artiste("",$_POST['nomArtiste'], $_POST['PrenomArtiste'], $_POST['collectif'], "","");

                $unArtiste->enregistreArtiste();

                if (isset($unArtiste))

                    echo 'Artiste inséré';

                else {

                    echo "Erreur lors de l'insertion";
                }
            }



        if(isset($_POST['titre']))
        {

            $unAdresse=new Adresse("",$_POST['nbRue'], $_POST['nomRue'], $_POST['ville']);

            $unAdresse->enregistreAdresse();

            $dernierIdAdresse=$unAdresse->recupererDernierId();


          $uneOeuvre = new Oeuvre("",$_POST["titre"], "","", "", "","","", $_POST["arrondissement"], $_POST["latitude"], $_POST["longitud"], "", $dernierIdAdresse, $_POST["artisteOeuvre"], $_POST["categorieOeuvre"], "","");

            $uneOeuvre->enregistreOuvresAdmin();
          
            $dernierIdOeuvre=$uneOeuvre->recupererDernierId();
      

            for($i=0; $i<count($_FILES['upload']['name']); $i++) {
              
              $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

              
              if ($tmpFilePath != ""){
                
                $newFilePath = 'images/oeuvres/' . $_FILES['upload']['name'][$i];

                
                if(!move_uploaded_file($tmpFilePath, $newFilePath)) {

                   echo "Erreur";

                }else{
                    $photoOeuvre= new photoOeuvre("","","","","","","","","","","","","", "","","","","$newFilePath");
                    $photoOeuvre->enregistreEstPhoto();
                    $dernierIdPhoto=$photoOeuvre->recupererDernierId();
                    $photoOeuvre->enregistreEst_possede_photo($dernierIdOeuvre, $dernierIdPhoto);
                }
              }
            }

            if (isset($uneOeuvre))
            {
              echo 'Oeuvre insérée';
          
            }

                

            else {

                echo "Erreur lors de l'insertion";
            }
   
        }

    }/*fin private*/
    
     /**
     * @brief Méthode qui affiche la page de gestion des oeuvres
     * @author Alexandre BOUET
     */

        private function adminGereOeuvres()
        {
            $oVue = new VueAdmin();
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $listeOeuvres=$oeuvre->afficheOeuvres();
            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminGereOeuvres($listeOeuvres);
            $oVue->AdminPiedPage();
            
            if(isset($_GET['idOeuvre']))
            {
                $idOeuvre = intval($_GET['idOeuvre']);
                $oeuvre->supprimerLienOeuvrePhoto($idOeuvre);
                $oeuvre->supprimerLienOeuvreMat($idOeuvre);
                $oeuvre->supprimerUneOeuvre($idOeuvre);
                
                echo '<script language="Javascript">
                 <!--
                 document.location.replace("index.php?page=adminModifSupp");
                 // -->
                 </script>';

            }

        }
    
        /**
         * @brief Méthode qui affiche la page de modification des oeuvres
         * @author Alexandre BOUET
         */

 private function adminModifOeuvre()
    {
        $oVue = new VueAdmin();

            $idOeuvre = intval($_GET['idOeuvre']);
     
            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $infoOeuvre= $oeuvre->afficherUneOeuvre($idOeuvre);
            
            $mat=new Materiaux("", "", "");
            $materiauxOeuvre=$mat->afficherMaterielUneOeuvre($idOeuvre);
            $listeMat=$mat->afficheListeMateriaux();
   
            if($materiauxOeuvre != null) 
            {
                $tableauInfoOeuvreMateriel=get_object_vars($materiauxOeuvre);   
            }

            
    
            
            $cat= new Categorie("", "", "", "", "", "");
            $categorieOeuvre=$cat->afficheCategorieUneOeuvre($idOeuvre);
            $categoriesListe  = $cat->afficheCategories();

            
            $artiste=new Artiste("", "", "", "", "","");
            $artisteOeuvre=$artiste->afficheArtisteUneOeuvre($idOeuvre);
            $listeArtiste = $artiste->afficheListeArtiste();
            
            $adresse =new Adresse("", "", "", "");
            $addresseOeuvre=$adresse->afficheAddresseUneOeuvre($idOeuvre);
     


            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminModifieOeuvre($infoOeuvre,$tableauInfoOeuvreMateriel,$categorieOeuvre,$artisteOeuvre,$addresseOeuvre, $categoriesListe, $listeArtiste, $listeMat);
            $oVue->AdminPiedPage();
       
            if((isset($_POST["valide"]))&&($_POST["valide"]=="modification"))
                
                {

                
                          $titre=$_POST["titre"];
                          $titreVariante=$_POST["titreVariante"];
                          $collection=$_POST["collection"];
                          $technique=$_POST["technique"];
                          $dimensions=$_POST["dimensions"];
                          $arrondissement=$_POST["arrondissement"];
                          $coordonneeLatitude=floatval($_POST["coordonneeLatitude"]);
                          $coordonneeLongitude=floatval($_POST["coordonneeLongitude"]);
                
                
                
                          $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
                          $oeuvre->modifieUneOeuvre($idOeuvre, $titre, $titreVariante,$collection, "",$technique,"", $dimensions,$arrondissement,$coordonneeLatitude, $coordonneeLongitude);

             
                          $idCat=intval($_POST["cat"]);

                          $cat->metAjourCategorieUneOeuvre($idOeuvre, $idCat);
                          

                          $idArtiste = intval($_POST["artiste"]);
                          $artiste->metAjourArtisteUneOeuvre($idOeuvre, $idArtiste);
                
                
                          $idMat = intval($_POST["mat"]);
                          $mat->metAjourMaterielUneOeuvre($idOeuvre, $idMat);
                
                          
                          $idAdresse = intval($_POST["idAdre"]);
                          $numRue = $_POST["numRue"];
                          $nomRue = $_POST["nomRue"];
                          $adresse->metAjourAdresseUneOeuvre($idAdresse, $numRue, $nomRue);  

                     
                            echo '<script language="Javascript">
                            <!--
                            document.location.replace("index.php?page=adminModifSupp");
                            // -->
                            </script>';
                    
            }

       
    }

        
    
         /**
         * @brief Méthode qui affiche la page de validation des oeuvres 
         * @author Alexandre BOUET
         */
    
    
    
      private function adminValideOeuvre()
            {
                $oVue = new VueAdmin();
                $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
                $listeOeuvres=$oeuvre->afficheOeuvresNonValides();
                $oVue->AdminTopPage();
                $oVue->adminNavSide();
                $oVue->adminValideOeuvre($listeOeuvres);
                $oVue->AdminPiedPage();
          
                if(isset($_POST['choixOeuvresNonValides']))
                {
                    $idOeuvre = intval($_POST['choixOeuvresNonValides']);    
                    $oeuvre->valideOeuvre($idOeuvre);
                    
                 echo '<script language="Javascript">
                 <!--
                 document.location.replace("index.php?page=admin");
                 // -->
                 </script>';
                    
                }

            }
    
        /**
         * @brief Méthode qui affiche la page dajout de catégorie
         * @author Alexandre BOUET
         */

        private function adminAjoutCat()
        {
            $oVue = new VueAdmin();

            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminAjoutCat();
            $oVue->AdminPiedPage();

            if((isset($_POST['nomCat'])&&(isset($_POST['nomCatEN']))))
            {

                $nomSousCat=$_POST['nomCat'];
                $nomSousCatEN=$_POST['nomCatEN'];
                $cat= new Categorie("", "", "", "", "", "");
                $cat->enregistreCategorie($nomSousCat, $nomSousCatEN);
                
                 echo '<script language="Javascript">
                 <!--
                 document.location.replace("index.php?page=admin");
                 // -->
                 </script>';
                

            }


        }

        /**
         * @brief Méthode qui affiche la page de suppression de catégorie
         * @author Alexandre BOUET
         */
    
        private function adminSuppCat()
        {
            $oVue = new VueAdmin();
            // connection
            $cat= new Categorie("", "", "", "", "", "");
            //  Liste des categories
            $categories  = $cat->afficheCategories();

            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminSuppCat($categories);
            $oVue->AdminPiedPage();

            
            if(isset($_POST['supprimeCategorie']))
            {
                $idCat = intval($_POST['supprimeCategorie']);
                try
                {
                    
                    $cat= new Categorie("", "", "", "", "", "");
                    $cat->supprimerCategorie($idCat);
                                    
                    echo '<script language="Javascript">
                    <!--
                    document.location.replace("index.php?page=admin");
                    // -->
                    </script>';
                    
                }
                catch (Exception $e)
                {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }

            }


        }

         /**
         * @brief Première Installation de la BDD (Pour mise à jour via JSON)
         * @author Carlos VASQUEZ
         */

        private function installBD(){

            $artistesNonIdentifie= new Artiste(-1, "non identifie", "", "", "","");
            $artisteNonIdentifie=$artistesNonIdentifie->enregistreArtiste();

            $materielsNonIdentifie= new Materiaux(-1, "non identifie", "");
            $materielNonIdentifie=$materielsNonIdentifie->enregistreMateriaux();

            $categoriesNonIdentifie= new Categorie(-1,"","","non identifie","","");
            $categorieNonIdentifie=$categoriesNonIdentifie->enregistreCategorieBD();

            $adressesNonIdentifie= new Adresse(-1, "non identifie", "", "");
            $adresseNonIdentifie=$adressesNonIdentifie->enregistreAdresse();
        }
    
    
         /**
         * @brief Import des données du JSON dans la BDD
         * @author Carlos VASQUEZ
         */
    
    
        private function migration()
        {

            $data = file_get_contents("http://donnees.ville.montreal.qc.ca/dataset/2980db3a-9eb4-4c0e-b7c6-a6584cb769c9/resource/18705524-c8a6-49a0-bca7-92f493e6d329/download/oeuvresdonneesouvertes.json");
            $ouvres = json_decode($data, true); 

            $this->remplirMateriaux($ouvres);

            $this->remplirArtiste($ouvres);

            $this->remplirCategorie($ouvres);

            foreach ($ouvres as $ouvre) {               

            //Recuperer les adresse.                

                $adressePartie= $this->obtenirAdress($ouvre["AdresseCivique"]);  
                $adresses = new Adresse("", $adressePartie["nbRue"], $adressePartie["rue"], "");
                
                $adresses->enregistreAdresse();

                $dernierIdAdresse=$adresses->recupererDernierId();

            //Recuperer les artistes.             


                 foreach ($ouvre["Artistes"] as $var) {
                     $nomArtiste=$var["Nom"];
                 }

                 $artiste=new Artiste("","","","","","");
                 $idArtiste=$artiste->recuperIdArtiste($nomArtiste);

            //Recuperer les categories. 

                $categorie= new Categorie("","","","","","");
                $idCategorie=$categorie->recuperIdCaT($ouvre["SousCategorieObjet"]);

                $ouvrePublique = new Oeuvre("", $ouvre["Titre"], $ouvre["TitreVariante"], $ouvre["NomCollection"], $ouvre["NomCollectionAng"], $ouvre["Technique"], $ouvre["TechniqueAng"], $ouvre["DimensionsGenerales"], $ouvre["Arrondissement"], $ouvre["CoordonneeLatitude"], $ouvre["CoordonneeLongitude"], "", $dernierIdAdresse, $idArtiste, $idCategorie, "","");
                
                if (!empty($ouvre["Titre"]) && !$ouvrePublique->existOuvres()) {
                    $ouvrePublique->enregistreOuvresAdmin(); 
                    $dernierIdOeuvre=$ouvrePublique->recupererDernierId();  
                    $materiauxParties =  $this->obtenirMateriauxOuvre($ouvre["Materiaux"]); 
                    $materiaux=new Materiaux("","","");
                    foreach ($materiauxParties as $nomMateriaux) {                        
                        $idMaterial=$materiaux->recuperIdMatParNom($nomMateriaux);                        
                        $ouvrePublique->enregistreEst_composee($dernierIdOeuvre, $idMaterial);
                    }
                   
               }
            }  
            header("location:index.php?page=admin");
        } 

         /**
         * @brief Obtention de l'adresse
         * @author Carlos VASQUEZ
         */

        private function obtenirAdress($adresse){

            $adressePartie = preg_split("/[,]+/", $adresse); 

            if(is_numeric($adressePartie[0])){
                return array("nbRue"=>$adressePartie[0], "rue"=>$adressePartie[1]);
            }else{
                return array("nbRue"=>"", "rue"=>$adressePartie[0]); 
            }           
        } 

         /**
         * @brief Fonction qui retourne les matériaux d'une oeuvre
         * @author Carlos VASQUEZ
         */

        private function obtenirMateriauxOuvre($materiaux){
            return  preg_split("/[;,]+/", $materiaux);
        }

         /**
         * @brief Function pour remplir la table matériaux
         * @author Carlos VASQUEZ
         */

        private function remplirMateriaux($ouvres){

            foreach ($ouvres as $ouvre) {

                 $materiauxParties =  $this->obtenirMateriauxOuvre($ouvre["Materiaux"]);   
                 $materiauxPartieEN = $this->obtenirMateriauxOuvre($ouvre["MateriauxAng"]); 
          
                 if (is_array($materiauxParties)) {

                 $taille = count($materiauxParties);
                                
                 for($index = 0; $index < $taille ; $index++){

                       if (isset($materiauxParties[$index])){
                          $matFr = $materiauxParties[$index];
                       }

                       if (isset($materiauxPartieEN[$index])){
                          $matEn = $materiauxPartieEN[$index];
                       } else {
                          $matEn = "";
                       }

                       $materiaux = new Materiaux("", $matFr, $matEn); 
                      if (!$materiaux->existMateriaux()){
                          $materiaux->enregistreMateriaux();   
                      } 
                       
                  }

              }   

            }    

        } 

         /**
         * @brief Function pour remplir la table artiste
         * @author Carlos VASQUEZ
         */

        private function remplirArtiste($ouvres){

            foreach ($ouvres as $ouvre){

                $artistes = $ouvre["Artistes"];
                foreach ($artistes as $artiste) {
                   
                    if (isset($artiste["NomCollectif"]))
                      $nomCollectif = $artiste["NomCollectif"];
                    else 
                       $nomCollectif = "";

                    if (isset($artiste["Nom"]))
                      $nom = $artiste["Nom"];
                    else 
                       $nom = "";

                     if (isset($artiste["Prenom"]))
                      $prenom = $artiste["Prenom"];
                    else 
                       $prenom = "";
                        
                    $artiste = new Artiste("", $nom, $prenom,$nomCollectif, "","");
                     if (!$artiste->existArtiste()){
                            $artiste->enregistreArtiste();  
                    }                          
                }

            }        

        }

         /**
         * @brief Fonction pour remplir la table catégorie
         * @author Carlos VASQUEZ
         */

        private function remplirCategorie($ouvres){
            
            foreach ($ouvres as $ouvre){

                $nomCategorie =  $ouvre["SousCategorieObjet"];   
                $nomCategorieEN = $ouvre["SousCategorieObjetAng"];

                $categories=new Categorie("","","",$ouvre["SousCategorieObjet"],$ouvre["SousCategorieObjetAng"],"");

                if (!empty($ouvre["SousCategorieObjet"]) && !$categories->existCategorie())
                    $categories->enregistreCategorie($ouvre["SousCategorieObjet"], $ouvre["SousCategorieObjetAng"]);                     
            }
        }
    
    
    
         /**
         * @brief Méthode qui affiche la page d'ajout de photo pour un artiste
         * @author Alexandre BOUET
         */
    
        private function adminAjoutImageArtiste()
        {
            $oVue = new VueAdmin();
            // connection
            $artistes=new Artiste("", "", "", "", "","");

            //  Liste des Artistes
            $listeArtistes=$artistes->afficheListeArtisteSansPhoto();

            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminAjoutImageArtiste($listeArtistes);
            $oVue->AdminPiedPage();
            
            if(isset($_POST['ajoutPhoto']))
            {
                
                $idArtiste = intval($_POST['ajoutPhoto']);
                

                $tmpFilePath = $_FILES['upload']['tmp_name'];
                $infosImg = getimagesize($_FILES['upload']['tmp_name']);
                
                    // On vérifie la taille de l'image
                    if(($infosImg[0] <= WIDTH_MAX_Artist) && ($infosImg[1] <= HEIGHT_MAX_Artist)) {    

                        if ($tmpFilePath != "")
                        {

                            $newFilePath = 'images/artistes/' . $_FILES['upload']['name'];

                            if(!move_uploaded_file($tmpFilePath, $newFilePath)) 
                            {

                                    echo "Erreur";

                            }

                            else

                            {
                                        $artistes->ajoutImageArtiste($idArtiste, $newFilePath);


                                        echo '<script language="Javascript">
                                        <!--
                                        document.location.replace("index.php?page=admin");
                                        // -->
                                        </script>';
                            }
                        }
                    
                    }

                    else 
                    {
                        echo "Image trop grande. Elle doit faire maximum 250*250";
                    }
        
        }


    }  
    
    
    
         /**
         * @brief Méthode qui affiche la page d'ajout de photo pour une catégorie
         * @author Alexandre BOUET
         */
    
        private function adminAjoutImgCat()
        {
            $oVue = new VueAdmin();

            $cat= new Categorie("", "", "", "", "", "");
            $categories=$cat->afficheListeCatSansPhoto();
        

            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminAjoutImageCat($categories);
            $oVue->AdminPiedPage();
            

            
            if(isset($_POST['ajoutPhoto']))
            {
                
                  $idCat = intval($_POST['ajoutPhoto']);                
                    
                  $y1=$_POST['top'];
                  $x1=$_POST['left'];
                  $w=$_POST['right'];
                  $h=$_POST['bottom'];
                  $image = $_FILES['upload']['tmp_name'];
                

                  list( $width,$height ) = getimagesize( $image );
                  $newwidth = 600;
                  $newheight = 400;

                  $thumb = imagecreatetruecolor( $newwidth, $newheight );
                  $source = imagecreatefromjpeg($image);

                  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                  imagejpeg($thumb,$image,100); 


                  $im = imagecreatefromjpeg($image);
                  $dest = imagecreatetruecolor($w,$h);

                  imagecopyresampled($dest,$im,0,0,$x1,$y1,$w,$h,$w,$h);
                  imagejpeg($dest,"images/categories/". $_FILES['upload']['name'], 100);
                  $newFilePath = "images/categories/". $_FILES['upload']['name'];
                
                  $cat->ajoutImageCat($idCat, $newFilePath);


                     echo '<script language="Javascript">
                     <!--
                     document.location.replace("index.php?page=admin");
                     // -->
                     </script>';
        
        }


    }  
    
         /**
         * @brief Méthode qui affiche la page d'ajout de photo pour l'image de présentation d'oeuvre
         * @author Alexandre BOUET
         */
    
        private function adminAjoutImgPresentationOeuvre()
        {
            $oVue = new VueAdmin();

            $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");
            $listeOeuvre=$oeuvre->afficheListeOeuvresSansPhotoPresentation();
            
            $oVue->AdminTopPage();
            $oVue->adminNavSide();
            $oVue->adminAjoutImagePresentationOeuvre($listeOeuvre);
            $oVue->AdminPiedPage();
            

            
            if(isset($_POST['ajoutPhoto']))
                {
                
                  $idOeuvre = intval($_POST['ajoutPhoto']);
                
                  $y1=$_POST['top'];
                  $x1=$_POST['left'];
                  $w=$_POST['right'];
                  $h=$_POST['bottom'];
                  $image = $_FILES['upload']['tmp_name'];
                

                  list( $width,$height ) = getimagesize( $image );
                  $newwidth = 600;
                  $newheight = 400;

                  $thumb = imagecreatetruecolor( $newwidth, $newheight );
                  $source = imagecreatefromjpeg($image);

                  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                  imagejpeg($thumb,$image,100); 


                  $im = imagecreatefromjpeg($image);
                  $dest = imagecreatetruecolor($w,$h);

                  imagecopyresampled($dest,$im,0,0,$x1,$y1,$w,$h,$w,$h);
                  imagejpeg($dest,"images/oeuvres/P_". $_FILES['upload']['name'], 100);
                  $newFilePath = "images/oeuvres/P_". $_FILES['upload']['name'];
                
                  $oeuvre->ajoutImagePresentation($idOeuvre, $newFilePath);


                     echo '<script language="Javascript">
                     <!--
                     document.location.replace("index.php?page=admin");
                     // -->
                     </script>';
                
                }


    }
    

    private function adminAjoutDescriptionArtiste()
    {
        $oVue = new VueAdmin();
        
        $artiste=new Artiste("", "", "", "", "","");
        $listeArtistes=$artiste->afficheListeArtiste();
        
        $oVue->AdminTopPage();
        $oVue->adminNavSide();
        $oVue->adminAjoutDescriptionArtiste($listeArtistes);
        $oVue->AdminPiedPage();
        
        if(isset($_POST['ajouteDescription']))
        {
          
                    try{
                        $idArtiste = intval($_POST["ajouteDescription"]);
                       
                        $descriptionArtiste=$_POST['descriptionArtiste'];
                        $artiste->ajoutDescriptionArtiste($idArtiste,$descriptionArtiste);
                      
                    }
                catch(Exception $e)
                {
                    $erreur=$e->getMessage();
                    echo $erreur;
                }
               
            
        }
       
        
            
        
    }

    


}//Fin controller

?>


































