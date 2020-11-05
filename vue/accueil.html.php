<?php
if(isset($_SESSION['user'])){

    echo '<div>VOUS ETES CONNECTE!</div>';
}
else{
    echo '<div>Bienvenu</div>';
}
