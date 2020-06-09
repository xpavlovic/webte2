<?php
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'index.php';

/*error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title_text)) echo $title_text?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include 'navbar.php'?>
<h3>

        <img src="https://www.gnu.org/software/octave/img/octave-logo.svg"
             style="width: 32px; height: auto" alt="GNU Octave logo">
        GNU Octave

</h3>
<form class="mt-5 col-lg-12 d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="apiKey"><?php if (isset($api_key_text)) echo $api_key_text?></label>
            <input class="form-control" type="text" name="apiKey" id="apiKey" value="99cf0f8b-8b17-4a1b-93e7-be2efaec965e">
        </div>
        <div class="form-group">
            <label for="inputName"><?php if (isset($input_text)) echo $input_text?></label>
            <textarea class="form-control" name="inputName" id="inputName"></textarea>
        </div>
        <div class="form-group">
            <label for="output"><?php if (isset($output_text)) echo $output_text?></label>
            <textarea class="form-control" name="output" id="output" rows="5" disabled></textarea>
        </div>
        <button id="submit" type="button" class="btn btn-secondary float-right"><?php if (isset($submit_button)) echo $submit_button?></button>
    </div>
</form>

</body>
</html>
