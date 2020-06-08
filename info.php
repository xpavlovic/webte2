<?php
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'info.php';
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

<form method="post" action="pdf.php" class="p-3">
    <input type="submit" name="export" value="<?php if (isset($pdf_text)) echo $pdf_text; ?>" class="btn btn-dark" />
</form>

<form method="post" action="databaseToPDF.php" class="p-3">
    <input type="submit" name="export" value="<?php if (isset($database_pdf_text)) echo $database_pdf_text; ?>" class="btn btn-dark" />
</form>

<form method="post" action="databaseToCSV.php" class="p-3">
    <input type="submit" name="export" value="<?php if (isset($database_csv_text)) echo $database_csv_text; ?>" class="btn btn-dark" />
</form>

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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>