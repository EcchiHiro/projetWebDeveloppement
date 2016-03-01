/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@gmail.com)
 * @version 0.1
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

    /**
     * Validation Javascript et Encryptage en MD5 le utilisateur et le mot de passe dans le formEncrypte qui est caché
     * @author Cristian MANRIQUE 
     */
function encrypte()
{
        
    
    //validation de utilisateur en Javascript
        if (document.querySelector('[name="username"]').value!="")
            {
                //validation du mot de passe en Javascript
                if(document.querySelector('[name="password"]').value!="" )
                {
                    //Reinitialiser message
                    document.querySelector('[name="message"]').innerHTML="";

                    //encrypte et envoi le formulaire caché
                    var passwordEncrypte = md5(document.loginForm.password.value);
                    var grainSel = document.loginForm.grainSel.value;

                    //formule: md5(grainSel . md5(password))
                    var passwordEncryptePlusGrainSel = md5(grainSel + passwordEncrypte);
                    document.formEncrypte.username.value = document.loginForm.username.value;
                    document.formEncrypte.password.value = passwordEncryptePlusGrainSel;
                    document.formEncrypte.submit();
                }
                 else 
                {
                    document.querySelector('[name="message"]').innerHTML = "Veuillez remplir le champs mot de passe";
                }
               
            }
        else 
            {
                document.querySelector('[name="message"]').innerHTML = "Veuillez remplir le champ utilisateur";
            }


}

    /**
     * Initialisation de la carte google map (géolocalisation)
     * @author Alexandre BOUET 
     */


function initialize() {
    
    var directionDisplay, map;
    var directionsService = new google.maps.DirectionsService();
    var geocoder = new google.maps.Geocoder();
    

  // On centre la carte sur Montreal
  var latlng = new google.maps.LatLng(45.5087,-73.554);
  // On set les options de la map
  var rendererOptions = { draggable: true };
  directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
  // et leur affichage
  var myOptions = {
    zoom: 10,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false
  };
  // Ajout de la carte
  map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
    

        var markers = document.getElementsByTagName("marker");
        var marker, i;
        //Créations des marqueurs récupérés dans le XML et ajout d'un event Listener clic
        for (var i = 0; i < markers.length; i++) 
        {
            
              var data = markers[i];
              var name = data.getAttribute("titre");

               marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(parseFloat(data.getAttribute("lat")), parseFloat(data.getAttribute("lng"))),
                title: name
              });
            
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    //Appel de la fonction de direction
                    calcRoute(marker.position);
                }
              })(marker, i));
                      
        }
    

  //Lie la carte aux directions
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
  // start the geolocation API
  if (navigator.geolocation) {
    // when geolocation is available on your device, run this function
    navigator.geolocation.getCurrentPosition(foundYou, notFound);
  } else {
    // when no geolocation is available, alert this message
    alert('Geolocation not supported or not enabled.');
  }
    
}


function notFound(msg) {  
  alert('Votre localisation est inconnue')
}



function foundYou(position) {
    
    var directionDisplay, map;
    var directionsService = new google.maps.DirectionsService();
    var geocoder = new google.maps.Geocoder();
    
    // Converti la position retournée par l'api de geolocalisation pour la transformer en object de coordonné
  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  // Converti la position en adresse utilisable
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        // Si une adresse à été trouvée
      if (results[0]) {
        // Ajoute un markeur à cet endroit
        marker = new google.maps.Marker({
            icon:"https://maps.google.com/mapfiles/kml/shapes/man.png",
            position: latlng,
            map: map
        });
       
        var address = results[0].address_components[1].long_name+' '+results[0].address_components[0].long_name+', '+results[0].address_components[3].long_name
        //Ajout de cet adresse au formulaire
          $('#routeStart').val(address);

        
      }
    } else {
      //Si l'adresse n'a pas pu être determinée alors on affiche un message d'erreur
      alert("Geocoder failed due to: " + status);
    }
  });
}


