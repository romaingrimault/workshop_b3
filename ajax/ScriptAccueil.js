
    // Initilaisation de la carte Google Maps
    function initMap() {}


    // Fonction appellée dès le chargement de la page
    $(window).on("load", function () {

        document.getElementById("Collecte").style.display = 'none'; 
        document.getElementById("composte").style.display = 'none'; 


        // Récupération lors du submit de l'adresse entrée par l'utilistaeur
        document.getElementById("validation").addEventListener("click", function () {
            AdresseUser = document.getElementById("AdresseUtilisateur").value + ", Paris";
            validation();
        });

    // Initilaisations des variables pour les coordonnées de l'adresse de l'utilisateur
    let lat = 0;
    let long = 0;

    // Fonction appellée à cahque activation du bouton adresse submit 
    function validation(){

        // Nombre d'adresses de depot textile à récupérer via l'API Data Paris
        let NombreDeColonnes = 195
        let NombredeCompostes = 29

        // Appel Ajax sur l'API pour connaitres les coordonnées GPS de l'adresse de l'utilisateur
        $.ajax({
            type: "GET",
            url: "http://open.mapquestapi.com/geocoding/v1/address?key=gvljtxmIyLCdhFQyMZVw8h0HINWRoA7a&location=" + AdresseUser + "",
            dataType: "json",
            success: function (result, status, xhr) {
                res = AssignationCoord(result);
            },
        });

        // Fonction assignant aux variables lat et long les coordonnées de l'adresse de l'utilisateur 
        function AssignationCoord(json) {
            
            // Sont assignées aux variables les coordonées de l'adresse de l'utilisateur (issues du JSon récupéré via appel Ajax)
            lat = json.results[0].locations[0].latLng.lat;
            long = json.results[0].locations[0].latLng.lng;        

            // Appel Ajax pour récuperer les enregistrements de lieux de dépots textiles depuis l'APi Open Data de Paris, donénes passées dans un Json
            $.ajax({
                type: "GET",
                url: "https://opendata.paris.fr/api/records/1.0/search/?dataset=dechets-menagers-points-dapport-volontaire-conteneur-textile&q=&rows=" + NombreDeColonnes + "",
                dataType: "json",
                success: function (result, status, xhr) {
                res = CalculDistanceDepot(result);
                },
            });

            // Appel Ajax pour récuperer les enregistrements de lieux de composte depuis l'APi Open Data de Paris, donénes passées dans un Json
            $.ajax({
                type: "GET",
                url: "https://opendata.paris.fr/api/records/1.0/search/?dataset=dechets-menagers-points-dapport-volontaire-composteurs&q=&rows=" + NombredeCompostes + "",
                dataType: "json",
                success: function (result, status, xhr) {
                res = CalculDistanceCompost(result);
                },
            });

        }

        function CalculDistanceCompost(json) {

            let monTableau = new Array(NombredeCompostes);
            let DistanceMin = 1000;
            let AdresseProche = "";
            let lati = 0;
            let longi = 0;

            for (var i = 0; i < NombredeCompostes; i++){
                monTableau[i] = new Array(3);
                monTableau[i][0] = json.records[i].fields.adresse;
                monTableau[i][1] = json.records[i].geometry.coordinates[1];
                monTableau[i][2] = json.records[i].geometry.coordinates[0];

                if (distance(monTableau[i][1], monTableau[i][2], lat, long) < DistanceMin ) {
                    AdresseProche = monTableau[i][0];
                    lati = monTableau[i][1]
                    longi =  monTableau[i][2]
                    DistanceMin = (distance(monTableau[i][1], monTableau[i][2], lat, long));
                }

            }

            if(DistanceMin>100){
                document.getElementById("MessageComposte").textContent = "";
            } else {
                document.getElementById("MessageComposte").textContent = "Il y a un point de collecte de composte se trouvant à " + Math.round( (DistanceMin * 1000) *10 / 10) + " m de chez vous (" + AdresseProche + ").";
            }
        

            ReglageCarteComposte(lati, longi);
        }

        // Fonction calculant la plus courte distance entre les coordonnées de l'utilisateur et les coordonnées des points de dépôts textiles du JSon
        function CalculDistanceDepot(json) {

                        let monTableau = new Array(NombreDeColonnes);
                        let DistanceMin = 1000;
                        let AdresseProche = "";
                        let lati = 0;
                        let longi = 0;

                        for (var i = 0; i < NombreDeColonnes; i++){
                            monTableau[i] = new Array(3);
                            monTableau[i][0] = json.records[i].fields.adresse;
                            monTableau[i][1] = json.records[i].geometry.coordinates[1];
                            monTableau[i][2] = json.records[i].geometry.coordinates[0];

                            if (distance(monTableau[i][1], monTableau[i][2], lat, long) < DistanceMin ) {
                                AdresseProche = monTableau[i][0];
                                lati = monTableau[i][1]
                                longi =  monTableau[i][2]
                                DistanceMin = (distance(monTableau[i][1], monTableau[i][2], lat, long));
                            }

                        }
                        
                        
                        // Si la plus courte distance entre l'utilisateur et le pointd e dépots est > 100 km, on cosnidère l'adresse invalide
                        if(DistanceMin>100){
                            document.getElementById("AdresseInvalide").textContent = "Malheureusement l'adresse que vous avez saisie semble être incorrecte et / ou n'st pas reconnue";
                            document.getElementById("MessageCollecte").textContent = "";
                        } else {
                            document.getElementById("Collecte").style.display = 'block';
                            document.getElementById("composte").style.display = 'block'; 
                            document.getElementById("AdresseInvalide").textContent = "";
                            document.getElementById("MessageCollecte").textContent = "Un conteneur textile se trouve à seulement " + Math.round( (DistanceMin * 1000) *10 / 10) + " m de chez vous (" + AdresseProche + ").";
                        }

                        // Appel de la méthode parametrant la map déjà initialisée
                        ReglageCarteTextile(lati, longi);
                        }
                        

        
        // Fonction permettant de calculer la distance entre deux coordonnées GPS
        function distance(lat1, lon1, lat2, lon2) {

                        if ((lat1 == lat2) && (lon1 == lon2)) {
                            return 0;
                        }
                        else {
                            var radlat1 = Math.PI * lat1/180;
                            var radlat2 = Math.PI * lat2/180;
                            var theta = lon1-lon2;
                            var radtheta = Math.PI * theta/180;
                            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                            if (dist > 1) {
                                dist = 1;
                            }
                            dist = Math.acos(dist);
                            dist = dist * 180/Math.PI;
                            dist = dist * 60 * 1.1515;
                            dist = dist * 1.609344;
                            return dist;
                            
                        }
        }

        // Parametrage de la carte
        function ReglageCarteTextile(latde, longde) {

            // Parametrage de l'icone representant le depot sur lm carte
            let icondepot = {
                url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png", // url
                scaledSize: new google.maps.Size(45, 45), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 45) // anchor
            };

            // The location of depot
            let depot = { lat: latde, lng: longde };
            let adresse = { lat: lat, lng: long };
            let centerpt = { lat: ((latde+lat)/2), lng: ((longde+long)/2) };
            // The map, centered at (depot + adresse) / 2
            let map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: centerpt,
            });
            // The marker, positioned at depot
            const marker = new google.maps.Marker({
            position: depot,
            map,
            icon : icondepot,
            label: "Depôt",
            });

             // The marker, positioned at domicile
            const marker2 = new google.maps.Marker({
                position: adresse,
                map: map,
                label: "Domicile",
            });

        }

         // Parametrage de la carte
         function ReglageCarteComposte(latde, longde) {

            // Parametrage de l'icone representant le composte sur lm carte
            let iconcomposte = {
                url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png", // url
                scaledSize: new google.maps.Size(45, 45), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 45) // anchor
            };

            // The location of composte
            let composte = { lat: latde, lng: longde };
            let adresse = { lat: lat, lng: long };
            let centerpt = { lat: ((latde+lat)/2), lng: ((longde+long)/2) };
            // The map, centered at (composte + adresse) / 2
            let map2 = new google.maps.Map(document.getElementById("map2"), {
            zoom: 14,
            center: centerpt,
            });
            // The marker, positioned at composte
            const marker3 = new google.maps.Marker({
            position: composte,
            map: map2,
            icon : iconcomposte,
            label: "composte",
            });

             // The marker, positioned at domicile
            const marker4 = new google.maps.Marker({
                position: adresse,
                map: map2,
                label: "Domicile",
            });

        }

    }

});

