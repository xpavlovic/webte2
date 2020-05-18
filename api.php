<?php


if (isset($_GET['search']))
{

    if ($_GET['search'] == "scripts")
    {
        if ((isset($_GET['scripts']) && $_GET['scripts'] != "") && ((isset($_GET['parameter']) && $_GET['parameter'] != "")))
        {
            $script_name = $_GET['scripts'];
            $parameter = $_GET['parameter'];

            //prikaz pre terminal
            $cmd = "octave --eval 'p = $parameter;' --eval '$script_name' ";
            $output = exec($cmd,$op,$rv);

            //data z octave scriptu
            $stringJSON = '{"data":{"t":'.$op[0].', "y":'.$op[1].', "x":'.$op[2].'}}';

            echo $stringJSON;


        }
    }
}
else{
    echo "volaco robis zle";
}