function calcRoute(point) {
    
    var directionDisplay, map;
    var directionsService = new google.maps.DirectionsService();
    var geocoder = new google.maps.Geocoder();
    
  // Récupération du mode de déplacement via formulaire   
  var travelMode = $('input[name="travelMode"]:checked').val();
  var start = $("#routeStart").val();
  var end = point;
    
  // Création d'un tableau avec les nouvelles informations
  var request = {
    origin: start,
    destination: end,
    unitSystem: google.maps.UnitSystem.METRIC,
    travelMode: google.maps.DirectionsTravelMode[travelMode]
  };
  // Appel du service de direction de L'api
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      
      $('#directionsPanel').empty();

      directionsDisplay.setDirections(response);
    } else {
      // Messages d'alerte quand la route n'est pas calculable
      if (status == 'ZERO_RESULTS') {
        alert('Aucune route accéssible trouvé ');
      } else if (status == 'UNKNOWN_ERROR') {
        alert('A directions request could not be processed due to a server error. The request may succeed if you try again.');
      } else if (status == 'REQUEST_DENIED') {
        alert('This webpage is not allowed to use the directions service.');
      } else if (status == 'OVER_QUERY_LIMIT') {
        alert('The webpage has gone over the requests limit in too short a period of time.');
      } else if (status == 'NOT_FOUND') {
        alert('At least one of the origin, destination, or waypoints could not be geocoded.');
      } else if (status == 'INVALID_REQUEST') {
        alert('The DirectionsRequest provided was invalid.');         
      } else {
        alert("There was an unknown error in your request. Requeststatus: nn"+status);
      }
    }
  });
}


    /**
     * Fonction initMap qui permet la localisation des oeuvres sur la google map
     * @author Alexandre BOUET 
     */


