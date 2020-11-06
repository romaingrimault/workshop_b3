
<!doctype html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="\workshop_b3-master\css\accueil.css">
  <link rel="stylesheet" href="\workshop_b3-master\css\bootstrap.css">
  <link rel="stylesheet" href="\workshop_b3-master\css\menu.css">
  <link rel="stylesheet" href="\workshop_b3-master\css\footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="\workshop_b3-master\ajax\ScriptAccueil.js"></script>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGXUW7tIJQkzRxToqxCYrpHnRjwIaLXEk&callback=initMap&libraries=&v=weekly"
      defer
      ></script>
</head>
<body>

	<main>

    <div class="infoaccueil">



        <div id="saisie">

            <h1 id="TitreParis">Paris de demain</h1>
            <H3 id="SousTitreParis">De nouveaux gestes écoogiques simples près de cheez vous</h3>
            <label for="Adress">Saisissez votre adresse : </label>
            <input type="text" id="AdresseUtilisateur" name="adresse-utilisateur" />
            <button id="validation" type="submit">Valider</button>
        </div>

        <div class="information">

            <em><p id="AdresseInvalide"> </p></em>


            <p id="MessageCollecte"> </p>

            <div id="Collecte">

                <div id="TexteCollecte">
                    <p id="InformationCollecte">Ne jetez <span id="test"> pas vos</span> vêtements, foulards, gants et bonnets, draps et serviettes, nappes et mouchoirs, chaussures de ville et de sport, tongs et sandales…, même usés, ils peuvent servir et être valorisés !
Trois opérateurs de la collecte des textiles, Le Relais 75, Le Relais Val-de-Seine et Ecotextile, mettent à votre disposition plus de 300 conteneurs sur le territoire parisien.
Les textiles, linges et chaussures déposés sont ensuite triés, et soit revendus pour être réemployés, soit recyclés
</p>
                </div>

                <div id="map"></div>
            </div>

            <div id="composte">
            <p id="MessageComposte"> </p>
            <p id="InformationComposteIntro">À Paris, les déchets organiques représentent encore 22 % des ordures ménagères du bac à couvercle vert. Composter ses biodéchets permet de recycler ses déchets de cuisine et de jardin et de produire naturellement de l’engrais pour les plantations.
En triant et valorisant ses biodéchets à la source grâce au compostage, on peut réduire de 77 kg le poids de déchets produits par an par habitant !
            </p>
            <div id="maliste">
            <h4 id="InformationComposteTitre">Quels déchets composter ?</h4>
            <ul>
                <li>épluchures de fruits et légumes</li>
                <li>restes alimentaires</li>
                <li>coquilles d’œufs</li>
                <li>marc de café, sachets de thé</li>
                <li>filtres en papier</li>
                <li>essuie-tout</li>
                <li>cartons salis à déchiqueter</li>
                <li>feuilles mortes</li>
                <li>plantes d’intérieur</li>
                <li>fleurs fanées</li>
                <li>   résidus végétaux…</li>
            </ul>
            </div>

            <div id="map2"></div>
            </div>
        </div>


    </div>
    </main>

</body>
</html>