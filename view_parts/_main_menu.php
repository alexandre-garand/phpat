<?php
$menu_date=array(
    'Accueil'=>'index.php',
    'Contact'=>'contact.php'
);
foreach($menu_date as $menu_date => $daydata){
    echo "<th>$daydata[jour]</th>";
}

?>

<ul>
    <li><a href="../index.php"></li>
</ul>