<?php
var_dump($_POST);
$nom_ok = false;
if (array_key_exists('nom', $_POST)) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $nom = filter_var($nom, FILTER_VALIDATE_REGEXP);
//validation du username : des alphas minuscules et des chiffres avec un minimum de 4 caractères
    $nom_ok = (1 === preg_match('/^[a-zA-Z]{2, }$/', $nom));
    var_dump($nom);
    var_dump($nom_ok);
}
$prenom_ok = false;
if (array_key_exists('prenom', $_POST)) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
    $prenom = filter_var($prenom, FILTER_VALIDATE_REGEXP);
//validation du username : des alphas minuscules et des chiffres avec un minimum de 4 caractères
    $prenom_ok = (1 === preg_match('/^[a-zA-Z]{2, }$/', $prenom));
    var_dump($prenom);
    var_dump($prenom_ok);
}
$corriel_ok = false;
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_MAGIC_QUOTES);
    $courriel = filter_var($courriel, FILTER_SANITIZE_STRING);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
//validation du username : des alphas minuscules et des chiffres avec un minimum de 4 caractères
    $courriel_ok = (1 === preg_match('/^[a-z]{4, }$@./', $courriel));
    var_dump($courriel);
    var_dump($courriel);
}
$username_ok = false;
if (array_key_exists('username', $_POST)) {
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
$username = filter_var($username, FILTER_SANITIZE_STRING);
$username = filter_var($username, FILTER_VALIDATE_REGEXP);
//validation du username : des alphas minuscules et des chiffres avec un minimum de 4 caractères
$username_ok = (1 === preg_match('/^[a-z0-9]{4, }$/', $username));
var_dump($username);
var_dump($username_ok);
}
$password_ok = false;
if (array_key_exists('password', $_POST)){
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $username = filter_var($password, FILTER_VALIDATE_REGEXP);
    //validation du username : des alphas minuscules et des chiffres avec un minimum de 4 caractères
    $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$!*?]{8, }$/', $password));
    var_dump($password);
    var_dump($password_ok);
}
if ($prenom && $nom && $courriel && $username_ok && $password_ok){
    //On enregistre les données et s'en va sur une autre page
    header("Location: php_donnees_ok.php"); //redirection http
}
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