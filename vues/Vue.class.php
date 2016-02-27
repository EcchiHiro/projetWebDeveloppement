<?php
/**
 * Class Vue
 *
 *
 * @author Jonathan Martel & BOUET Alexandre
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */


class Vue {



    /**
     * Affiche le header des pages
     * @access public
     * @author Alexandre BOUET
     */

public function Vheader($geolocalisation) {
        ?>
            <!DOCTYPE html>
            <html>


                <head>
            <!-- Favicon -->
                <link rel="shortcut icon" href="favicon.ico">

                <!-- Web Fonts -->
                <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

                <!-- CSS Global Compulsory -->
                <link rel="stylesheet" href="./bootStrap/assets/plugins/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="./bootStrap/assets/css/style.css">

                <!-- CSS Header and Footer -->
                <link rel="stylesheet" href="./bootStrap/assets/css/headers/header-default.css">
                <link rel="stylesheet" href="./bootStrap/assets/css/footers/footer-v1.css">

                <!-- CSS Implementing Plugins -->
                <link rel="stylesheet" href="./bootStrap/assets/plugins/animate.css">
                <link rel="stylesheet" href="./bootStrap/assets/plugins/line-icons/line-icons.css">
                <link rel="stylesheet" href="./bootStrap/assets/plugins/font-awesome/css/font-awesome.min.css">
                <link rel="stylesheet" href="./bootStrap/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
                <link rel="stylesheet" href="./bootStrap/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">

                <!-- CSS Theme -->
                <link rel="stylesheet" href="./bootStrap/assets/css/theme-colors/default.css" id="style_color">
                <link rel="stylesheet" href="./bootStrap/assets/css/theme-skins/dark.css">

                <!-- CSS Customization -->
                <link rel="stylesheet" href="./bootStrap/assets/css/custom.css">

                <script src="js/vendor/jquery-1.12.0.min.js"></script>
                <script src="js/main.js"></script>

                <title>Art public montreal</title>
                 <meta charset="UTF-8">
                </head>

                <body <?php if ($geolocalisation == true ){echo "onload='initialize()'";}?> class="header-fixed" >

                <div class="wrapper">
                    <!--=== Header ===-->
                    <div class="header">
                        <div class="container">
                            <!-- Logo -->
                                <a class="logo" href="index.php?page=accueil">
                                    <img src="images/site/logo.png" alt="Logo" id="logo">
                                </a>
                                <!-- End Logo -->
                            <!-- Topbar -->
                            <div class="topbar">
                                <ul class="loginbar pull-right">
                                    <li class="hoverSelector">
                                        <i class="fa fa-globe"></i>
                                        <a>Languages</a>
                                        <ul class="languages hoverSelectorBlock">
                                            <li class="active">
                                                <a href="#">English <i class="fa fa-check"></i></a>
                                            </li>
                                            <li><a href="#">French</a></li>
                                        </ul>
                                    </li>
                                    <li class="topbar-devider"></li>
                                    <li><a href="index.php?page=login">Login</a></li>
                                </ul>
                            </div>
                            <!-- End Topbar -->


                        <!-- Toggle get grouped for better mobile display -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                        </button>
                        <!-- End Toggle -->
                    </div><!--/end container-->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                        <div class="container">
                            <ul class="nav navbar-nav">

                                                            <li><a  href="index.php?page=accueil">Accueil</a></li>
                                                            <li><a  href="index.php?page=artistes">Artistes</a></li>
                                                            <li><a  href="index.php?page=geolocalisation">Géolocalisation</a></li>
                                                            <li><a  href="index.php?page=soumettre">Soumettre</a></li>
                                                            <li><a  href="index.php?page=recherche">Recherche</a></li>
                            </ul>                                

                </div><!--/end container-->
            </div><!--/navbar-collapse-->
        </div> <!--/header-->

            <?php

    }

