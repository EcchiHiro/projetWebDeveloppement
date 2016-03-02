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


class VueAdmin {



    /**
     * Affiche le header des pages
     * @access public
     * @author Alexandre BOUET 
     */

public function AdminTopPage() {
        ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="">

                <title>Panneau d'adminstration</title>
                   

                <!-- Bootstrap Core CSS -->
                <link href="./bootStrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                

                <!-- MetisMenu CSS -->
                <link href="./bootStrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

                <!-- DataTables CSS -->
                <link href="./bootStrap/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

                <!-- DataTables Responsive CSS -->
                <link href="./bootStrap/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

                <!-- Custom CSS -->
                <link href="./bootStrap/dist/css/sb-admin-2.css" rel="stylesheet">
                
                <!-- CSS Customization -->
                <link rel="stylesheet" href="./bootStrap/assets/css/custom.css">

                <!-- Custom Fonts -->
                <link href="./bootStrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


                

                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
                <script src="js/main.js"></script>
                
                

            </head>


        <?php

    }

    /**
     * Affiche le pied des pages
     * @access public
     * @author Alexandre BOUET 
     */

public function AdminPiedPage() {
        ?>

            <!-- jQuery -->
<!--            <script src="./bootStrap/bower_components/jquery/dist/jquery.min.js"></script>-->
  
            <!-- Bootstrap Core JavaScript -->
            <script src="./bootStrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="./bootStrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="./bootStrap/bower_components/raphael/raphael-min.js"></script>

            <!-- DataTables JavaScript -->
            <script src="./bootStrap/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="./bootStrap/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


            <!-- Custom Theme JavaScript -->
            <script src="./bootStrap/dist/js/sb-admin-2.js"></script>
            
            <script src="js/component.js"></script>

            <script>
                $(document).ready(function() {
                    $('#listeOeuvres').DataTable({
                            responsive: true
                    });
                });
            </script>
            <script>
                // Confirmation de suppression d'une oeuvre
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                });
            </script>   
                <!-- /#wrapper -->

        </body>

    </html>


        <?php

    }


    /**
     * Affiche la page la navigation de côté
     * @access public
     * @author Alexandre BOUET 
     */


public function adminNavSide() {
        ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?page=admin">Panneau Admin Art Montréal</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown-messages -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Nouvelle Oeuvre à valider
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Dernière MAJ BDD
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?page=detruireSession"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->



            <!-- ********** NAVIGATION DU COTÉE GAUCHE *********** -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="index.php?page=admin"><i class="fa fa-dashboard fa-fw"></i> Accueil Admin</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Gestion des oeuvres <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=adminAjout">Ajouter une oeuvre</a>
                                </li>
                                <li>
                                    <a href="index.php?page=adminModifSupp">Modifier/Supprimer une oeuvre</a>
                                </li>
                                <li>
                                    <a href="index.php?page=adminValide">Valider une oeuvre</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Gestion des catégories <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=adminAjoutCat">Ajouter une catégorie</a>
                                </li>
                                <li>
                                    <a href="index.php?page=adminSuppCat">Supprimer une catégorie</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                         <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Gestion des images <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=adminAjoutImgArt">Ajouter une image d'artiste</a>
                                </li>
                                <li>
                                    <a href="index.php?page=adminAjoutImgCat">Ajouter une image de catégorie</a>
                                </li>                                
                                <li>
                                    <a href="index.php?page=adminAjoutImgOeuvre">Ajouter une image de présentation d'oeuvre</a>
                                </li>
                        
                            </ul>
                                    <!-- /.nav-second-level -->
                        </li>
                           
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Gestion des artistes <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=adminAjoutDescriptionArtiste">Ajouter une description</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>




        <?php

    }

    /**
     * Affiche la page principale (accueil) du panneau d'admin
     * @access public
     * @author Alexandre BOUET 
     */
    
