<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'info.php';
$mysql = new mysqli($servername, $username, $password,$dbname);

function most_used_script($mysql)
{

    $query = "SELECT kyvadlo,lietadlo,gulicka,tlmenie FROM stats WHERE ID = 1";
    $result = mysqli_query($mysql, $query);
    $values = $result->fetch_assoc();
    $max_name = "";
    $max_value = 0;
    foreach ($values as $script_name => $value)
    {
        if ($max_value < $value)
        {
            $max_value = $value;
            $max_name = $script_name;
        }
    }
    return $max_name . " a počet použití je: " . $max_value;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title_text)) echo $title_text; ?></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'navbar.php'?>

<div class="about p-3"><?php if (isset($api_info)) echo $api_info; ?>
    <div class="textI">
        <div class ="v move">
            <?php if (isset($authentication_text)) echo $authentication_text; ?>
        </div>
        <div class="v move">
            <?php if (isset($api_input_text_pendulum)) echo $api_input_text_pendulum; ?>
            <p class="txt">
                <?php if (isset($api_output_text)) echo $api_output_text; ?>
                <?php if (isset($api_output_text_pendulum)) echo $api_output_text_pendulum; ?>
            </p>
        </div>
        <div class="v move">
            <?php if (isset($api_input_text_ball)) echo $api_input_text_ball; ?>
            <p class="txt">
                <?php if (isset($api_output_text)) echo $api_output_text; ?>
                <?php if (isset($api_output_text_ball)) echo $api_output_text_ball; ?>
            </p>
        </div>
        <div class="v move">
            <?php if (isset($api_input_text_dampening)) echo $api_input_text_dampening; ?>
            <p class="txt">
                <?php if (isset($api_output_text)) echo $api_output_text; ?>
                <?php if (isset($api_output_text_dampening)) echo $api_output_text_dampening; ?>
            </p>
        </div>
        <div class="v move">
            <?php if (isset($api_input_text_plane)) echo $api_input_text_plane; ?>
            <p class="txt">
                <?php if (isset($api_output_text)) echo $api_output_text; ?>
                <?php if (isset($api_output_text_plane)) echo $api_output_text_plane; ?>
            </p>
        </div>

    </div>
</div>

<div class="moveBtns">
<form method="post" action="pdf.php" class="p-3">
    <input type="submit" name="export" value="<?php if (isset($pdf_text)) echo $pdf_text; ?>" class="btn btn-dark" />
</form>

<form method="post" action="databaseToPDF.php" class="p-3">
    <input type="submit" name="export" value="<?php if (isset($database_pdf_text)) echo $database_pdf_text; ?>" class="btn btn-dark" />
</form>

<form method="post" action="databaseToCSV.php" class="p-3">
    <input type="submit" name="export" value="<?php if (isset($database_csv_text)) echo $database_csv_text; ?>" class="btn btn-dark" />
</form>
</div>
<div class="movefckinTable">
<div class="w-75 p-3 table-responsive">
    <caption><?php if (isset($table_caption)) echo $table_caption; ?></caption>
    <table class="table table-striped table-dark table-hover text-center margin-auto mx-auto ">
        <thead>
            <tr>
                <th scope="col"><?php if (isset($table_name_task)) echo $table_name_task; ?></th>
                <th scope="col">Danijela Pavlovič</th>
                <th scope="col">Igor Šranka</th>
                <th scope="col">Michael Miksad</th>
                <th scope="col">Michal Vrabec</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><?php if (isset($info_octave_installation_text)) echo $info_octave_installation_text; ?></td>
                <td>API</td>
                <td><?php if (isset($info_multilingual_text)) echo $info_multilingual_text; ?></td>
                <td><?php if (isset($info_structure_multilingual_text)) echo $info_structure_multilingual_text; ?></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>API</td>
                <td><?php if (isset($info_graphs_text)) echo $info_graphs_text; ?></td>
                <td><?php if (isset($info_csv_pdf_export_text)) echo $info_csv_pdf_export_text; ?></td>
                <td><?php if (isset($api_key_text)) echo $api_key_text; ?></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td><?php if (isset($info_api_description_text)) echo $info_api_description_text; ?></td>
                <td><?php if (isset($info_request_saving_text)) echo $info_request_saving_text; ?></td>
                <td><?php if (isset($info_translation_export_text)) echo $info_translation_export_text; ?></td>
                <td><?php if (isset($info_log_db_text)) echo $info_log_db_text; ?></td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td><?php if (isset($info_task_table_text)) echo $info_task_table_text; ?></td>
                <td><?php if (isset($info_task_statistic_text)) echo $info_task_statistic_text; ?></td>
                <td><?php if (isset($info_website_upgrade_text)) echo $info_website_upgrade_text; ?></td>
                <td><?php if (isset($info_index_form_text)) echo $info_index_form_text; ?></td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td><?php if (isset($dampening_heading)) echo $dampening_heading; ?></td>
                <td><?php if (isset($aeroplane_heading)) echo $aeroplane_heading; ?></td>
                <td><?php if (isset($ball_heading)) echo $ball_heading; ?></td>
                <td><?php if (isset($pendulum_heading)) echo $pendulum_heading; ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="statistic_info">
    <h3><?php if (isset($info_statistic_text)) echo $info_statistic_text; ?></h3>
    <div class="center">
        <div> <?php if (isset($info_most_used_script_text)) echo $info_most_used_script_text; ?><?php echo "<b>".most_used_script($mysql)."</b>"; ?></div>
    </div>
    <form class="mt-5 col-lg-12 d-flex justify-content-center" action="info.php" method="post">
        <div class="col-lg-5">
            <div class="form-group">
                <label for="email"><?php if (isset($email)) echo $email; ?></label>
                <input class="form-control" type="email" name="eMail" id="eMail">
            </div>
            <input id="submit" name="submit" type="submit" class="btn btn-secondary float-right">
        </div>
    </form>
</div>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $emailUser = $_POST['eMail'];
   // echo $emailUser;
    $message = most_used_script($mysql);
    $subject = "Statistics";
    //mail($emailUser,$subject,$message);
}
?>