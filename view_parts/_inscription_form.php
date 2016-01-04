<?php
var_dump($_POST);
?>

<form id="formulaire" method="post">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom']:''?>"/>
    <label for="nom">Nom de famille :</label>
    <input type="text" id="nom" name="nom" value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom']:''?>"/>
    <label for="courriel">Courriel :</label>
    <input type="text" id="courriel" name="courriel" value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel']:''?>"/>
    <label for="username">Username :</label>
    <input type="text" id="username" name="username" value="<?php echo array_key_exists('username', $_POST) ? $_POST['username']:''?>"/>
    <label for="password">Password :</label>
    <input type="password" id="password" name="username" value="<?php echo array_key_exists('password', $_POST) ? $_POST['password']:''?>"/>
    <input type="submit" value="Inscrire"/>
</form>