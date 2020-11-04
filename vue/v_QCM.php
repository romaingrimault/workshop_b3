<script language="JavaScript">
window.history.forward();
</script>
    <form action="index.php?action=qcmfini" method="post">
        <H1>Mon niveau en écologie</H1><br/>

            <?php //var_dump($questionreponse); ?>
            
                <?php
                
                foreach($questions as $uneQuestion) //On affiche toutes les questions
                {
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
                            <input type="radio" name="<?php echo $idQ ?>" value="<?php echo $idUneReponse ?>"><?php echo $nomUneReponse ?><br/>
                            <?php
                        }
                        
                    }
                }?>
            
       <br><br>


        <input type="button" value="Confirmer mes réponses" onclick="location.href='index.php?action=listePraticien'" >
    </form>




<!-- 
pattern="[a-zA-ZÀ-ÿ]"    -> tout les mots
pattern="[0-9]{5}"        
pattern="([A-Z]+[A-Z]?\-)?[0-9]{1,2} ?[0-9]{3}"   -> code postal
-->