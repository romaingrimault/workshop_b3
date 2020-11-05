<div style="display:flex">
<?php

if(isset($_SESSION['user']['id'])){

echo '<form method="post" action="index.php?action=forum">
    <div class="form-group">
        <input type="hidden" name="action" value="mine">
    </div>
    <button type="submit" class="btn btn-primary">Mes Propositions</button>
</form>';
    echo '<form method="post" action="index.php?action=forum">
    <div class="form-group">
        <input type="hidden" name="action" value="new">
    </div>
    <button type="submit" class="btn btn-primary">Nouvelles Propositions</button>
</form>';
}
?>
<form method="post" action="index.php?action=forum">
    <div class="form-group">
        <input type="hidden" name="action" value="top">
    </div>
    <button type="submit" class="btn btn-primary">TOP Proposition</button>
</form>

<form method="post" action="index.php?action=forum">
    <div class="form-group">
        <input type="hidden" name="action" value="last">
    </div>
    <button type="submit" class="btn btn-primary">Dernière Proposition</button>
</form>
</div>

<div class="proposition" style="flex-direction: column; display: flex; align-items: center;">
<?php
if(!empty($propositionNew)){
    echo '<form action="index.php?action=forum" method="post">
        <input type="hidden" name="action" value="new">

            <div class="card" id="propostionNew" style="width: 600px;">
            <div class="card-body">
              <h5 class="card-title"><input type="text" name="propoTitre" placeholder="Votre titre"> </h5>
              <p class="card-text"><input type="text" name="propoBody" placeholder="Votre proposition"></p>
            </div>
                          <input type="submit" value="Proposer">

            </div>
           </form>';
}
if(!empty($propositions)){

foreach ($propositions as $proposition) {
    if(!empty($_SESSION['user']['id'])){
        $ret = lookVoted($proposition["id"]);
        $onclick='onclick="vote(' . $proposition["id"] . ')"';
    }
    else{
        $onclick="";
        $ret=false;
    }
    if (!$ret) {
        $style1 = "style=\"display: none\"";
        $style2 = "style=\"display: block\"";
    } else {
        $style2 = "style=\"display: none\"";
        $style1 = "style=\"display: block\"";
    }
    echo '<div class="card" id="propostion' . $proposition["id"] . '" style="width: 600px;">
    <div class="card-body">
        <h5 class="card-title">' . $proposition["titre"] . '</h5>
        <h6 class="card-title">Créé le : ' . $proposition["dateCreation"] . '</h6>
        <p class="card-text">' . $proposition["description"] . '</p>
        <div style="display:flex">';
    echo'
        <div class="voteon" '.$onclick.' ' . $style1 . '>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-award-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
              <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
            </svg>
        </div>
        <div class="voteoff" '.$onclick.'' . $style2 . ' >
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-award " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M9.669.864L8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193l-1.51-.229L8 1.126l-1.355.702-1.51.229-.684 1.365-1.086 1.072L3.614 6l-.25 1.506 1.087 1.072.684 1.365 1.51.229L8 10.874l1.356-.702 1.509-.229.684-1.365 1.086-1.072L12.387 6l.248-1.506-1.086-1.072-.684-1.365z"/>
              <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
            </svg>
        </div>';

        echo '<div class="compte" value="' . $proposition["nbVote"] . ' ">' . $proposition["nbVote"] . ' vote(s)</div>
        </div>
    </div>
</div>';
}
}
else{
    echo '<div>Il n\'y a pas de proposition</div>';
}

?>
</div>


<script>
    function vote(idPropostion) {
        var id ="propostion"+idPropostion;
        var card=document.getElementById(id);
        var voteon=card.getElementsByClassName("voteon");
        var voteoff=card.getElementsByClassName("voteoff");
        var compte=card.getElementsByClassName("compte");
        var num=compte[0].attributes[1].value;


        if(voteoff[0].style['display']=="block"){
            voteoff[0].style['display']="none";
            voteon[0].style['display']="block";
            num++;
            compte[0].innerHTML=num+" vote(s)";
            compte[0].attributes[1].value=num;
            $(document).ready(function(){
                $.ajax({
                    url : './ajax/forum-ajax.php', // La ressource ciblée
                    method : 'POST', // Le type de la requête HTTP.
                    data: {idPropo:idPropostion,state:1}
                });
            });


        }
        else{
            voteoff[0].style['display']="block";
            voteon[0].style['display']="none";
            num--;
            compte[0].innerHTML=num+" vote(s)";
            compte[0].attributes[1].value=num;
            $(document).ready(function(){
                $.ajax({
                    url : './ajax/forum-ajax.php', // La ressource ciblée
                    method : 'POST', // Le type de la requête HTTP.
                    data: {idPropo:idPropostion,state:0}
                });
            });
        }
    }
</script>