    /**
     * Affiche le footer des pages
     * @access public
     * @author Alexandre BOUET     
     */
public function Vfooter() {
        ?>

             <!--=== Footer Version 1 ===-->
            <div class="footer-v1">
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <!-- About -->
                            <div class="col-md-3 md-margin-bottom-40">
                                <p>Notre site à pour but de répertorier les oeuvres publiques de la ville de Montréal.</p>
                                <p>Vous pouvez trouver lequelles sont proches de vous dans l'onglet géolocalisation</p>
                            </div><!--/col-md-3-->
                            <!-- End About -->


                            <!-- Link List -->
                            <div class="col-md-3 md-margin-bottom-40">
                                <div class="headline"><h2>Menu</h2></div>
                                <ul class="list-unstyled link-list">
                                    <li><a  href="index.php?page=accueil">Accueil</a></li>
                                    <li><a  href="index.php?page=artistes">Artistes</a></li>
                                    <li><a  href="index.php?page=geolocalisation">Géolocalisation</a></li>
                                    <li><a  href="index.php?page=soumettre">Soumettre</a></li>
                                    <li><a  href="index.php?page=recherche">Recherche</a></li>
                                </ul>
                            </div><!--/col-md-3-->
                            <!-- End Link List -->

                            <!-- Address -->
                            <div class="col-md-3 map-img md-margin-bottom-40">
                                <div class="headline"><h2>Contactez nous</h2></div>
                                <address class="md-margin-bottom-40">
                                    Formation Continue <br />
                                    2030, boul. Pie-IX, Bur. 430 <br />
                                    Montréal, QC <br />
                                    Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>
                                </address>
                            </div><!--/col-md-3-->
                            <!-- End Address -->
                        </div>
                    </div>
                </div><!--/footer-->

                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    2016 &copy; All Rights Reserved. Alexandre, Stéphane, Carlos, Cristian
                                </p>
                            </div>

                            <!-- Social Links -->
                            <div class="col-md-6">
                                <ul class="footer-socials list-inline">
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Social Links -->
                        </div>
                    </div>
                </div><!--/copyright-->
            </div>
            <!--=== End Footer Version 1 ===-->
        </div><!--/wrapper-->

        <!-- JS Global Compulsory -->
        <script type="text/javascript" src="./bootStrap/assets/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="./bootStrap/assets/plugins/jquery/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="./bootStrap/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Implementing Plugins -->
        <script type="text/javascript" src="./bootStrap/assets/plugins/back-to-top.js"></script>
        <script type="text/javascript" src="./bootStrap/assets/plugins/smoothScroll.js"></script>
        <script type="text/javascript" src="./bootStrap/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
        <!-- JS Customization -->
        <script type="text/javascript" src="./bootStrap/assets/js/custom.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="./bootStrap/assets/js/app.js"></script>
        <script type="text/javascript" src="./bootStrap/assets/js/plugins/cube-portfolio/cube-portfolio-3.js"></script>
        <script type="text/javascript" src="./bootStrap/assets/js/plugins/style-switcher.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                App.init();
                StyleSwitcher.initStyleSwitcher();
            });
        </script>
                          <!-- Piwik Analyse des visites -->
                        <script type="text/javascript">
                          var _paq = _paq || [];
                          _paq.push(["setCookieDomain", "*.e1495102.webdev.cmaisonneuve.qc.ca"]);
                          _paq.push(['trackPageView']);
                          _paq.push(['enableLinkTracking']);
                          (function() {
                            var u="//ecchihiro.piwikpro.com/";
                            _paq.push(['setTrackerUrl', u+'piwik.php']);
                            _paq.push(['setSiteId', 1]);
                            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
                          })();
                        </script>
                        <noscript><p><img src="//ecchihiro.piwikpro.com/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
                        <!-- End Piwik Code -->
        <!--[if lt IE 9]>
            <script src="assets/plugins/respond.js"></script>
            <script src="assets/plugins/html5shiv.js"></script>
            <script src="assets/plugins/placeholder-IE-fixes.js"></script>
        <![endif]-->

        </body>
        </html>

        <?php

    }


    /**
     * Affiche la page d'accueil
     * @access public
     * @param Array $categorie
     * @param Array $artisteListe
     * @param Array $listeMat
     * @param Array $listeArrondissement
     * @author Alexandre BOUET     
     */


public function afficheAccueil($categories, $artisteListe, $listeMat, $listeArrondissement) {
        ?>


 
    <!--=== Breadcrumbs v3 ===--> 

    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>

    <!--=== End Breadcrumbs v3 ===-->
         <!--=== Cube-Portfdlio ===-->
    <div class="cube-portfolio container margin-bottom-60">
        <h1 class="formHeader">Recherche par Catégories</h1>
        <div id="grid-container" class="cbp-l-grid-agency">
                     <?php
                    foreach ($categories as $cat)
    
                    {
                        echo "<div class='cbp-item graphic'>";
                        echo "<div class='cbp-caption'>";
                            echo "<div class='cbp-caption-defaultWrap'>";
                    
                            if ($cat->photoCat != "")
                            {
                               echo  "<img class='imgCategorie' src='$cat->photoCat' alt='imgCat'>";
                            }
                            else
                            {
                               echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                            }
                            echo "</div>";
                        
                        echo "<div class='cbp-caption-activeWrap'>";
                            echo "<div class='cbp-l-caption-alignCenter'>";
                                echo "<div class='cbp-l-caption-body'>";
                                    echo "<ul class='link-captions'>";
                                        echo "<li><a href='index.php?page=oeuvre&categorie=$cat->idCat'><i class='rounded-x fa fa-search'></i></a></li>";
                                    echo "</ul>";
                                    echo "<div class='cbp-l-grid-agency-title'>$cat->nomSousCat</div>";
                              echo  "</div>";
                        echo "</div>" ;
                        echo "</div>";    
                        echo "</div>";    
                        echo "</div>";    
                    }
    
                ?>
        </div><!--/end Grid Container-->
    </div>
    <!--=== End Cube-Portfdlio ===-->
</div><!--/wrapper-->



        <?php

    }


    /**
     * Affiche la page des oeuvres par catégories
     * @access public
     * @param Array $listeOeuvresParCat
     * @param string $erreur
     * @author Alexandre BOUET     
     */

