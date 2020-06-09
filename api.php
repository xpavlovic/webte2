<?php
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function updateStats($mysql, $script_name )
{
    if ($script_name == "gulicka" || $script_name == "kyvadlo" || $script_name == "lietadlo" || $script_name == "tlmenie")
    {
        $query = "UPDATE stats SET $script_name = $script_name +1";
        mysqli_query($mysql,$query);
    }
}
function updateLogs($mysql, $command, $result)
{
    $error = 1;
    if(strstr($result,"error") === false && strstr($result,"warning") === false)
    {
        $error = 0;
    }
    $date = date("Y-m-d H:i:s");
    $preparedQuery = $mysql->prepare("INSERT INTO log (datetime,request,is_error,error_description) VALUES (?,?,?,?)");
    if($error == 1)
    {
        $preparedQuery->bind_param("ssss",$date,$command,$error,$result);
    }
    else
    {
        $nullV = NULL;
        $preparedQuery->bind_param("ssss",$date,$command,$error,$nullV);
    }
    $preparedQuery->execute();

}
$mysql = new mysqli($servername, $username, $password,$dbname);
if (isset($_GET['search'])) {
    if ($_GET['search'] == "scripts"){
        if ($_GET['key'] == $api_key) {
            if (!empty($_GET['parameter']) && !empty($_GET['scripts'])) {
                $script_name = $_GET['scripts'];
                $parameter = $_GET['parameter'];
                //echo "PARAMETER: ".$parameter.'\n';
                //prikaz pre terminal
                $cmd = "octave --eval 'r = $parameter;' --eval '$script_name'";

                updateStats($mysql,$script_name );
                $output = exec($cmd, $op, $rv);
                //data z octave scriptu
                $stringJSON = '{"data":[{"t":' . $op[0] . ', "y":' . $op[1] . ', "x":' . $op[2] . '},{"t":' . $op[3] . ', "y":' . $op[4] . ', "x":' . $op[5] . '}]}';
                updateLogs($mysql,$script_name,$op[0]);
                echo $stringJSON;
            } elseif (empty($_GET['parameter']) && !empty($_GET['scripts'])) {
                $script_name = $_GET['scripts'];
                //prikaz pre terminal
                $cmd = "octave -W --eval '$script_name' 2>&1";

                $output = exec($cmd, $op, $rv);

                //data z octave scriptu
                echo $op[0];
                updateLogs($mysql,$script_name,$op[0]);

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

