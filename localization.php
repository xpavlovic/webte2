<?php
if ($_COOKIE['lang'] == 'EN') {
    //menu
    $title_text = 'Final project';
    $home_menu_text = 'Home';
    $aeroplane_menu_text = 'Aeroplane';
    $ball_menu_text = 'Ball';
    $dampening_menu_text = 'Dampening';
    $pendulum_menu_text = 'Pendulum';
    $info_menu_text = 'About';
    $language_button = '<input onclick="change_language(\'SK\')" class="lang_input" type="image" width="40px" src="https://www.countryflags.io/sk/shiny/64.png" value="SK"/>';

    //index formular
    $input_text = "Input:";
    $output_text = "Output:";
    $submit_button = "Submit";
    $api_key_text = "API key";

    //API popis
    $api_info = "About API: ";
    $pdf_text = "Download as PDF";
    $table_caption = "Tasks";
    $table_name_task = "Name /<br> Task";
} else {
    //menu
    $title_text = 'Záverečný projekt';
    $home_menu_text = 'Domov';
    $aeroplane_menu_text = 'Lietadlo';
    $ball_menu_text = 'Gulička';
    $dampening_menu_text = 'Tlmenie';
    $pendulum_menu_text = 'Kyvadlo';
    $info_menu_text = 'Popis';
    $language_button = '<input onclick="change_language(\'EN\')" class="lang_input" type="image" width="40px" src="https://www.countryflags.io/gb/shiny/64.png" value="EN"/>';

    //index formular
    $input_text = "Vstup:";
    $output_text = "Výstup:";
    $submit_button = "Odoslať";
    $api_key_text = "API kľúč";

    //API popis
    $api_info = "Popis API: ";
    $pdf_text = "Stiahni ako PDF";
    $table_caption = "Rozdelenie úloh";
    $table_name_task = "Meno /<br> Uloha";
}