public function afficheOeuvres($listeOeuvresParCat, $erreur, $titreCat) {
        ?>

           
    <!--=== Breadcrumbs v3 ===--> 
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
    <!--=== End Breadcrumbs v3 ===-->
         <!--=== Cube-Portfdlio ===-->
    <div class="cube-portfolio container margin-bottom-60">
        <h1>Catégorie : <?php echo $titreCat["NomSousCat"];?></h1>
        <div id="grid-container" class="cbp-l-grid-agency">
                     <?php
                if (!empty($listeOeuvresParCat))
                {
                    foreach ($listeOeuvresParCat as $oeuvre)
    
                    {
                        echo "<div class='cbp-item graphic'>";
                        echo "<div class='cbp-caption'>";
                            echo "<div class='cbp-caption-defaultWrap'>";
                    
                            if ($oeuvre->photoPresentation != null)
                            {
                                echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                            }
                            else
                            {
                               echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                            }
                            echo "</div>";
                        
                        echo "<div class='cbp-caption-activeWrap'>";
                            echo "<div class='cbp-l-caption-alignCenter'>";
                                echo "<div class='cbp-l-caption-body'>";
                                    echo "<ul class='link-captions'>";
                                        echo "<li><a href='index.php?page=infoOeuvre&idOeuvre=$oeuvre->idOeuvre'><i class='rounded-x fa fa-search'></i></a></li>";
                                    echo "</ul>";
                                    echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                              echo  "</div>";
                        echo "</div>" ;
                        echo "</div>";    
                        echo "</div>";    
                        echo "</div>";    
                       
                    }
                }
                

                ?>

        </div><!--/end Grid Container-->
    </div>
    <!--=== End Cube-Portfdlio ===-->
</div><!--/wrapper-->

<?php            if (empty($listeOeuvresParCat))
                {
                    echo" <div class='alert alert-warning fade in'>";
                        echo "<strong>Il n'existe pas d'oeuvres pour cette catégorie</strong>";
                    echo "</div>";
                
                }
?>


        <?php

    }



    /**
     * Affiche la page de la liste des artistes
     * @access public
     * @param Array $artisteListe
     * @author Carlos VASQUEZ     
     */

public function afficheArtistes($artisteListe) {
        ?>
           
    <!--=== Breadcrumbs v3 ===--> 
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
    <div class="cube-portfolio container margin-bottom-60">

                    <h1 class="formHeader">Liste des noms d'artistes</h1>
                    <ul>
                        <?php
                            foreach($artisteListe as $artiste){
                         ?>
                            <li>
                                <a href="index.php?page=infoArtiste&artiste=<?php echo $artiste->idArtiste; ?>"><?php echo $artiste->nomArtiste ." ". $artiste->prenomArtiste;?></a>
                            </li>
                        <?php } ?>
                    </ul>

        </div>



        <?php

    }

    /**
     * Affiche la page de la liste des artistes
     * @access public
     * @param Array $oeuvreListe
     * @param Array $artisteResultat
     * @author Alexandre BOUET  
     */

public function afficheInfoArtiste($artisteResultat, $oeuvresListe) {
        ?>
              <?php $photoArtiste = $artisteResultat["photoArtiste"];?>                 
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
    <!--=== End Breadcrumbs v3 ===-->

    <!--=== Container Part ===-->
    <div class="container" >
        <div class="content">
            <div class="row margin-bottom-60">
                <div class="col-sm-8">
                    <div class="headline">
                        <h3>Informations : <?php echo $artisteResultat['Nom'] .' '.  $artisteResultat['Prenom']; ?></h3>
                    </div>
                     <ul class="list-unstyled project-details">
                        <?php 

                        if ($photoArtiste != "")
                        {
                           echo  "<img class='imgArtiste' src='$photoArtiste' alt='imgArtiste'>";
                        }

                        else
                        {
                           echo "<img class='imgArtiste' src='./images/artistes/default.png' alt='imgArtiste'>";
                        }
                        ?>

                    </ul>
                </div>
                  <!--=== Cube-Portfdlio ===-->
                <div class="cube-portfolio container margin-bottom-60">
                   <div class="headline">
                     <h3>Liste des oeuvres de <?php echo $artisteResultat['Nom'] .' '.  $artisteResultat['Prenom']; ?></h3>
                  </div>
                    <div id="grid-container" class="cbp-l-grid-agency">
                                 <?php
                            if (!empty($oeuvresListe))
                            {
                                foreach ($oeuvresListe as $oeuvre)

                                {
                                    echo "<div class='cbp-item graphic'>";
                                    echo "<div class='cbp-caption'>";
                                        echo "<div class='cbp-caption-defaultWrap'>";

                                        if ($oeuvre->photoPresentation != null)
                                        {
                                            echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                                        }
                                        else
                                        {
                                           echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                                        }
                                        echo "</div>";

                                    echo "<div class='cbp-caption-activeWrap'>";
                                        echo "<div class='cbp-l-caption-alignCenter'>";
                                            echo "<div class='cbp-l-caption-body'>";
                                                echo "<ul class='link-captions'>";
                                                    echo "<li><a href='index.php?page=infoOeuvre&titreOeuvre=$oeuvre->titre'><i class='rounded-x fa fa-search'></i></a></li>";
                                                echo "</ul>";
                                                echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                                          echo  "</div>";
                                    echo "</div>" ;
                                    echo "</div>";    
                                    echo "</div>";    
                                    echo "</div>";    

                                }
                            }
                            ?>
                        </div>
                    </div>
            </div>
    <!--=== End Container Part ===-->
        </div><!--/end Grid Container-->
    </div>
    <!--=== End Cube-Portfdlio ===-->

        <?php

    }



    /**
     * Affiche la page du formulaire de soumission des oeuvres
     * @access public
     * @param Array $listeArrondissement
     * @param Array $categories
     * @param Array $artistes
     * @param Array $listeAdresses
     * @param Array $listeAMateriaux
     * @author Alexandre BOUET 
     * @author Carlos VASQUEZ 
     */
    
