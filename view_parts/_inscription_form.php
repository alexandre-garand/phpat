<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/phpat/css/main.css" />
</head>

<?php
//var_dump($_POST); // Inspecter les données POST
$in_post = array_key_exists('register', $_POST); // En est en réception
//$in_post = ('POST' == $_SERVER['REQUEST_METHOD']); // On peut utiliser la méthode HTTP utilisée
/**
 * Validation du prenom
 */
$prenom_ok = false;
$prenom_msg = ''; // Message de feedback validation, affiché si non vide
if (array_key_exists('prenom', $_POST)) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    // Validation du prenom : min 2 caractères
    $prenom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $prenom));
    if ( ! $prenom_ok) { // Si le prénom n'est pas valide
        $prenom_msg = 'Le prénom ne doit contenir que des lettres (min 2).';
    }
//    var_dump($prenom);
//    var_dump($prenom_ok);
//    var_dump($prenom_msg);
}
/**
 * Validation du nom
 */
$nom_ok = false;
$nom_msg = '';
if (array_key_exists('nom', $_POST)) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    // Validation du nom: min 2 caracteres
    $nom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $nom));
    if ( ! $nom_ok) { // Si le prénom n'est pas valide
        $nom_msg = 'Le nom ne doit contenir que des lettres (min 2).';
    }
   // var_dump($nom);
    //var_dump($nom_ok);
    //var_dump($nom_msg);
}

/**
 * Validation du genre
 */
$gender_ok = array_key_exists('gender', $_POST);
$gender_msg = ''; // Message de feedback validation, affiché si non vide
if ( ! $gender_ok) { // Si le prénom n'est pas valide
    $gender_msg = 'Le sexe n\'est pas coché.';
}


/**
 * Validation du courriel
 */
$courriel_ok = false;
$courriel_msg = '';
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $courriel_ok = (false !== $courriel);
    if ( ! $courriel_ok) { // Si le prénom n'est pas valide
        $courriel_msg = 'Le courriel doit être dans un format valide comportant un @ (min 4 lettres).';
    }
//    var_dump($courriel);
//    var_dump($courriel_ok);
//    var_dump($courriel_msg);
}
/**
 * Validation du pseudo
 */
$pseudo_ok = false;
$pseudo_msg = '';
if (array_key_exists('pseudo', $_POST)) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
    // Validation du pseudo : min 4 caractères alpha ou chiffres
    $pseudo_ok = (1 === preg_match('/^[a-zA-Z0-9]{4,}$/', $pseudo));
    if ( ! $pseudo_ok) { // Si le prénom n'est pas valide
        $pseudo_msg = 'Le pseudo ne doit contenir que des lettres ou chiffres (min 4).';
    }
//    var_dump($pseudo);
//    var_dump($pseudo_ok);
//    var_dump($pseudo_msg);
}
/**
 * Validation du mot de passe
 */
$mot_passe_ok = false;
$mot_passe_msg = '';
if (array_key_exists('mot_passe', $_POST)) {
    $mot_passe = filter_input(INPUT_POST, 'mot_passe', FILTER_SANITIZE_STRING);
    // Validation du mot de passe: alpha, chiffres,caracteres speciaux, min de 4 caracteres
    $mot_passe_ok = (1 === preg_match('/^[a-zA-Z0-9%&$!*?]{4,}$/', $mot_passe));
    if ( ! $mot_passe_ok) { // Si le prénom n'est pas valide
        $mot_passe_msg = 'Le mot de passe est invalide, il doit contenir des lettres et des caractères spéciaux (min 4 caractères).';
    }
//    var_dump($mot_passe);
//    var_dump($mot_passe_ok);
//    var_dump($mot_passe_msg);
}
if ($prenom_ok && $nom_ok && $gender_ok && $courriel_ok && $pseudo_ok && $mot_passe_ok) {
    // On enregistre les données et s'en va sur une autre page
    // On enregistre les données et s'en va sur une autre page
    require_once 'db/_user.php';
    $user_info = user_add($username, $password, $firstname, $lastname, $email);
    header("Location:index.php");
    exit;
}
?>
    <br/>
<form id="inscription" name="inscription" xmlns="http://www.w3.org/1999/html" method="post" novalidate="novalidate">
<!--    champ prenom-->
    <label for="prenom">Prénom : </label>
    <input type="text" name="prenom" id="prenom"
           class="<?php echo $in_post && ! $prenom_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>"/>
    <?php if ( ! $prenom_ok) {?>
        <span style="color: red;">
            <?php echo($prenom_msg);  ?>
        </span>
    <?php
    }
    ?>

    <br/>
    <label for="nom">Nom : </label>
    <input type="text" name="nom" id="nom"
            class="<?php echo $in_post && ! $nom_ok ? 'error' : '';?>"
            value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>"/>
    <?php if ( ! $nom_ok) {?>
        <span style="color: red;">
            <?php echo($nom_msg);  ?>
        </span>
        <?php
    }
    ?>
    <br/>

    <!--    Champ sexe-->
        <label>Sexe : </label>
        <label for="gender_male" >H</label>
        <input type="radio" name="gender" id="gender_male" value="gender_male"
                +        <?php echo (array_key_exists('gender', $_POST) && ($_POST['gender'] == 'gender_male')) ? 'checked="checked"' : '' ?>/>
        <label for="gender_female" >F</label>
       <input type="radio" name="gender" id="gender_female" value="gender_female"
                +        <?php echo (array_key_exists('gender', $_POST) && ($_POST['gender'] == 'gender_female')) ? 'checked="checked"' : '' ?>/>
       <?php if ($in_post && ! $gender_ok) {
                echo "<p class='error_msg'>$gender_msg</p>";
     } ?>

    <br/>

    <label for="courriel">Courriel : </label>
    <input type="text" name="courriel" id="courriel"
           class="<?php echo $in_post && ! $courriel_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : '' ?>"/>
    <?php if ( ! $courriel_ok) {?>
        <span style="color: red;">
            <?php echo($courriel_msg);  ?>
        </span>
        <?php
    }
    ?>
    <br/>
    <label for="pseudo">Pseudo : </label>
    <input type="text" name="pseudo" id="pseudo"
           class="<?php echo $in_post && ! $pseudo_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('pseudo', $_POST) ? $_POST['pseudo'] : '' ?>"/>
    <?php if ( ! $pseudo_ok) {?>
        <span style="color: red;">
            <?php echo($pseudo_msg);  ?>
        </span>
        <?php
    }
    ?>
    <br/>
    <label for="mot_passe">Password : </label>
    <input type="text" name="mot_passe" id="mot_passe"
           class="<?php echo $in_post && ! $mot_passe_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('mot_passe', $_POST) ? $_POST['mot_passe'] : '' ?>"/>
    <?php if ( ! $mot_passe_ok) {?>
        <span style="color: red;">
            <?php echo($mot_passe_msg);  ?>
        </span>
        <?php
    }
    ?>
    <br/>
<!--    submit ici-->
    <input type="submit" name="register" id="register" value="S'inscrire"/>
</form>