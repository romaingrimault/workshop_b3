
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <!--<title><?php echo $titre ?></title> A RAJOUTER SUR CHAQUE VUE -->
        <style type="text/css">
            @import url("css/base.css");
            @import url("css/form.css");
            @import url("css/cgu.css");
            @import url("css/corps.css");
            @import url("css/maps.css");
            @import url("css/MarkerCluster.css");
            @import url("css/MarkerCluster.Default.css");
        </style>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    </head>
    <body>
    <nav>
            
        <ul id="menuGeneral">
            <li id="logo"><a href="./?action=accueil"><img src="images/logo.png" style="width:64px;height:64px" alt="logo" /></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="./?action=recherche">Recherche</a></li>
            
            <?php 
            if(isset($_SESSION['profil']))
            {
                echo"<li><a href='./?action=deconnexion'>Déconnexion</a></li>";
            }
            else{
                echo "<li><a href='./?action=connexion'><img src='images/profil.png'/>Connexion</a></li>";
            }
           
            ?>

        </ul>
    </nav>

    <div id="corps">