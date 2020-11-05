
<?php  if(isset($_SESSION['user'])){

?>
    <div id="show">
        <h2>Votre Compte</h2>
        <div >
            <div class="containerInscription">
                <table>
                    <?php
                    foreach ($_SESSION['user'] as $item =>$value){
                        if ($item != "id" && $item!="ville") {
                            echo '<tr><td><label>' . strtoupper($item) . ' :'. strtoupper($value) . '</label></td></tr>';
                        }
                        elseif($item=="ville"){
                            echo '<tr><td><label>' . strtoupper($item) . ' :'. strtoupper($value['nom']) . '</label></td></tr>';
                        }
                    }?>
                    <input type="" onclick="swap()" name="formmodifier" value="Modifier !"/>
                </table>
            </div>
        </div >
    </div >

    <div id="form" style="display:none">
    <h2>Modification du compte</h2>
    <br/><br/>
    <div class="containerInscription">
     <form method="POST" action="index.php?action=compte">
         <input type="" onclick="swap()" name="formmodifier" value="Retour !"/>
            <table>
                <?php
                foreach ($_SESSION['user'] as $item => $value) {
                    if ($item != "ville" && $item != "id") {
                        echo '
                        <tr>
                            <td align="right">
                                <label for="' . $item . '">' . $item . ' :</label>
                            </td>
                            <td>
                                <input type="text" value="' . $value . '" id="' . $item . '" name="' . $item . '" />
                            </td>
                        </tr>';
                    } elseif ($item != "id") {
                        $selected = "";
                        echo ' <td><td align="right"> <label for="Ville">Ville :</label></td><td><select name="ville"> ';
                                                foreach ($lesVilles as $ville) {
                            if ($ville['nom'] == $value) $selected = "selected";
                            echo ' <option ' . $selected . ' value="' . $ville['id'] . '" >' . $ville['nom'] . '</option>';
                        }
                        echo '</select></td>';
                                                }
                }

                ?>


            </table>
    <input type="submit" name="formmodifier" value="Valider !"/><br><br>


</form>
    </div>
    </div>
    <script>
        function swap() {
            var elem=  document.getElementById("form");
            var elem2=  document.getElementById("show");
            if(getComputedStyle(elem).display=="none"){
                elem.style.display="block";
                elem2.style.display="none";
            }
            else{
                elem.style.display="none";
                elem2.style.display="block";
            }}
    </script>
<?php
}

