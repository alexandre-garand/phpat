<?php
$menu_date=array(
    'Accueil'=>'index.php',
    'Contact'=>'contact.php',
    'Inscription'=>'inscription.php',
    'Dashboard'=>'dashboard.php'
);
var_dump($menu_date);
foreach($menu_date as $menu => $url){
    echo "<li><a href=\"$url\">menu</li>";
}

?>

<ul>
    <li><a href="../index.php"></li>
</ul>