public function afficheSoumettre($listeArrondissement, $categories, $artistes,  $listeAdresses, $listeAMateriaux) {
        ?>
        
<!--=== Breadcrumbs v3 ===--> 
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
    <!--=== End Breadcrumbs v3 ===-->

         <!--=== Cube-Portfdlio ===-->
         
    <div class="cube-portfolio container margin-bottom-60">
        <h3 class="formHeader" >Remplissez le formulaire pour nous soumettre votre oeuvre</h3>
        <div class="panel panel-blue margin-bottom-40">
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tasks"></i>Soumettre une oeuvre</h3>
                </div>
                    <div class="panel-body vueNormale">

                        <form action="index.php?page=soumettre" method="post" name="form2" style="display:none" id="form2" class="margin-bottom-40">
                           <div class="ensembleInputFormulaire tencol">
                               <h1>Artiste</h1>
                               <label class="threecol">Nom Artiste</label>
                               <input type="text" name="nomArtiste" class="form-control" id="nomArtiste">
                               <div id="msj4" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                           </div>

                            <label>Prenom Artistee</label>
                                <input type="text" name="PrenomArtiste" class="form-control" id="PrenomArtiste">
                                <div id="msj5" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                            <label>Collectif</label>
                                <input type="text" name="collectif" class="form-control" id="collectif"><br><br>
                                <div id="msj6" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                            <input type="button" onclick="validationForm2()" value="Ajouter Artiste" id="bntArtistes">
                        </form>

                        <form action="index.php?page=soumettre" method="post" name="form4" class="margin-bottom-40" enctype="multipart/form-data">
                           <h3>Informations de l'oeuvre</h3>
                            <label>Titre</label>
                                <input type="text" name="titre"class="form-control" id="titre">
                                <div id="msj9" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                            <label>Coordonnées latitude</label>
                                <input type="number" name="latitude" placeholder="EX:45.466405" class="form-control" id="latitude">
                                <div id="msj16" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                            <label>Coordonnées longitude</label>
                                <input type="number" name="longitud" placeholder="EX:-73.631648" class="form-control" id="longitud">
                                <div id="msj17" class="erreurs" style="display:none">Il faut remplir ce champ</div><br> <br>
                                
                            <div class="select">
                                <label>Catégorie</label>
                                <select name="categorieOeuvre"class="form-control">
                                    <option value="">Choisir une categorie</option>
                                    <?php

                                        foreach ($categories as $cat){
                                            echo "<option value='";
                                            $cat->getIdCat();
                                            echo "'>";
                                            $cat->getNomSousCat();
                                            echo "</option>";
                                        }

                                    ?>
                                </select>
                            </div>
                                

                          <div class="select">
                                <label>Artiste</label>
                                <select name="artisteOeuvre" class="form-control">
                                    <option value="">Choisir un artiste</option>
                                     <?php

                                            foreach ($artistes as $artiste){
                                                echo "<option value='";
                                                echo $artiste->idArtiste;
                                                echo "'>";
                                                echo $artiste->nomArtiste." ".$artiste->prenomArtiste;
                                                echo "</option>";
                                            }

                                        ?>
                                </select><br>
                                <input type="button" onclick="montreArtiste()" class="btnFormArtiste" value="Ajouter un Artiste">
                            </div>
                            
                            
                            <h3>Photographies de l'oeuvre</h3>
                            <input name="upload[]" type="file" multiple="multiple" /><br>
     
                                 
                                 <h3 class="addresseFormulaire">Adresse</h3>
                                <label>Numero civique</label>
                                    <input type="number" name="nbRue" class="form-control" id="nbRue">
                                    <div id="msj1" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                                <label>Nom de la rue</label>
                                    <input type="text" name="nomRue" class="form-control" id="nomRue">
                                    <div id="msj2" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                                <label>Ville</label>
                                    <input type="text" name="ville" class="form-control" id="ville"><br><br>
                                    <div id="msj3" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                               <div class="select">
                                 <label>Arrondissement</label>
                                <select name="arrondissement" class="form-control">
                                    <option value="" selected="selected" >Choisir un arrondissement</option>
                                    <?php

                                        foreach ($listeArrondissement as $arr){
                                            echo "<option value='";
                                            $arr->getArrondissement();
                                            echo "'>";
                                            $arr->getArrondissement();
                                            echo "</option>";
                                        }

                                    ?>
                                </select>
                            </div>

                            
                            <input type="button" onclick="validationForm4()" value="Ajouter Oeuvre"  class="btn-u btn-u-blue" id="bntOeuvre">

                        </form>
                    </div>
                </div>
       </div><!--/end Grid Container-->



        <?php

    }

     /**
     * Affiche la page de géolocalisation des oeuvres
     * @access public
     */