public function adminMain() {
        ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tableau de bord</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Analyse des visites
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <!-- +++++++DIVISIONS POUR LOAD PIWIK ANALYTICS+++++++ -->
<div id="widgetIframe"><iframe width="100%" height="800" src="https://ecchihiro.piwik.pro/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=VisitsSummary&actionToWidgetize=index&idSite=1&period=day&date=yesterday&disableLink=1&widget=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
                        </div>

                        <!-- /.panel-body -->
                    </div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                <!-- /.panel -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-wrench fa-fw"></i> Mise à jour de la base de données
                        </div>
                        <div class="panel-body">
                            <h4>Dernière mise à jour connue :</h4>
                            <p>20/01/2016</p>                            
                            <a href="index.php?page=installBD" ><button type="submit" class="btn btn-lg btn-info" name="install">Install BD</button></a>
                            <a href="index.php?page=admin" ><button type="submit" class="btn btn-lg btn-info" name="update">Mettre à jour</button></a>    
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Panneau de notifications
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
 <div id="widgetIframe"><iframe width="100%" height="350" src="https://ecchihiro.piwik.pro/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=Live&actionToWidgetize=widget&idSite=1&period=day&date=today&disableLink=1&widget=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->





        <?php

    }

    /**
     * Affiche la page de login
     * @access public
     * @author Cristian MANRIQUE 
     */
    
public function adminLogin() {
        ?>
        <?php
        //:: Débuter variable session dans index.php
    
        //:: si le grain de sel n'existe pas, le créer
        if(!isset($_SESSION["grainSel"])) {
            //:: créer un nombre entre 1 et 1000
            $nbAleatoire = rand(1, 1000);
            $_SESSION["grainSel"] = $nbAleatoire;
        }          
        ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            
             <!-- load JS -->
             <script type="text/javascript" src="js/main.js"></script>
             <script type="text/javascript" src="js/md5.js"></script>

            <title>Connectez-vous</title>


            <link href="./bootStrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

            <link href="./bootStrap/dist/css/sb-admin-2.css" rel="stylesheet">


        </head>

        <body>

        <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Connexion au panneau d'administration</h3>
                            </div>
                            <div class="form-group">
                               <!-- fomulaire visible --> 
                                <form role="form" method="POST" name="loginForm">
                                    <br/>
                                    <input type="text" class="form-control" name="username" id="inputEmail" placeholder="Utilisateur"/><br/>
                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Mot de passe"/><br/>
                                    <input class="btn btn-lg btn-primary btn-block" type="button" value="Envoyer" onclick="encrypte();"/>
                                    <input type="hidden" name="grainSel" value="<?php echo $_SESSION["grainSel"]; ?>"/>
                                </form>
                                 <!-- fomulaire cachée --> 
                               <form method="POST" name="formEncrypte">
                                        <input type="hidden" name="username"/><br/>
                                        <input type="hidden" name="password"/><br/>
                                <span name="message"><?php if (isset($_SESSION["message"])){echo $_SESSION["message"];} ?></span>
		
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>
        

        </html>

        <?php

    }



    /**
     * Affiche la page d'ajout des oeuvres
     * @access public
     * @author Alexandre BOUET     
     * @author Stéphane LECLERC 
     */
    
    public function adminAjoutOeuvre($listeArrondissement, $categories, $artistes ) {
        ?>





    <!-- /#wrapper -->
        
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestion Oeuvre</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
<!--=== End Breadcrumbs v3 ===-->

<!--=== Cube-Portfdlio ===-->
 <div class="panel panel-primary">
                        <div class="panel-heading">
                            Formulaire dajout d'oeuvre
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                        <form action="index.php?page=adminAjout" method="post" name="form2" style="display:none" id="form2" class="margin-bottom-40">
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

                        <form action="index.php?page=adminAjout" method="post" name="form4" class="margin-bottom-40" enctype="multipart/form-data">
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
   </div>
</div><!--/end Grid Container-->
</div><!--/end Grid Container-->

        <?php

    }    
    
    /**
     * Affiche la page de modification d'oeuvres
     * @access public
     * @author Alexandre BOUET     
     * @author Stéphane LECLERC 
     */
    
