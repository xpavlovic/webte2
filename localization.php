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
    $api_info = "<h1>About API</h1>";
    $authentication_text = "<h3><b>AUTHENTICATION</b></h3><br><p class=\"txt\">On the home page there is an API KEY based on which your request is verified for the given entry. <br>It is not possible to use the service without the key.<br></p>";
    $api_input_text_pendulum = "<h3><b>Inverted Pendulum</b></h3><br><h5>Input</h5><br><p class=\"txt\">Input parameter <b>'r'</b> is sent to the url:<br> './api/scripts?scripts=<b>kyvadlo</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_input_text_ball = "<h3><b>Ball & Beam</b></h3><br><h5>Input</h5><br><p class=\"txt\">Input parameter <b>'r'</b> is sent to the url:<br> './api/scripts?scripts=<b>gulicka</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_input_text_dampening = "<h3><b>Dampening</b></h3><br><h5>Input</h5><br><p class=\"txt\">Input parameter <b>'r'</b> is sent to the url:<br> './api/scripts?scripts=<b>tlmenie</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_input_text_plane = "<h3><b>Aircraft Pitch</b></h3><br><h5>Input</h5><br><p class=\"txt\">Input parameter <b>'r'</b> is sent to the url:<br> './api/scripts?scripts=<b>lietadlo</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_output_text = "<h5>Output</h5>
                <pre>
                Output is a JSON object in the form: <br>
                <div class=\"objekt\">
        {\"data\":[                                 
                    {                             
                        \"t\":[],              
                        \"y\":[],              
                        \"x\":[]         
                    },                       
                    {                               
                        \"t\":[],              
                        \"y\":[],              
                        \"x\":[]         
                    }                       
                ]                       
        }
        </div><br>";
    $api_output_text_pendulum = "<b>\"t\"</b> is the time based on which the position of the pendulum changes 
                and the values are always from 0-10.                                  
                <b>\"y\"</b> is the current position of the pendulum.                                  
                <b>\"x\"</b> is the current pendulum angle.                                                 
                In the first object, \"x\" and \"y\" are set to initial zeros           
                conditions, and in the second, the values are set based on          
                the last value from the first object. Only the \"t\" remains the same.</pre>";
    $api_output_text_ball = "<b>\"t\"</b> is the time based on which the position of the ball changes 
                and the values are always from 0-5.                                             
                <b>\"y\"</b> is the current position of the ball.                                           
                <b>\"x\"</b> is the current tilt of the beam.                                                   
                In the first object, \"x\" and \"y\" are set to initial zeros                   
                conditions, and in the second, the values are set based on          
                the last value from the first object. Only the \"t\" remains the same.</pre>";
    $api_output_text_dampening = "<b>\"t\"</b> is the time based on which the position of the wheel changes 
                when approaching various obstacles and the values are always from 0-5.
                <b>\"y\"</b> is the current position of the vehicle.                        
                <b>\"x\"</b> is the current wheel position.                                                 
                In the first object, \"x\" and \"y\" are set to initial zeros                       
                conditions, and in the second, the values are set based on          
                the last value from the first object. Only the \"t\" remains the same.</pre>";
    $api_output_text_plane = "<b>\"t\"</b> is the time based on which the tilt of the aircraft changes    
                and the values are always from 0-40.                                        
                <b>\"y\"</b> is the current tilt of the plane.                                                  
                <b>\"x\"</b> is the current tilt of the rear flap.                                              
                In the first object, \"x\" and \"y\" are set to initial zeros                       
                conditions, and in the second, the values are set based on           
                the last value from the first object. Only the \"t\" remains the same.</pre>";
    $pdf_text = "Download as PDF";
    $table_caption = "Tasks";
    $table_name_task = "Name /<br> Task";
    $database_pdf_text = "Export log info to PDF";
    $database_csv_text = "Export log info to CSV";

    //checkboxy k individualnym zadaniam
    $graph_checkbox_text = "Graph";
    $animation_checkbox_text = "Animation";

    //kyvadlo
    $pendulum_input_text = "Input (new position of pendulum in range 0-100)";
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
    $api_info = "<h1>Popis API</h1>";
    $authentication_text = "<h3><b>AUTENTIFIKÁCIA</b></h3><br><p class=\"txt\">Na úvodnej stránke sa nachádza API KEY na základe ktorého sa overuje vaša požiadavka pre daný vstup.<br>Bez kľúča nie je možné službu používať.<br></p>";
    $api_input_text_pendulum = "<h3><b>Inverzné kývadlo</b></h3><br><h5>Vstup</h5><br><p class=\"txt\">Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>kyvadlo</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_input_text_ball = "<h3><b>Gulička na tyči</b></h3><br><h5>Vstup</h5><br><p class=\"txt\">Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>gulicka</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_input_text_dampening = "<h3><b>Tlmič kolesa</b></h3><br><h5>Vstup</h5><br><p class=\"txt\">Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>tlmenie</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_input_text_plane = "<h3><b>Náklon lietadla</b></h3><br><h5>Vstup</h5><br><p class=\"txt\"><br>Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>lietadlo</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br></p>";
    $api_output_text = "<h5>Vystup</h5><br><pre>Vystupom je JSON objekt v tvare: <br>
        <div class=\"objekt\">
        {\"data\":[                                 
                    {                             
                        \"t\":[],              
                        \"y\":[],              
                        \"x\":[]         
                    },                       
                    {                               
                        \"t\":[],              
                        \"y\":[],              
                        \"x\":[]         
                    }                       
                ]                       
        }
        </div><br>";
    $api_output_text_pendulum = "<b>\"t\"</b> je čas na základe ktorého sa pozícia kývadla mení
                a hodnoty sú vždy od 0-10.                                                  
                <b>\"y\"</b> je aktuálna pozícia kývadla.                                           
                <b>\"x\"</b> je aktuálny uhol kývadla.
                V prvom objekte \"x\" a \"y\" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba \"t\" zostáva rovnaké.</pre>";
    $api_output_text_ball = "<b>\"t\"</b> je čas na základe ktorého sa pozícia guličky mení a hodnoty sú vždy od 0-5.
                <b>\"y\"</b> je aktuálna pozícia guličky.
                <b>\"x\"</b> je aktuálny náklon tyče.
                V prvom objekte \"x\" a \"y\" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba \"t\" zostáva rovnaké.</pre>";
    $api_output_text_dampening = "<b>\"t\"</b> je čas na základe ktorého sa pozícia kolesa mení pri nabehaní
                na rôzne prekážky a hodnoty sú vždy od 0-5.
                <b>\"y\"</b> je aktuálna pozícia vozidla.
                <b>\"x\"</b> je aktuálny pozícia kolesa.
                V prvom objekte \"x\" a \"y\" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba \"t\" zostáva rovnaké.</pre>";
    $api_output_text_plane = "<b>\"t\"</b> je čas na základe ktorého sa náklon lietadla mení a hodnoty sú vždy od 0-40.
                <b>\"y\"</b> je aktuálny náklon lietadla.
                <b>\"x\"</b> je aktuálny náklon zadnej klapky.
                V prvom objekte \"x\" a \"y\" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba \"t\" zostáva rovnaké.</pre>";
    $pdf_text = "Stiahni ako PDF";
    $table_caption = "Rozdelenie úloh";
    $table_name_task = "Meno /<br> Uloha";
    $database_pdf_text = "Exportuj logovacie info do PDF";
    $database_csv_text = "Exportuj logovacie info do CSV";

    //checkboxy k individualnym zadaniam
    $graph_checkbox_text = "Graf";
    $animation_checkbox_text = "Animácia";

    //kyvadlo
    $pendulum_input_text = "Vstup (nová pozícia kyvadla v rozsahu 0-100)";
}