public function afficheGeolocalisation() {
        ?>
       
    <!--=== Breadcrumbs v3 ===--> 
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
<div >
          
 <div class="cube-portfolio container margin-bottom-60">          
 <div class="panel panel-blue margin-bottom-40" >
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tasks"></i>Géolocalisation et itinéraire</h3>
                </div>
            <div class="panel-body vueNormale">                      
                       <div class='alert alert-warning fade in'>
                           <strong>Selectionnez votre type de transport </strong><br>
                           <strong>Puis cliquez sur un marqueur pour generer votre itineraire </strong>
                       </div>
                       
                        <form action="#" id="routeForm">
                              <label>
                                <input type="text" id="routeStart" value="kruisstraat 50, oss" hidden>
                              </label>
                              <label>
                                <input type="text" id="routeEnd" value="2030, boul. Pie-IX" hidden>
                              </label>
                              <label><input type="radio" name="travelMode" value="DRIVING" checked /> Driving</label>
                              <label><input type="radio" name="travelMode" value="BICYCLING" /> Bicylcing</label>
                              <label><input type="radio" name="travelMode" value="TRANSIT" /> Public transport</label>
                              <label><input type="radio" name="travelMode" value="WALKING" /> Walking</label>
                        </form>

                        <div id="directionsPanel">
                        </div>
                    </div>
                </div>
           


         <div id="map_canvas" style="width:100%; height:500px; margin:0 auto;margin-bottom:5%;margin-top:5%;"></div>
           
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg6Zz_7MfHo_tIh33tYwTFyc0bsz-rETU&callback=initMap"
            async defer></script>
          
</div>
</div>

        <?php

    }

    /**
     * Affiche la page de la liste des artistes
     * @access public
     * @param Array $oeuvreInfo
     * @param Array $artisteResultat
     * @param Array $listeMat
     * @param Array $categorie
     * @param Array $adresse
     * @param Array $photosOeuvre
     * @author Alexandre BOUET 
     */