public function adminModifieOeuvre($infoOeuvre,$tableauInfoOeuvreMateriel,$categorieOeuvre,$artisteOeuvre,$addresseOeuvre, $categoriesListe, $listeArtiste, $listeMat) {
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modification Oeuvre</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Formulaire de modification d'oeuvre
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                   
                                    <form action="" method="POST" name="form4" id="adminModifSupp">

                                       <h3>Informations de l'oeuvre</h3>
                                       
                                        <!--Inputs cachés-->
                                        
                                        <input class="form-control" type="hidden" name="valide" value="modification">                                      
                                        <input class="form-control" type="hidden" value="<?php echo $_GET["idOeuvre"];?>">
                                        <input class="form-control" type="hidden" name="idCat" value="<?php echo $infoOeuvre["IdCat"];?>">
                                        <input class="form-control" type="hidden" name="idArtiste" value="<?php echo $infoOeuvre["IdArtiste"];?>">
                                        <input class="form-control" type="hidden" name="idMat" value="<?php echo $tableauInfoOeuvreMateriel["idMat"];?>">
                                        <input class="form-control" type="hidden" name="idAdre" value="<?php echo $infoOeuvre["IdAdresse"];?>">
                                       
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input class="form-control" placeholder="Enter text" type="text" name="titre" value="<?php echo $infoOeuvre["Titre"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Variante du Titre</label>
                                            <input class="form-control" placeholder="Enter text"  name="titreVariante" value="<?php echo $infoOeuvre["TitreVariante"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Collection</label>
                                            <input class="form-control" placeholder="Enter text" name="collection" value="<?php echo $infoOeuvre["Collection"];?>">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Technique</label>
                                            <input class="form-control" placeholder="Enter text" name="technique" value="<?php echo $infoOeuvre["Technique"];?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Dimensions</label>
                                            <input class="form-control" placeholder="Enter text"  name="dimensions" value="<?php echo $infoOeuvre["Dimensions"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Coordonnées latitude</label>
                                            <input class="form-control" placeholder="Enter text" name="coordonneeLatitude" value="<?php echo $infoOeuvre["CoordonneeLatitude"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Coordonnées longitude</label>
                                            <input class="form-control" placeholder="Enter text" name="coordonneeLongitude" value="<?php echo $infoOeuvre["CoordonneeLongitude"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Categorie</label>

                                             <select class="form-control" name="cat">
                                                <?php

                                                    foreach($categoriesListe as $cat)
                                                    {
                                                        echo "<option value='";
                                                        $cat->getIdCat();
                                                        echo "'";                                                        
                                                        if($cat->idCat == $infoOeuvre["IdCat"])
                                                        {
                                                            echo " selected";
                                                        }
                                                        echo ">";
                                                        $cat->getNomSousCat();
                                                        echo "</option>";
                                                    }

                                                ?>
                                            </select>
                                            </div>  
                                        <div class="form-group">
                                            <label>Matériaux</label>

                                             <select class="form-control" name="mat">
                                                <?php

                                                    foreach($listeMat as $mat)
                                                    {
                                                        echo "<option value='";
                                                        $mat->getIdMat();
                                                        echo "'";                                                        
                                                        if($mat->idMat == $tableauInfoOeuvreMateriel["idMat"])
                                                        {
                                                            echo " selected";
                                                        }
                                                        echo ">";
                                                        $mat->getNomMateriaux();
                                                        echo "</option>";
                                                    }

                                                ?>
                                            </select>
                                            </div>                                        
                                        <div class="form-group">
                                            <label>Artiste</label>

                                             <select class="form-control" name="artiste">
                                                <?php

                                                    foreach($listeArtiste as $artiste)
                                                    {
                                                        echo "<option value='";
                                                        echo $artiste->idArtiste;
                                                        echo "'";                                                        
                                                        if($artiste->idArtiste == $infoOeuvre["IdArtiste"])
                                                        {
                                                            echo " selected";
                                                        }
                                                        echo ">";
                                                        echo $artiste->nomArtiste." ".$artiste->prenomArtiste;
                                                        echo "</option>";
                                                    }

                                                ?>
                                            </select>
                                            </div>  

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                <h3>Adresse</h3>
                                        <div class="form-group">
                                            <label>Arrondissement</label>
                                            <input class="form-control" placeholder="Enter text"  name="arrondissement" value="<?php echo $infoOeuvre["Arrondissement"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Numéro de rue</label>
                                            <input class="form-control" placeholder="Enter text"  name="numRue" value="<?php echo $addresseOeuvre["NumRue"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nom de rue</label>
                                            <input class="form-control" placeholder="Enter text" name="nomRue" value="<?php echo $addresseOeuvre["Rue"];?>">
                                        </div>

                                        <input type="submit" class="btn btn-lg btn-success"  value="Modifier l'oeuvre">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->


        <?php

    }



     /**
     * Affiche la page de gestion des oeuvres
     * @access public
     * @param Array $listeOeuvres
     * @author Alexandre BOUET     
     * @author Stéphane LECLERC      
     */
    
