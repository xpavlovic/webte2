<?php
include_once 'localization.php';

function insert_page($page_name, $text)
{
    if ($_SESSION['current_page'] == $page_name) {
        echo
            '<li class="nav-item active">
                            <a class="nav-link" href="'.$page_name.'">' . $text . '<span class="sr-only">(current)</span></a>
             </li>';
    } else {
        echo
            '<li class="nav-item">
                            <a class="nav-link" href="' . $page_name . '">' . $text . '</a>
             </li>';
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand"><?php if (isset($title_text)) echo $title_text; ?></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            insert_page('index.php', $home_menu_text);
            insert_page('aeroplane.php', $aeroplane_menu_text);
            insert_page('dampening.php', $dampening_menu_text);
            insert_page('ball.php', $ball_menu_text);
            insert_page('pendulum.php', $pendulum_menu_text);
            //insert_page('info.php', $info_menu_text);
            ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            insert_page('info.php', $info_menu_text);
            ?>
        </ul>
        <?php if (isset($language_button)) echo $language_button;?>
    </div>
</nav>
<script>
    function change_language(language) {
            document.cookie = "lang="+language;
            location.reload();
    }
</script>