function initMap() {

    var latitude = document.getElementById("latitude").value;
    var longitude = document.getElementById("longitude").value;
    var titreOeuvre = document.getElementById("titre").value;

     var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

    var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: myLatLng
            });

    var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: titreOeuvre
            });

}


    /**
     * Fonction validation de formulaire
     * @author Carlos VASQUEZ 
     */

 function validationForm2(){

    var valide=true;

    if($("#nomArtiste").val().length < 1){
      $( "#msj4" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj4" ).css("display", "none");
    }

    if($("#PrenomArtiste").val().length < 1){
      $( "#msj5" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj5" ).css("display", "none");
    }

    if($("#collectif").val().length < 1){
      $( "#msj6" ).css("display", "block");
       valide=false;
    }else{
      $( "#msj6" ).css("display", "none");
    }

    if(($("#nomArtiste").val().length > 1 && $("#PrenomArtiste").val().length > 1) && $("#collectif").val().length > 1){

      valide=true;
    }

    if(valide==true){

      document.form2.submit();
    }

 }


    /**
     * Fonction validation de formulaire
     * @author Carlos VASQUEZ 
     */


 function validationForm3(){

     if($("#materiaux").val().length < 1){
      $( "#msj7" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj7" ).css("display", "none");
    }

    if($("#materiauxEN").val().length < 1){
      $( "#msj8" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj8" ).css("display", "none");
    }

    if(($("#materiaux").val().length > 1 && $("#materiauxEN").val().length > 1)){

      valide=true;
    }

    if(valide==true){

      document.form3.submit();
    }

 }


    /**
     * Fonction validation de formulaire
     * @author Carlos VASQUEZ 
     */

 function validationForm4(){

    var valide=true;
    var conceptName = $('#aioConceptName :selected').text();

    if($("#titre").val().length < 1){
      $( "#msj9" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj9" ).css("display", "none");
    }

    if($("#latitude").val().length < 1){
      $( "#msj16" ).css("display", "block");
       valide=false;
    }else{
      $( "#msj16" ).css("display", "none");
    }

    if($("#longitud").val().length < 1){
      $( "#msj17" ).css("display", "block");
       valide=false;
    }else{
      $( "#msj17" ).css("display", "none");
    }

    if($("#nbRue").val().length < 1){
      $( "#msj1" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj1" ).css("display", "none");
    }

    if($("#nomRue").val().length < 1){
      $( "#msj2" ).css("display", "block");
      valide=false;
    }else{
      $( "#msj2" ).css("display", "none");
    }

    if($("#ville").val().length < 1){
      $( "#msj3" ).css("display", "block");
       valide=false;
    }else{
      $( "#msj3" ).css("display", "none");
    }

    if($("#titre").val().length > 1 && $("#latitude").val().length > 1 && $("#longitud").val().length > 1 && $("#nbRue").val().length > 1 && $("#nomRue").val().length > 1 && $("#ville").val().length > 1){

      valide=true;
    }

    if(valide==true){

      document.form4.submit();
    }

 }



    /**
     * Fonction validation de formulaire
     * @author Carlos VASQUEZ 
     */

 function montreArtiste(){
    $( ".btnFormArtiste" ).click(function() {

        $( "#form2" ).css("display", "block").toggle("fast");

    });
 }

    /**
     * Fonction validation de formulaire
     * @author Carlos VASQUEZ 
     */

 function montreMateriaux(){

    $( ".btnMateriaux" ).click(function() {

        $( "#form3" ).css("display", "block").toggle("fast");

    });
 }


    /**
     * Fonction chargement des inputs recherche
     * @author Alexandre BOUET
     */


function handleChange() 
{
    if (document.getElementById('radioArtiste').checked) {
        document.getElementById('sectionSelectArtistes').style.display = 'block';
        document.getElementById('sectionSelectCategories').style.display = 'none';
        document.getElementById('sectionSelectMateriaux').style.display = 'none';
        document.getElementById('sectionSelectArrondissement').style.display = 'none';
    }
    
    if (document.getElementById('radioCat').checked) {
        document.getElementById('sectionSelectCategories').style.display = 'block';
        document.getElementById('sectionSelectArtistes').style.display = 'none';
        document.getElementById('sectionSelectMateriaux').style.display = 'none';
        document.getElementById('sectionSelectArrondissement').style.display = 'none';
    }    
    
    if (document.getElementById('radioMat').checked) {
        document.getElementById('sectionSelectMateriaux').style.display = 'block';
        document.getElementById('sectionSelectArtistes').style.display = 'none';
        document.getElementById('sectionSelectCategories').style.display = 'none';
        document.getElementById('sectionSelectArrondissement').style.display = 'none';
    }    
    
    if (document.getElementById('radioArr').checked) {
        document.getElementById('sectionSelectArrondissement').style.display = 'block';
        document.getElementById('sectionSelectMateriaux').style.display = 'none';
        document.getElementById('sectionSelectCategories').style.display = 'none';
        document.getElementById('sectionSelectArtistes').style.display = 'none';
    }

 
}



    /**
     * Fonction AJAX pour la recherche d'oeuvres ainsi que l'affichage des informations des oeuvres non valides
     * @author Cristian MANRIQUE 
     * @author Alexandre BOUET 
     */

(function(){

    window.addEventListener('load', function(){

        //Initialiser les variables
        var xhr;
        var choixDuSelectArtistes = document.querySelector('#choixDuSelectArtistes');
        var choixDuSelectCategorie = document.querySelector('#choixDuSelectCategorie');
        var choixDuSelectMateriaux = document.querySelector('#choixDuSelectMateriaux');
        var choixDuSelectArrondissement = document.querySelector('#choixDuSelectArrondissement');
        var choixOeuvresNonValides = document.querySelector('#choixOeuvreNonValide');


        //Voici les variable post pour le xhr.send
        //index.php?artistes=artistes&categorie=categorie&materiaux=materiaux&arrondissement=Cote-des-neiges

        //console.log(choixDuSelectArtistes.value);
        //console.log(choixDuSelectCategorie.value);
        //console.log(choixDuSelectArrondissement.value);
        //console.log(choixDuSelectArrondissement.value);

        if(choixDuSelectArtistes)
        {

            choixDuSelectArtistes.addEventListener('change', function(){

                console.log(choixDuSelectArtistes.value);//Check la valeur du select

                //Permet d'envoyer une requet au serveur
                xhr = new XMLHttpRequest();

                //appel du controler
                //.open = envoyer la requete en param ("method", "url")
                xhr.open("POST", "ajaxControler.php?requete=rechercheParArtistes");

                //To POST data like an HTML form, add an HTTP header with setRequestHeader().
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                //Stocker la valeur du select dans la var champ
                var champ = document.querySelector('[name="artistes"]');
                //console.log("champ value = "+champ.value);

                //Envoyer la valeur du select à URL de la page
                xhr.send("page=accueil&artistes="+champ.value);

                //console.log("xhr= "+xhr.send);

                //Vérification de la requête xhr
                xhr.onreadystatechange = function(e){
                //console.log(e);

                    if(e.target.readyState == 4 && e.target.status == 200)
                        {
                            console.log(e.target.responseText);

                            //Cibler la div à changer
                            var elementRes = document.querySelector('[name="changementRecherche"]');
                            console.log(elementRes);
                            //si oui, envoyer les modifications
                            if(elementRes)
                            {
                                elementRes.innerHTML = e.target.responseText;
                            }
                        }

                }


            });
        }//FIN du if


        if(choixDuSelectCategorie)
        {

            choixDuSelectCategorie.addEventListener('change', function(){

                console.log(choixDuSelectCategorie.value);//Check la valeur du select

                //Permet d'envoyer une requet au serveur
                xhr = new XMLHttpRequest();

                //appel du controler
                //.open = envoyer la requete en param ("method", "url")
                xhr.open("POST", "ajaxControler.php?requete=rechercheParCategorie");

                //To POST data like an HTML form, add an HTTP header with setRequestHeader().
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                //Stocker la valeur du select dans la var champ
                var champ = document.querySelector('[name="categorie"]');
                console.log("champ value = "+champ.value);

                //Envoyer la valeur du select à URL de la page
                xhr.send("page=accueil&categorie="+champ.value);

                //console.log("xhr= "+xhr.send);

                //Vérification de la requête xhr
                xhr.onreadystatechange = function(e){
                //console.log(e.target);

                    if(e.target.readyState == 4 && e.target.status == 200)
                        {
                            console.log(e.target.responseText);

                            //Cibler la div à changer
                            var elementRes = document.querySelector('[name="changementRecherche"]');
                            console.log(elementRes);
                            //si oui, envoyer les modifications
                            if(elementRes)
                            {
                                elementRes.innerHTML = e.target.responseText;
                            }
                        }
                }
            });
        }//FIN du if

        if(choixDuSelectMateriaux)
        {

            choixDuSelectMateriaux.addEventListener('change', function(){

                console.log(choixDuSelectMateriaux.value);//Check la valeur du select

                //Permet d'envoyer une requet au serveur
                xhr = new XMLHttpRequest();

                //appel du controler
                //.open = envoyer la requete en param ("method", "url")
                xhr.open("POST", "ajaxControler.php?requete=rechercheParMateriaux");

                //To POST data like an HTML form, add an HTTP header with setRequestHeader().
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                //Stocker la valeur du select dans la var champ
                var champ = document.querySelector('[name="materiaux"]');
                console.log("champ value = "+champ.value);

                //Envoyer la valeur du select à URL de la page
                xhr.send("page=accueil&materiaux="+champ.value);

                //console.log("xhr= "+xhr.send);

                //Vérification de la requête xhr
                xhr.onreadystatechange = function(e){
                //console.log(e.target);

                    if(e.target.readyState == 4 && e.target.status == 200)
                        {
                            console.log(e.target.responseText);

                            //Cibler la div à changer
                            var elementRes = document.querySelector('[name="changementRecherche"]');
                            //console.log(elementRes);
                            //si oui, envoyer les modifications
                            if(elementRes)
                            {
                                elementRes.innerHTML = e.target.responseText;
                            }
                        }
                }
            });
        }//FIN du if


        if(choixDuSelectArrondissement)
        {

            choixDuSelectArrondissement.addEventListener('change', function(){

                console.log(choixDuSelectArrondissement.value);//Check la valeur du select

                //Permet d'envoyer une requet au serveur
                xhr = new XMLHttpRequest();

                //appel du controler
                //.open = envoyer la requete en param ("method", "url")
                xhr.open("POST", "ajaxControler.php?requete=rechercheParArrondissements");

                //To POST data like an HTML form, add an HTTP header with setRequestHeader().
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                //Stocker la valeur du select dans la var champ
                var champ = document.querySelector('[name="arrondissement"]');
                console.log("champ value = "+champ.value);

                //Envoyer la valeur du select à URL de la page
                xhr.send("page=accueil&arrondissement="+champ.value);

                console.log("xhr= "+xhr.send);

                //Vérification de la requête xhr
                xhr.onreadystatechange = function(e){
                console.log(e.target);

                    if(e.target.readyState == 4 && e.target.status == 200)
                        {
                            console.log(e.target.responseText);

                            //Cibler la div à changer
                            var elementRes = document.querySelector('[name="changementRecherche"]');
                            console.log(elementRes);
                            //si oui, envoyer les modifications
                            if(elementRes)
                            {
                                elementRes.innerHTML = e.target.responseText;
                            }
                        }
                }
            });
        }//FIN du if        
        
        if(choixOeuvresNonValides)
        {

            choixOeuvresNonValides.addEventListener('change', function(){

                console.log(choixOeuvresNonValides.value);//Check la valeur du select

                //Permet d'envoyer une requet au serveur
                xhr = new XMLHttpRequest();

                //appel du controler
                //.open = envoyer la requete en param ("method", "url")
                xhr.open("POST", "ajaxControler.php?requete=choixOeuvresNonValides");

                //To POST data like an HTML form, add an HTTP header with setRequestHeader().
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                //Stocker la valeur du select dans la var champ
                var champ = document.querySelector('[name="choixOeuvresNonValides"]');
                console.log("champ value = "+champ.value);

                //Envoyer la valeur du select à URL de la page
                xhr.send("page=adminValide&idOeuvre="+champ.value);

                console.log("xhr= "+xhr.send);

                //Vérification de la requête xhr
                xhr.onreadystatechange = function(e){
                console.log(e.target);

                    if(e.target.readyState == 4 && e.target.status == 200)
                        {
                            console.log(e.target.responseText);

                            //Cibler la div à changer
                            var elementRes = document.querySelector('[name="chargementInfo"]');
                            console.log(elementRes);
                            //si oui, envoyer les modifications
                            if(elementRes)
                            {
                                elementRes.innerHTML = e.target.responseText;
                            }
                        }
                }
            });
        }//FIN du if



    });

})();

        /**
     * Fonction validation de formulaire d'ajoute catégorie par l'admin
     * @author Carlos VASQUEZ 
     * @author Stéphane Leclerc
     */


function validationForm5()
{

  if($("#nomCat").val().length < 1){
    $( "#msj12" ).css("display", "block");
    valide=false;
  }else{
    $( "#msj12" ).css("display", "none");
  }

  if($("#nomCatEN").val().length < 1){
    $( "#msj13" ).css("display", "block");
    valide=false;
  }else{
    $( "#msj13" ).css("display", "none");
  }

  if(($("#nomCat").val().length > 1 && $("#nomCatEN").val().length > 1)){

    valide=true;
  }

  if(valide==true){

    document.form5.submit();
  }

}

        /**
     * Fonction qui recupére les informations de l'image croppée (panneau d'administration)
     * @author BOUET Alexandre 
     */


function crop()
    {
      var posi = document.getElementById('crop_div');
      document.getElementById("top").value=posi.offsetTop;
      document.getElementById("left").value=posi.offsetLeft;
      document.getElementById("right").value=posi.offsetWidth;
      document.getElementById("bottom").value=posi.offsetHeight;
      return true;
    }


function affichageEtape2() 
{
    document.getElementById('Etape2Admin').style.display="block";
}


function loadFile(event) 
{
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('crop_wrapper').style.display="block";
}

   






