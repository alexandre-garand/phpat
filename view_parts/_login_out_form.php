<?php ?>

<?php if(! $site_data[USER_IS_LOGGED]) {
//Si l'utilisateur
    ?>
    <form id="login" name="login">

        <label for="username">Pseudo : </label>
        <input type="text" name="username" id="username" value=""/>
        <label for="password">Mot de passe : </label>
        <input type="password" name="password" id="password" />
        <input type="submit" name="dologin" id="dologin" value="Entrer"/>
    </form>
<?php } else { //Si l'utilisateur est connecté ?>
    <form id="logout" name="logout">
        <input type="submit" name="dologout" value="Quitter"/>
    </form>
<?php } ?>