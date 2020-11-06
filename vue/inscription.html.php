
<div class="containerInscription">
    <h2>Inscription</h2>
    <br /><br />

    <form style="justify-content: center;display: flex;" method="POST" action="index.php?action=inscription">
        <table>
            <tr>
                <td>
                    <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" />
                </td>
            </tr>

            <td>
                <input type="text" placeholder="Votre nom" id="nom" name="nom" />
            </td>
            </tr>
            <tr>

                <td>
                    <input type="email" placeholder="Votre mail" id="mail" name="mail" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"  />
                </td>
            </tr>
            <tr>

                <td>
                    <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                </td>
            </tr>
            <tr>

                <td>
                    <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                </td>
            </tr>
            <tr>


                <td>
                    <select name="ville" style="    width: 100%;
    border-radius: 5px;
    height: 40px;">

                        <?php
                        foreach ($lesVilles as $ville){
                            echo ' <option value="'.$ville['id'].'" >'.$ville['nom'].'</option>';
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>

            <tr>
                <td>
                    <input type="text" placeholder="age" id="age" name="age" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" placeholder="Adresse" id="adresse" name="adresse" />
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br />
                    <input type="submit" name="forminscription" value="Je m'inscris" /><br><br>
                    <button class="buttonconnexion"><a href="index.php?action=connexion">Connexion</a></button>

                </td>
            </tr>

        </table>


    </form></center>
</div>