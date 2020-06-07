<?php
include 'config.php';

if (isset($_GET['search'])) {
    if ($_GET['search'] == "scripts"){
        if ($_GET['key'] == $api_key) {
            if (!empty($_GET['parameter']) && !empty($_GET['scripts'])) {
                $script_name = $_GET['scripts'];
                $parameter = $_GET['parameter'];
                //echo "PARAMETER: ".$parameter.'\n';
                //prikaz pre terminal

                $cmd = "octave --eval 'r = $parameter;' --eval '$script_name'";
                $output = exec($cmd, $op, $rv);
                //data z octave scriptu
                $stringJSON = '{"data":[{"t":' . $op[0] . ', "y":' . $op[1] . ', "x":' . $op[2] . '},{"t":' . $op[3] . ', "y":' . $op[4] . ', "x":' . $op[5] . '}]}';

                echo $stringJSON;
            } elseif (empty($_GET['parameter']) && !empty($_GET['scripts'])) {
                $script_name = $_GET['scripts'];
                //prikaz pre terminal
                $cmd = "octave -W --eval '$script_name' 2>&1";
                $output = exec($cmd, $op, $rv);

                //data z octave scriptu
                echo $op[0];
                /*
                foreach($op as $line){
                    echo $line . "\n";
                }
                */
            } else {
                die("Incorrect request format");
            }
            //} else {
            // die("Invalid API key");
            //}
        }
    } else {
        die("Incorrect request format");
    }

} else {
    die("Incorrect request format");
}

