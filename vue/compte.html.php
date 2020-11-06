
<?php  if(isset($_SESSION['user'])){

    ?>
    <div class="allcompte">

        <h2>Modification du compte</h2>
        <br /><br />

        <form method="POST" action="index.php?action=compte">
            <table>
                <?php
                foreach ($_SESSION['user'] as $item =>$value){
                    if($item!="ville" && $item!="id") {
                        echo '
        <tr>
            <td align="right">
                <label for="' . $item . '">' . $item . ' :</label>
            </td>
            <td>
                <input type="text" value="' . $value . '" id="' . $item . '" name="' . $item . '" />
            </td>
        </tr>';
                    }
                    elseif($item!="id") {
                        $selected="";
                        echo' <td class="villlllle">Ville :  </td><td><select name="ville"> ';

                        foreach ($lesVilles as $ville){
                            if($ville['nom']==$value)$selected="selected";
                            echo' <option '.$selected.' value="'.$ville['id'].'" >'.$ville['nom'].'</option>';
                        }
                        echo '</select></td>';
                    }
                }

                ?>


            </table><br><br>
            <input class="formmodifier" type="submit" name="formmodifier" value="Modifier !" /><br><br>

        </form>
    </div>
    <?php
}

