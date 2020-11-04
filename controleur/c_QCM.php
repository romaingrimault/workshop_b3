<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.QCM.inc.php";

switch($action)
{
	case 'qcm':
	{ 
		include_once "$racine/modele/bd.QCM.inc.php";

		$questions = getQuestionsQCM();
		$reponses = getReponsesQCM();
		
		include "$racine/vue/v_QCM.php";
		break;
	}
}
?>