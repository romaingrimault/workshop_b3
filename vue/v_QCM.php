<html>
    <head>
        <script language="JavaScript">
        window.history.forward();
        </script>
        <script type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript" src="ajax/script.js"></script>
    </head>
    <body>
        <form action="?action=confirmqcm" method="post">
            <H1>Mon niveau en écologie</H1><br/>

            <?php
            $i=1;
            foreach($questions as $uneQuestion) //On affiche toutes les questions
            { 
                ?><div style="display:none" id="<?php echo $i ?>"><?php
                    $iduneQuestion = $uneQuestion['id'];
                    $nomuneQuestion = $uneQuestion['nom']; 
                    echo '<H4>'. $nomuneQuestion .'</H4>'; 
                    
                    foreach($reponses as $uneReponse) //On affiche toutes les reponses a cette question
                    {
                        $idQ = $uneReponse['idQ'];
                        $idUneReponse = $uneReponse['idR'];
                        $nomUneReponse = $uneReponse['nom'];  
                        if($iduneQuestion === $idQ){
                            ?>
                            <input type="radio" id="<?php echo $idQ .'-'.$idUneReponse ?>" name="<?php echo $idQ ?>" value="<?php echo $idUneReponse ?>"><?php echo $nomUneReponse ?><br/>
                            <?php
                        }
                    }

                    if($i != 1) { ?>
                        <input type="button" class="boutonPre" value="Question précedente" onclick="QuestionPre(<?= $i ?>)">
                    <?php }
                    if($i != $nbQ) { 
                         ?>
                        <input type="button" class="boutonsuivant" value="Question suivante" onclick="QuestionSuivante(<?= $i ?>, <?= $iduneQuestion ?>)">
                    <?php }
                    
                    if($i == $nbQ){
                        ?>
                        
                        <input type="button" id="btn_fin" value="Confirmer mes réponses" onclick="QuestionFin(<?= $i ?>, <?= $iduneQuestion ?>)">

                    <?php } ?>

                    
                </div>
                <?php
                $i++;
            }?>
            <br><br>
        </form>
    </body>

</html>


