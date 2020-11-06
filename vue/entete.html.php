
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <!--<title><?php echo $titre ?></title> A RAJOUTER SUR CHAQUE VUE -->
    <style type="text/css">
        @import url("css/base.css");
        @import url("css/menu.css");
        @import url("css/footer.css");
        @import url("css/boostrap.css");
        @import url("css/accueil.css");
        @import url("css/form.css");
        @import url("css/cgu.css");
        @import url("css/corps.css");
        @import url("css/maps.css");
        @import url("css/MarkerCluster.css");
        @import url("css/MarkerCluster.Default.css");




    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="\workshop_b3-master\ajax\ScriptAccueil.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGXUW7tIJQkzRxToqxCYrpHnRjwIaLXEk&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="\workshop_b3-master\css\accueil.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="./?action=accueil"><img class="logogo" src="images/logo_ecostreet.png" alt="logo" /></a>
            </button>
            <img class="gifHeader" src="https://media.giphy.com/media/Vd9BqHOvmyXOSScrXd/giphy.gif" width="200px" height="200px" alt="">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="./?action=accueil" id="navbarDropdown">
                            ACCUEIL
                        </a>
                    </li>

                    <div class="separateur"></div>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="./?action=qcm" id="navbarDropdown">
                            QCM
                        </a>

                    </li>

                    <div class="separateur"></div>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="./?action=forum" id="navbarDropdown">
                            FORUM
                        </a>
                    </li>

                    <div class="separateur"></div>
<?php
                    if(isset($_SESSION['user']['id'])) {
                       echo '<li class="nav-item dropdown" >
                        <a class="nav-link" href = "./?action=compte" id = "navbarDropdown" >
                            COMPTE
                        </a >

                    </li >';
                        echo '
                    <div class="separateur"></div>

                    <li class="nav-item dropdown" >
                        <a class="nav-link" href = "./?action=deconnexion" id = "navbarDropdown" >
                            DECONNEXION
                        </a >

                    </li >';
                    }
                    else{
                        echo '<li class="nav-item dropdown" >
                        <a class="nav-link" href = "./?action=connexion" id = "navbarDropdown" >
                            CONNEXION
                        </a >

                    </li >';

                    }
 ?>
                    <!--   <?php /*     -------------A mettre dans la page "Mon compte" --------------------
       if(isset($_SESSION['profil']))
            { ?>
                <div class="separateur"></div>

                <li class="nav-item dropdown">
                  <a class="nav-link" href="./?action=deconnexion" id="navbarDropdown">
                          Déconnexion
                  </a>

                </li>
           <?php  }
       //     else   { ?>
                <div class="separateur"></div>

                <li class="nav-item dropdown">
                  <a class="nav-link" href="./?action=connexion" id="navbarDropdown">
                          Connexion
                  </a>

                </li>
           <?php  }
           */ ?>

            -->

                </ul>
            </div>
        </nav>


    </header>






    <div id="corps">







