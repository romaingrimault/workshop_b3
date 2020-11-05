


<h2>Inscription</h2>
<br /><br />

<form method="POST" action="index.php?action=inscription">
    <table>
        <tr>
            <td align="right">
                <label for="prenom">Prenom :</label>
            </td>
            <td>
                <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" />
            </td>
        </tr>
        <td align="right">
            <label for="nom">Nom :</label>
        </td>
        <td>
            <input type="text" placeholder="Votre nom" id="nom" name="nom" " />
        </td>
        </tr>
        <tr>
            <td align="right">
                <label for="mail">Mail :</label>
            </td>
            <td>
                <input type="email" placeholder="Votre mail" id="mail" name="mail" />
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="mail2">Confirmation du mail :</label>
            </td>
            <td>
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"  />
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="mdp">Mot de passe :</label>
            </td>
            <td>
                <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="mdp2">Confirmation du mot de passe :</label>
            </td>
            <td>
                <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="ville">Ville :</label>
            </td>

            <td>
                <select name="ville">

                    <?php
                    foreach ($lesVilles as $ville){
                        echo ' <option value="'.$ville['id'].'" >'.$ville['nom'].'</option>';
                    } ?>
                </select>
            </td>
        </tr>
        <tr>

        <tr>
            <td align="right">
                <label for="age">Age :</label>
            </td>
            <td>
                <input type="text" placeholder="age" id="age" name="age" />
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="adresse">Adresse :</label>
            </td>
            <td>
                <input type="text" placeholder="Adresse" id="adresse" name="adresse" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="center">
                <br />
                <input type="submit" name="forminscription" value="Je m'inscris" /><br><br>
                <Button><a href="index.php?action=connexion">Connexion</a></BUTton>

            </td>
        </tr>

    </table>


</form>