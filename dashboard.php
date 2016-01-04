<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
require_once 'db/_talkmsg_data.php';
$site_data[PAGE_ID] = 'dashboard';
require_once 'view_parts/_page_base.php';

?>

    <div id="main">
<ul>
    <li class="tmsg_cont" style="background-color: #ff3fd4;">
        <div class="tmsg_head">
            <span class="tmsg_time">2016-01-04 12:15</span>
            <span class="tmsg_username">antoinesuper2016</span>
            </div>
        <p class="tmgs_body">Salut à tous. Il y a quelqu'un en 2016 icitte ?</p>
        </li>
    <li class="tmsg_cont" style="background-color: #2fffda;">
        <div class="tmsg_head">
            <span class="tmsg_time">2016-01-04 12:18</span>
            <span class="tmsg_username">olgato</span>
        </div>
        <p class="tmgs_body">Bonne année, j'ai préparé des super muffins pour la nouvelle année ! Vous êtes tous invités. </p>
    </li>
    <li class="tmsg_cont" style="background-color: #544eff;">
        <div class="tmsg_head">
            <span class="tmsg_time">2016-01-04 12:30</span>
            <span class="tmsg_username">jeanpapa</span>
        </div>
        <p class="tmgs_body">Des muffins ? Olgato, je vais encore prendre 2 livres là ... </p>
    </li>
    <li class="tmsg_cont" style="background-color: #fbff3d;">
        <div class="tmsg_head">
            <span class="tmsg_time">2016-01-04 12:45</span>
            <span class="tmsg_username">patenteur</span>
        </div>
        <p class="tmgs_body">Je vends 25$ mon tout dernier thème wordpress. Visitez ma page web au www.themesapat.ca </p>
    </li>
    <li class="tmsg_cont" style="background-color: #38ff22;">
        <div class="tmsg_head">
            <span class="tmsg_time">2016-01-04 13:00</span>
            <span class="tmsg_username">mohmouaaaahhhh</span>
        </div>
        <p class="tmgs_body">Monsieur ça va être le temps d'arrêter là. J'ai pas assez dor...</p>
    </li>
</ul>

    </div>

<?php
require_once 'view_parts/_page_bottom.php';
?>

<?php ?>