public function afficheInfoOeuvre($oeuvreInfo, $artisteResultat, $listeMat, $categorie, $adresse, $photosOeuvre) {
        ?>

                    
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
    <!--=== End Breadcrumbs v3 ===-->

    <!--=== Container Part ===-->
    <div class="container" onload="initMap();" >
        <div class="content">
            <!--  oeuvre Slider -->
            <div class="carousel slide carousel-v2 margin-bottom-40" id="portfolio-carousel">
                

                <div class="carousel-inner">
                  <?php 
                        $photoArtiste = $artisteResultat["photoArtiste"];
                        if ($photosOeuvre != null)
                        {
                            $i = 0;
                            ?>
                            <ol class="carousel-indicators">
                                <li class="active rounded-x" data-target="#portfolio-carousel" data-slide-to="0"></li>
                                <li class="rounded-x" data-target="#portfolio-carousel" data-slide-to="1"></li>
                                <li class="rounded-x" data-target="#portfolio-carousel" data-slide-to="2"></li>
                            </ol>

                            <?php
                            foreach ($photosOeuvre as $photo)
                            {
                                echo "<div class='item";
                                    while($i <= 1) {
                                        $i++;
                                        echo " active";
                                        } 
                                echo "'>";
                                
                                    echo "<img class='full-width img-responsive' src='".$photo->getPhoto()."' alt='imgOeuvre'>";
                                echo "</div>";
                            }
                        }
                        else
                        {
                            echo "Il n'existe aucune photographies pour cette oeuvre";
                        }
   
                    ?>  

                </div>
                <?php
                if ($photosOeuvre != null)
                        {
                ?>
                <a class="left carousel-control rounded-x" href="#portfolio-carousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left arrow-prev"></i>
                </a>
                <a class="right carousel-control rounded-x" href="#portfolio-carousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right arrow-next"></i>
                </a>
                <?php
                }
                ?>
            </div>
            <!-- end oeuvre Slider -->

            <div class="row margin-bottom-60">
                <div class="col-sm-8">
                    <div class="headline">
                        <h3>Détails de l'oeuvre</h3>
                    </div>
                    <?php
                        echo '<p>Titre: '. $oeuvreInfo['Titre']. '</p>';
                        echo '<p>Variante du titre : '. $oeuvreInfo['TitreVariante']. '</p>';
                        echo '<p>Collection : '. $oeuvreInfo['Collection']. '</p>';
                        echo '<p>Technique : '. $oeuvreInfo['Technique']. '</p>';
                        echo '<p>Dimensions : '. $oeuvreInfo['Dimensions']. '</p>';
                        echo '<p>Arrondissement : '. $oeuvreInfo['Arrondissement']. '</p>';
                        echo '<p>Matériaux : ';
                        if ($listeMat != null) {

                                foreach ($listeMat as $mat)
                                {
                                    echo  $mat->getNomMateriaux() . ' ';
                                }
                            
                            }
                        echo '</p>';

                        echo '<p>Catégorie : '. $categorie['NomSousCat']. '</p>';
                        echo '<p>Adresse : '. $adresse['NumRue'] . ' ' . $adresse['Rue']. ' ' . $adresse['Ville']. '</p>';

                        ?>

                        <input type="text" id="latitude" value="<?php echo $oeuvreInfo['CoordonneeLatitude'];?>" hidden>
                        <input type="text" id="longitude" value="<?php echo $oeuvreInfo['CoordonneeLongitude']; ?>" hidden>
                        <input type="text" id="titre" value="<?php echo $oeuvreInfo['Titre'];?>" hidden>

                    <div class="headline">
                        <h3>Localisation</h3>
                    </div>
                        <div id="map" style="height:500px;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg6Zz_7MfHo_tIh33tYwTFyc0bsz-rETU&callback=initMap"
                    async defer></script>

                </div>
                <div class="col-sm-4">
                    <div class="headline"><h2>Artiste : <?php echo $artisteResultat['Nom'] .' '.  $artisteResultat['Prenom']; ?></h2></div>
                    <ul class="list-unstyled project-details">
                        <?php 

                        if ($photoArtiste != "")
                        {
                           echo  "<img class='imgArtiste' src='$photoArtiste' alt='imgArtiste'>";
                        }

                        else
                        {
                           echo "<img class='imgArtiste' src='./images/artistes/default.png' alt='imgArtiste'>";
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Container Part ===-->

          <?php

    }


    /**
     * Affiche la page de recherche avec tous les oeuvres
     * @access public
     * @param Array $LesOeuvres
     * @param Array $photosOeuvres
     * @param Array $categories
     * @param Array $artisteListe
     * @param Array $listeMat
     * @param Array $listeArrondissement
     * @author Alexandre BOUET 
     * @author Cristian MANRIQUE 
     */


public function afficheRecherche($resultatPhotoOeuvresEtTitre, $categories, $artisteListe, $listeMat, $listeArrondissement) {
        ?>
           

<!--=== Breadcrumbs v3 ===--> 
    <div class="breadcrumbs-v1 text-center">
        <div class="container">
            <h1>Art Montreal</h1>
        </div>
    </div>
 <div class="cube-portfolio container margin-bottom-60">
 <div class="panel panel-blue margin-bottom-40" >
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tasks"></i>Recherche des Oeuvres</h3>
                </div>
            <div class="panel-body vueNormale">
            <!--=== End Breadcrumbs v3 ===-->
                <form action="#" id="typeRecherche">
                    <label><input type="radio" name="rechercheType" id="radioArtiste"  onclick="handleChange();"/> Artiste</label>
                    <label><input type="radio" name="rechercheType" id="radioCat"  onclick="handleChange();"/> Catégorie</label>
                    <label><input type="radio" name="rechercheType" id="radioMat"  onclick="handleChange();"/> Matériaux </label>
                    <label><input type="radio" name="rechercheType" id="radioArr" onclick="handleChange();" /> Arrondissement</label>
                </form>
                <form class="barreRecherche">
                    <div class="inputSelectRecherche" >
                            <div class="sectionSelectArtistes" id="sectionSelectArtistes">
                              <p>Artistes</p>
                               <select name="artistes" id="choixDuSelectArtistes"  class="form-control select">
                                    <option value="artistes">Choisir un artiste</option>
                                    <?php

                                         foreach ($artisteListe as $artiste){

                                            echo "<option value='";
                                            echo $artiste->idArtiste;
                                            echo "'>";
                                            echo $artiste->nomArtiste ." ". $artiste->prenomArtiste;
                                            echo "</option>";
                                        }

                                    ?>
                                     </select>
                            </div>

                            <div class="sectionSelectCategories" id="sectionSelectCategories">
                                <p>Catégories</p>
                                <select  id="choixDuSelectCategorie"  name="categorie" class="form-control select">
                                    <option value="categorie">Choisir une categorie</option>
                                    <?php

                                         foreach ($categories as $cat){
                                            echo "<option value='";
                                            $cat->getNomSousCat();
                                            echo "'>";
                                            $cat->getNomSousCat();
                                            echo "</option>";
                                        }

                                    ?>
                                </select>
                            </div>

                            <div class="sectionSelectMateriaux" id="sectionSelectMateriaux">
                                <p>Matériaux</p>
                                <select id="choixDuSelectMateriaux" name="materiaux" class="form-control select">
                                    <option value="materiaux">Choisir un matériaux</option>
                                    <?php

                                         foreach ($listeMat as $mat){
                                            echo "<option value='";
                                            $mat->getNomMateriaux();
                                            echo "'>";
                                            $mat->getNomMateriaux();
                                            echo "</option>";
                                        }

                                    ?>
                                </select>
                            </div>

                            <div class="sectionSelectArrondissement" id="sectionSelectArrondissement" >
                                <p>Arrondissement</p>
                                <select id="choixDuSelectArrondissement" name="arrondissement" class="form-control select">
                                    <option value="categorie">Choisir un arrondissement</option>
                                    <?php

                                         foreach ($listeArrondissement as $arr){
                                            echo "<option value='";
                                            $arr->getArrondissement();
                                            echo "'>";
                                            $arr->getArrondissement();
                                            echo "</option>";
                                        }

                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
              
<div class="changementRecherche" name="changementRecherche">    
         <!--=== Cube-Portfdlio ===-->
    <div class="cube-portfolio container margin-bottom-60">
        <div id="grid-container" class="cbp-l-grid-agency">
               
                     <?php
                if (!empty($resultatPhotoOeuvresEtTitre))
                {
                    foreach ($resultatPhotoOeuvresEtTitre as $oeuvre)
    
                    {
                        echo "<div class='cbp-item graphic'>";
                            echo "<div class='cbp-caption'>";
                                echo "<div class='cbp-caption-defaultWrap'>";

                                if ($oeuvre->photoPresentation != null)
                                {
                                    echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                                }
                                else
                                {
                                   echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                                }
                                echo "</div>";

                                echo "<div class='cbp-caption-activeWrap'>";
                                    echo "<div class='cbp-l-caption-alignCenter'>";
                                        echo "<div class='cbp-l-caption-body'>";
                                            echo "<ul class='link-captions'>";
                                                echo "<li><a href='index.php?page=infoOeuvre&titreOeuvre=$oeuvre->titre'><i class='rounded-x fa fa-search'></i></a></li>";
                                            echo "</ul>";
                                            echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                                        echo  "</div>";
                                    echo "</div>" ;
                                echo "</div>";    
                            echo "</div>";    
                        echo "</div>";    
                       
                    }
                }
                

                ?>

        </div><!--/end Grid Container-->
    </div>
</div>
    <!--=== End Cube-Portfdlio ===-->
</div><!--/wrapper-->

<?php            if (empty($resultatPhotoOeuvresEtTitre))
                {
                    echo" <div class='alert alert-warning fade in'>";
                        echo "<strong>Il n'existe pas d'oeuvres pour cette catégorie</strong>";
                    echo "</div>";
                
                }
?>


        <?php

    }
                
       
     /**
     * Affiche Oeuvres par le nom de l'artiste
     * @access public
     * @param Array $ResultatArtiste
     * @param Array $ResultatTitresPhotosOeuvres
     */

public function afficheOeuvresParIdArtistes($ResultatArtiste, $ResultatTitresPhotosOeuvres) {
?>

<!--=== Cube-Portfdlio ===-->
    <div class="cube-portfolio container margin-bottom-60">
        <div id="grid-container" class="cbp-l-grid-agency">
               
        <?php
                if (!empty($ResultatTitresPhotosOeuvres))
                {
                    foreach ($ResultatTitresPhotosOeuvres as $oeuvre)
    
                    {
                        echo "<div class='cbp-item graphic'>";
                            echo "<div class='cbp-caption'>";
                                echo "<div class='cbp-caption-defaultWrap'>";

                                if ($oeuvre->photoPresentation != null)
                                {
                                    echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                                }
                                else
                                {
                                   echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                                }
                                echo "</div>";

                                echo "<div class='cbp-caption-activeWrap'>";
                                    echo "<div class='cbp-l-caption-alignCenter'>";
                                        echo "<div class='cbp-l-caption-body'>";
                                            echo "<ul class='link-captions'>";
                                                echo "<li><a href='index.php?page=infoOeuvre&titreOeuvre=$oeuvre->titre'><i class='rounded-x fa fa-search'></i></a></li>";
                                            echo "</ul>";
                                            echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                                        echo  "</div>";
                                    echo "</div>" ;
                                echo "</div>";    
                            echo "</div>";    
                        echo "</div>";    
                       
                    }
                }
                

                ?>

        </div><!--/end Grid Container-->
    </div>
    

            <?php

        }

   /**
     * Affiche oeuvres par le nom de la Categorie
     * @access public
     * @param Array $ResultatTitresPhotosOeuvres
     * @param Array $NomSousCat
     * @author Cristian MANRIQUE 
     */

public function afficheOeuvresParNomCategorie($ResultatTitresPhotosOeuvres, $NomSousCat) {
?>

        <!--=== Cube-Portfdlio ===-->
            <div class="cube-portfolio container margin-bottom-60">
                <div id="grid-container" class="cbp-l-grid-agency">

                <?php
                    if($ResultatTitresPhotosOeuvres!=NULL)
                        {
                                if (!empty($ResultatTitresPhotosOeuvres))
                                {
                                    foreach ($ResultatTitresPhotosOeuvres as $oeuvre)

                                    {
                                        echo "<div class='cbp-item graphic'>";
                                            echo "<div class='cbp-caption'>";
                                                echo "<div class='cbp-caption-defaultWrap'>";

                                                if ($oeuvre->photoPresentation != null)
                                                {
                                                    echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                                                }
                                                else
                                                {
                                                   echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                                                }
                                                echo "</div>";

                                                echo "<div class='cbp-caption-activeWrap'>";
                                                    echo "<div class='cbp-l-caption-alignCenter'>";
                                                        echo "<div class='cbp-l-caption-body'>";
                                                            echo "<ul class='link-captions'>";
                                                                echo "<li><a href='index.php?page=infoOeuvre&titreOeuvre=$oeuvre->titre'><i class='rounded-x fa fa-search'></i></a></li>";
                                                            echo "</ul>";
                                                            echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                                                        echo  "</div>";
                                                    echo "</div>" ;
                                                echo "</div>";    
                                            echo "</div>";    
                                        echo "</div>";    

                                    }
                                }
                        }
                        else
                        {
                            echo "<br> Il n'existe pas d'oeuvres pour cette catégorie";
                        }


                        ?>

                </div><!--/end Grid Container-->
            </div>

            <?php

        }

    /**
     * Affiche oeuvres par le nom du Materiaux
     * @access public
     * @param Array $ResultatTitresPhotosOeuvres
     * @param Array $NomMat
     * @author Cristian MANRIQUE 
     */

public function afficheOeuvresParNomMateriaux($ResultatTitresPhotosOeuvres, $NomMat) {

  ?>      

        <!--=== Cube-Portfdlio ===-->
            <div class="cube-portfolio container margin-bottom-60">
                <div id="grid-container" class="cbp-l-grid-agency">

                <?php
                    if($ResultatTitresPhotosOeuvres!=NULL)
                        {
                                if (!empty($ResultatTitresPhotosOeuvres))
                                {
                                    foreach ($ResultatTitresPhotosOeuvres as $oeuvre)

                                    {
                                        echo "<div class='cbp-item graphic'>";
                                            echo "<div class='cbp-caption'>";
                                                echo "<div class='cbp-caption-defaultWrap'>";

                                                if ($oeuvre->photoPresentation != null)
                                                {
                                                    echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                                                }
                                                else
                                                {
                                                   echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                                                }
                                                echo "</div>";

                                                echo "<div class='cbp-caption-activeWrap'>";
                                                    echo "<div class='cbp-l-caption-alignCenter'>";
                                                        echo "<div class='cbp-l-caption-body'>";
                                                            echo "<ul class='link-captions'>";
                                                                echo "<li><a href='index.php?page=infoOeuvre&titreOeuvre=$oeuvre->titre'><i class='rounded-x fa fa-search'></i></a></li>";
                                                            echo "</ul>";
                                                            echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                                                        echo  "</div>";
                                                    echo "</div>" ;
                                                echo "</div>";    
                                            echo "</div>";    
                                        echo "</div>";    

                                    }
                                }
                        }
                        else
                        {
                            echo "<br> Il n'existe pas d'oeuvres pour cette catégorie";
                        }


                        ?>

                </div><!--/end Grid Container-->
            </div>     


            <?php

        }

    /**
     * Affiche oeuvres par Nom d'Arrondissement
     * @access public
     * @param Array $ResultatTitresPhotosOeuvres
     * @param Array $NomArrond
     * @author Cristian MANRIQUE 
     */

public function afficheOeuvresParNomArrondissement($ResultatTitresPhotosOeuvres, $NomArrond) {

  ?>      

        <!--=== Cube-Portfdlio ===-->
            <div class="cube-portfolio container margin-bottom-60">
                <div id="grid-container" class="cbp-l-grid-agency">

                <?php
                    if($ResultatTitresPhotosOeuvres!=NULL)
                        {
                                if (!empty($ResultatTitresPhotosOeuvres))
                                {
                                    foreach ($ResultatTitresPhotosOeuvres as $oeuvre)

                                    {
                                        echo "<div class='cbp-item graphic'>";
                                            echo "<div class='cbp-caption'>";
                                                echo "<div class='cbp-caption-defaultWrap'>";

                                                if ($oeuvre->photoPresentation != null)
                                                {
                                                    echo  "<img class='imgCategorie' src='$oeuvre->photoPresentation' alt='imgCat'>";
                                                }
                                                else
                                                {
                                                   echo "<img class='imgCategorie' src='./images/categories/default.jpg' alt='imgCat'>";
                                                }
                                                echo "</div>";

                                                echo "<div class='cbp-caption-activeWrap'>";
                                                    echo "<div class='cbp-l-caption-alignCenter'>";
                                                        echo "<div class='cbp-l-caption-body'>";
                                                            echo "<ul class='link-captions'>";
                                                                echo "<li><a href='index.php?page=infoOeuvre&titreOeuvre=$oeuvre->titre'><i class='rounded-x fa fa-search'></i></a></li>";
                                                            echo "</ul>";
                                                            echo "<div class='cbp-l-grid-agency-title'>$oeuvre->titre</div>";
                                                        echo  "</div>";
                                                    echo "</div>" ;
                                                echo "</div>";    
                                            echo "</div>";    
                                        echo "</div>";    

                                    }
                                }
                        }
                        else
                        {
                            echo "<br> Il n'existe pas d'oeuvres pour cette catégorie";
                        }


                        ?>

                </div><!--/end Grid Container-->
            </div>     


            <?php



                    ?>

            <?php

        }




}//Fin class Vue