public function adminGereOeuvres($listeOeuvres) {
        ?>


 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Oeuvres de la base de donnée
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="listeOeuvres">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Titre</th>
                                            <th>Technique</th>
                                            <th>Collection</th>
                                            <th>Dimensions</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       
                                        foreach($listeOeuvres as $uneOeuvre)
                                        {

                                            echo "<tr class='odd gradeX'>";
                                                echo "<td>";
                                                    $uneOeuvre->getIdOeuvre();
                                                echo "</td>";                                                   
                                                echo "<td>";
                                                    $uneOeuvre->getTitre();
                                                echo "</td>";                                                
                                                echo "<td>";
                                                        $uneOeuvre->getTechnique();
                                                echo "</td>";                                            
                                                echo "<td>";
                                                        $uneOeuvre->getCollection();
                                                echo "</td>";                                                                                      
                                                echo "<td>";
                                                        $uneOeuvre->getDimensions();
                                                echo "</td>";                                           
                                                echo "<td>";
                                                       echo "<a href='index.php?page=adminModif&idOeuvre=$uneOeuvre->idOeuvre' class='fa fa-edit' style='margin-left:45%;'></a>";
                                                echo "</td>";                                                
                                                echo "<td>";
                                                        echo "<a href='#' data-href='index.php?page=adminModifSupp&idOeuvre=$uneOeuvre->idOeuvre' class='glyphicon glyphicon-trash' data-toggle='modal' 
                                                        data-target='#confirm-delete' style='margin-left:45%;'></a>";
                                                echo "</td>";
                                            echo "</tr>";

                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
         <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
                    </div>

                    <div class="modal-body">
                        <p>Vous allez supprimer cette oeuvre, cette action est irréversible</p>
                        <p>Voulez vous continuer ?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <?php

    }


    /**
     * Affiche la page de validation des oeuvres
     * @access public
     * @param Array $listeOeuvres
     * @author Alexandre BOUET          
     */
    
public function adminValideOeuvre($listeOeuvres) {
        ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Oeuvre</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Formulaire de validation d'oeuvre
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <form action="index.php?page=adminValide" method="post" name="form4">

                                       <h3>Liste des oeuvres non validées </h3>

                                        <div class="form-group">
                                            <label>Oeuvres présentes dans la base de donnés</label>
                                            <select class="form-control"  id="choixOeuvreNonValide" name="choixOeuvresNonValides">
                                               <option value="" selected >Choisir une oeuvre non validée</option>
                                                <?php
                                                    foreach($listeOeuvres as $uneOeuvre)
                                                    {

                                                        echo "<option value='";
                                                        $uneOeuvre->getIdOeuvre();
                                                        echo "'>";
                                                        $uneOeuvre->getTitre();
                                                        echo "</option>";

                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                 Détails de l'oeuvre
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body" name="chargementInfo">
                                                Titre :  </br>
                                                Variante du titre : </br>
                                                Technique : </br>
                                                Collection :</br>
                                                Dimensions :</br>
                                                Catégorie : </br>
                                                Artiste : </br>
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                    </div>
                                         <input type="submit" class="btn btn-lg btn-success"  value="Valider l'oeuvre">
                                    </form>

                                </div>

                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
            </div>

            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->


        <?php

    }

    /**
     * Partie necessaire au ajax (informations de l'oeuvre sélectionnée)
     * @access public
     * @param Array $infoOeuvre
     * @author Alexandre BOUET        
     */
    
public function chargeInfoOeuvre($infoOeuvre) {
        ?>
                        <div class="panel-body" name="chargementInfo">
                            Titre :   <?php echo $infoOeuvre["Titre"]; ?></br>
                            Variante du titre : <?php echo $infoOeuvre["TitreVariante"]; ?></br>
                            Technique : <?php echo $infoOeuvre["Technique"]; ?> </br>
                            Collection :<?php echo $infoOeuvre["Collection"]; ?> </br>
                            Dimensions :<?php echo $infoOeuvre["Dimensions"]; ?> </br>
                            Catégorie :<?php echo $infoOeuvre["IdCat"]; ?> </br>
                            Artiste : <?php echo $infoOeuvre["IdArtiste"]; ?></br>
                        </div>

        <?php

    }

       /**
     * Affiche la page d'ajout de catégorie
     * @access public
     *
     */
    
public function adminAjoutCat() {
        ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Catégories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Formulaire d'ajout de catégorie
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="index.php?page=adminAjoutCat" method="post" name="form5" id="form5">


                                        <h3>Formulaire d'ajout de catégorie</h3>

                                        <div class="form-group">
                                            <label>Nom français</label>
                                            <input type="text" class="form-control" placeholder="Enter text" value="" name="nomCat" id="nomCat">
                                            <div id="msj12" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nom anglais</label>
                                            <input type="text" class="form-control" placeholder="Enter text" value="" name="nomCatEN" id="nomCatEN">
                                            <div id="msj13" class="erreurs" style="display:none">Il faut remplir ce champ</div>
                                        </div>


                                        <input type="submit" onclick="validationForm5()" class="btn btn-lg btn-success"  value="Ajouter Catégorie">
                                        <button type="reset" class="btn btn-lg btn-warning">Reset</button>

                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

        <?php

    }
     /**
     * Affiche la page de suppression de catégorie
     * @access public
     * @param Array $categories    
     * @author Stéphane LECLERC 
     */
    
public function adminSuppCat($categories) {
        ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Catégories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Formulaire de suppression de catégorie
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="index.php?page=adminSuppCat" method="post" name="form4">

                                        <h3>Formulaire de suppression de catégorie</h3>

                                        <div class="form-group">
                                            <label>Catégories présentes dans la base de donnés</label>
                                            <select class="form-control" name="supprimeCategorie">
                                                <option value="" selected >Choisir une catégorie</option>
                                                <?php

                                                    foreach($categories as $cat)
                                                    {
                                                        echo "<option value='";
                                                        $cat->getIdCat();
                                                        echo "'>";
                                                        $cat->getNomSousCat();
                                                        echo "</option>";
                                                    }

                                                ?>
                                            </select>
                                        </div>

                                        <input type="submit" class="btn btn-lg btn-success"  value="Supprimer">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

        <?php

    }
    
    
     /**
     * Affiche la page d'ajout d'images d'artistes
     * @access public
     * @param Array $categories    
     * @author Alexandre BOUET 
     */
    
public function adminAjoutImageArtiste($listeArtistes) {
        ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="alert alert-info">
                        L'image que vous choisiez pour un artiste doit faire maximum 250*250 pixels.
                    </div>

                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Formulaire d'ajout d'images pour un artiste
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post" name="form4" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Artiste sans photographies présents dans la base de donnés</label>
                                            <select class="form-control" name="ajoutPhoto">
                                                <option value="" selected >Choisir un artiste</option>
                                                <?php

                                                foreach ($listeArtistes as $artiste)
                                                {
                                                    echo "<option value='";
                                                    echo $artiste->idArtiste;
                                                    echo "'>";
                                                    echo $artiste->nomArtiste." ".$artiste->prenomArtiste;
                                                    echo "</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        
                                        <label class="control-label">Selectionnez une image</label>
                                        
                                        <input name="upload" type="file" /><br>

                                        <input type="submit" class="btn btn-lg btn-success"  value="Ajout photographie">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

        <?php

    }
    
     /**
     * Affiche la page d'ajout d'images de catégories
     * @access public
     * @param Array $categories    
     * @author Alexandre BOUET 
     */
    
public function adminAjoutImageCat($categories) {
        ?>

<script type="text/javascript">

    $(function() {
      $( "#crop_div" ).draggable({ containment: "parent" });
    });
   
  </script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="alert alert-info">
                        Choissiez un fichier, puis selectionnez la zone de l'image que vous voulez rogner pour l'envoyer.
                    </div>

                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Formulaire d'ajout d'images pour une catégorie
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post" name="form4" enctype="multipart/form-data" onsubmit="return crop();">

                                        <div class="form-group">
                                            <label>Catégories sans photographies présents dans la base de donnés</label>
                                            <select class="form-control" name="ajoutPhoto">
                                                <option value="" selected >Choisir une catégorie</option>
                                                <?php

                                                    foreach($categories as $cat)
                                                    {
                                                        echo "<option value='";
                                                        $cat->getIdCat();
                                                        echo "'>";
                                                        $cat->getNomSousCat();
                                                        echo "</option>";
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                        
                                     <label class="control-label">Selectionnez une image</label>
                                        
                                        <input name="upload" type="file" accept="image/*" onchange="loadFile(event)"/><br>
                                        
                                     <div id="crop_wrapper" style="display:none">
                                          <img id="output"/>
                                          <div id="crop_div"></div>
                                     </div>

                                      <input type="hidden" value="" id="top" name="top">
                                      <input type="hidden" value="" id="left" name="left">
                                      <input type="hidden" value="" id="right" name="right">
                                      <input type="hidden" value="" id="bottom" name="bottom">                                        

                                        <input type="submit" class="btn btn-lg btn-success"  value="Ajout photographie">
                                        

                                    </form>
                                </div>
                                <script>
                                  var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    document.getElementById('crop_wrapper').style.display="block";
                                  };
                                </script>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

        <?php

    }    

     /**
     * Affiche la page d'ajout d'images de présentation d'une oeuvre
     * @access public
     * @param Array $categories    
     * @author Alexandre BOUET 
     */
    
public function adminAjoutImagePresentationOeuvre($listeOeuvre) {
        ?>

<script type="text/javascript">

    $(function() {
      $( "#crop_div" ).draggable({ containment: "parent" });
    });
   
  </script>
       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    <div class="alert alert-info">
                        Choissiez un fichier, puis selectionnez la zone de l'image que vous voulez rogner pour l'envoyer.
                    </div>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Formulaire d'ajout d'image de présentation d'oeuvre
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post" name="form4" enctype="multipart/form-data" onsubmit="return crop();">

                                        <div class="form-group">
                                            <label>Oeuvres sans images de présentation dans la base de donnée</label>
                                            <select class="form-control" name="ajoutPhoto">
                                                <option value="" selected >Choisir une oeuvre</option>
                                                <?php

                                                foreach ($listeOeuvre as $oeuvre)
                                                {
                                                    echo "<option value='";
                                                    echo $oeuvre->idOeuvre;
                                                    echo "'>";
                                                    echo $oeuvre->titre;
                                                    echo "</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        
                                        <label class="control-label">Selectionnez une image</label>
                                        
                                        <input name="upload" type="file" accept="image/*" onchange="loadFile(event)"/><br>
                                        
                                     <div id="crop_wrapper" style="display:none">
                                          <img id="output"/>
                                          <div id="crop_div"></div>
                                     </div>

                                      <input type="hidden" value="" id="top" name="top">
                                      <input type="hidden" value="" id="left" name="left">
                                      <input type="hidden" value="" id="right" name="right">
                                      <input type="hidden" value="" id="bottom" name="bottom">                                        

                                        <input type="submit" class="btn btn-lg btn-success"  value="Ajout photographie">
                                        

                                    </form>
                                </div>
                                <script>
                                  var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    document.getElementById('crop_wrapper').style.display="block";
                                  };
                                </script>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

</div>
    <!-- /#wrapper -->

        <?php
    /**
     * Affiche la page d'ajouter description d'un artiste
     * @access public
     * @param     
     * @author Stéphane Leclerc
     */
    }    

    public function adminAjoutDescriptionArtiste($listeArtistes)
    {
      ?>
      
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestion artiste</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">


            <div class="panel panel-green">
                <div class="panel-heading">
                    Formulaire d'ajout d'une description d'un artiste
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="index.php?page=adminAjoutDescriptionArtiste" method="post" name="form4" id="form4">

                                   <h3>Formulaire d'ajout un descripton d'un artiste</h3>
                                <div class="form-group">
                                    <label>Artistes dans descriptions</label>
  
                                    <select class="form-control" name="ajouteDescription">
                                        <option value="" selected >Choisir un artiste</option>
                                        <?php

                                                foreach ($listeArtistes as $artiste)
                                                {
                                                    
                                                    echo "<option value='";
                                                    echo $artiste->idArtiste;
                                                    echo "'>";
                                                    echo $artiste->nomArtiste." ".$artiste->prenomArtiste;
                                                    echo "</option>";
                                                }
     
                                        ?>
                                    </select>
                                </div>
                                <h2>Biographie</h2>
                                <input type="text" class="form-control" placeholder="Enter text" value="" name="descriptionArtiste" id="descriptionArtiste">
                                <div id="msj12" class="erreurs" style="display:none">Il faut remplir ce champ</div> 
                              
                                <input type="submit" onclick="validationForm5()" class="btn btn-lg btn-success"  value="ajoute Description" >
                            </form>
                            
                            
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
</div>
      <?php  
    }



}//Fin class Vue




