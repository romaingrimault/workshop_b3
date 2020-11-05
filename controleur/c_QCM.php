<script type="text/javascript" src="ajax/script.js"></script>
<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "vue/entete.html.php";


include_once "$racine/modele/bd.QCM.inc.php";
if(isset($_SESSION['user'])){ //Utilisateur connecté
   switch($action)
	{
		case 'qcm':
		{ 
			
			$nbQ = getNombresQuestionsQCM();
			//$listeIdQ = getListeIdQuestions();
			$questions = getQuestionsQCM();
			$reponses = getReponsesQCM();

			include "$racine/vue/v_QCM.php";
			?> <script>
				var init = function () {
					var div1 = document.getElementById(1);
					div1.style.display = "block";
				};
				// on exécute la fonction
				init();
			</script> <?php
			break;
		}
		case 'confirmqcm':
		{ 
			$questions = getQuestionsQCM();	
			foreach($questions as $uneQuestion) 
	        { 
	        	$iduneQuestion = $uneQuestion['id'];
				$idLaReponse = $_REQUEST[$iduneQuestion];
				reponseUtilisateur($iduneQuestion, $idLaReponse, $_SESSION['user']['id']); //Envoyer les données dans la bdd
				//Remplacer 3 par l'id de l'utilisateur

			}
			
			$totalpts = totalPtsQCM($_SESSION['user']['id']);
			include "$racine/vue/v_finQCM.php";
			//Remplacer 3 par l'id de l'utilisateur
			//include "$racine/vue/v_QCM.php";


			break;
		}
	}
}
else{ //Utilisateur NON connecté 
	?>
	<center>
	    <div>Vous ne pouvez pas répondre au QCM sans être connecté. </div> <br/>
	    <BUTton class="inscription"><a href="index.php?action=connexion">Se connecter / Créer un compte</a></BUTton>
	</center>	
    <?php
}


?>
