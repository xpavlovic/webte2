<?php
include 'config.php';

if (isset($_GET['search'])) {
    if ($_GET['search'] == "scripts") {
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM api WHERE api_key='$api_key'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ((isset($_GET['scripts']) && $_GET['scripts'] != "") && ((isset($_GET['parameter']) && $_GET['parameter'] != ""))) {
                $script_name = $_GET['scripts'];
                $parameter = $_GET['parameter'];

                //prikaz pre terminal
                $cmd = "octave --eval 'p = $parameter;' --eval '$script_name' ";
                $output = exec($cmd, $op, $rv);

                //data z octave scriptu
                $stringJSON = '{"data":{"t":' . $op[0] . ', "y":' . $op[1] . ', "x":' . $op[2] . '}}';

                echo $stringJSON;
            }
        } else {
            die("Invalid API key");
        }
    }
} else {
    die("volaco robis zle");
    //cc0d3a68f788ddc7091e0ba0c26544bf98ae4200
}
