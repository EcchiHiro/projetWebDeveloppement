<?php

/**
 * Controlleur AJAX. Ce fichier est la porte d'entrée des requêtes AJAX (XHR)
 * @author Jonathan Martel & Cristian Manrique
 * @version 1.0
 * @update 2013-03-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

    require_once("./config.php");


    // Mettre ici le code de gestion de la requête AJAX
    switch($_GET['requete'])
    {
        case 'rechercheParArtistes':
            rechercheParArtistes();
            break;
        case 'rechercheParCategorie':
            rechercheParCategorie();
            break;

        case 'rechercheParMateriaux':
            rechercheParMateriaux();
            break;

        case 'rechercheParArrondissements':
            rechercheParArrondissements();
            break;        
        case 'choixOeuvresNonValides':
            afficheInfoOeuvreNonValide();
            break;        

    }

    /**
     * @brief Méthode qui affiche la recherche d'oeuvres par artistes
     */

    function rechercheParArtistes()
    {

        $oVue = new Vue();

        // On recupere la valeur du select
        $idArtiste =$_POST['artistes'];

        //Nouvelle connection

        $artiste = new Artiste("","","","","","");
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","");
        $photoOeuvre = new photoOeuvre("","","","","","","","","","","","","","", "","","","");


        //Recherche Tous d'un artiste par $idArtiste
        $ResultatArtiste = $artiste->afficheArtisteParId($idArtiste);

        //Recherche le titre et les photos d'oeuvres par idArtiste
        $ResultatTitresPhotosOeuvres= $photoOeuvre->affichePhotosOeuvresParIdArt($idArtiste);

        //Nouvelle Vue dans Vue.Controler.php
        $oVue->afficheOeuvresParIdArtistes($ResultatArtiste, $ResultatTitresPhotosOeuvres);

    }

    /**
     * @brief Méthode qui affiche la recherche d'oeuvres par catégories
     */

    function rechercheParCategorie()
    {

        $oVue = new Vue();

        // On recupere la valeur du select
        $NomSousCat = $_POST['categorie'];

        //Nouvelles connections
        $categorie= new Categorie("", "", "", "", "", "");
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");         
        $photoOeuvre = new photoOeuvre("","","","","","","","","","","","","","", "","","","","");


        //Recherche Les photos d'oeuvres par $idCat
        $ResultatTitresPhotosOeuvres= $photoOeuvre->affichePhotosOeuvresParNomCat($NomSousCat);

        //Nouvelle Vue à partir du Vue.Controler.php
        $oVue->afficheOeuvresParNomCategorie($ResultatTitresPhotosOeuvres, $NomSousCat);
    }

    /**
     * @brief Méthode qui affiche la recherche d'oeuvres par matériaux
     */

    function rechercheParMateriaux()
    {
        $oVue = new Vue();

        // On recupere la valeur du select
        $NomMateriaux = $_POST['materiaux'];

        //Nouvelles connections
        $categorie= new Categorie("", "", "", "", "", "");
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");         
        $photoOeuvre = new photoOeuvre("","","","","","","","","","","","","","", "","","","","");


        //Recherche Les photos d'oeuvres par $idMat
        $ResultatTitresPhotosOeuvres= $photoOeuvre->affichePhotosOeuvresParNomMat($NomMateriaux);

        //Nouvelle Vue à partir du Vue.Controler.php
        $oVue->afficheOeuvresParNomMateriaux($ResultatTitresPhotosOeuvres, $NomMateriaux);

    }


    /**
     * @brief Méthode qui affiche la recherche d'oeuvres par Arrondissement
     */


    function rechercheParArrondissements()
    {
        $oVue = new Vue();
        // On recupere la valeur du select
        $NomArrond = $_POST['arrondissement'];


        //Nouvelles connections
        $categorie= new Categorie("", "", "", "", "", "");
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");         
        $photoOeuvre = new photoOeuvre("","","","","","","","","","","","","","", "","","","","");

        //Recherche Les photos d'oeuvres par nom d'arrondissement
        $ResultatTitresPhotosOeuvres= $photoOeuvre->affichePhotosOeuvresParNomArrond($NomArrond);

        //Nouvelle Vue à partir du Vue.Controler.php
        $oVue->afficheOeuvresParNomArrondissement($ResultatTitresPhotosOeuvres, $NomArrond);


    }     

    /**
     * @brief Méthode qui affiche les informations d'une oeuvre en attente de validation
     */

    function afficheInfoOeuvreNonValide()
    {
        $oVue = new VueAdmin();
        $oeuvre = new Oeuvre("", "", "", "" ,"" ,"", "", "", "", "", "", "", "","","","","");         

        // On recupere la valeur du select
        $idOeuvre = intval($_POST['idOeuvre']);

        $infoOeuvre= $oeuvre->afficheInfoOeuvreNonValide($idOeuvre);
        $oVue->chargeInfoOeuvre($infoOeuvre);


    }        

 







?>
