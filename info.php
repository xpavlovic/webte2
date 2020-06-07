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
            <h3>AUTENTIFIKÁCIA</h3>
            <p class="txt">
                Na úvodnej stránke sa nachádza API KEY na základe ktorého sa
                overuje vaša požiadavka pre daný vstup.<br>
                Bez kľúča nie je možné službu používať.<br>
            </p>
        </div>
        <div class="v move">
          <h3>Inverzné kývadlo</h3>
            <h5>Vstup</h5>
            <p class="txt">
                Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>kyvadlo</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br>
            </p>
            <h5>Vystup</h5>
            <p class="txt">
            <pre>
                Vystupom je JSON objekt v tvare: <br>
                <div class="objekt">
                {"data":[
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            },
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            }
                        ]
                }
                </div>
                <b>"t"</b> je čas na základe ktorého sa pozícia kývadla mení a hodnoty sú vždy od 0-10.
                <b>"y"</b> je aktuálna pozícia kývadla.
                <b>"x"</b> je aktuálny uhol kývadla.
                V prvom objekte "x" a "y" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba "t" zostáva rovnaké.
                 </pre>
            </p>

        </div>
        <div class="v move">
            <h3>Gulička na tyči</h3>
            <h5>Vstup</h5>
            <p class="txt">
                Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>gulicka</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br>
            </p>
            <h5>Vystup</h5>
            <p class="txt">
            <pre>
                Vystupom je JSON objekt v tvare: <br>
                <div class="objekt">
                {"data":[
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            },
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            }
                        ]
                }
                </div>
                <b>"t"</b> je čas na základe ktorého sa pozícia guličky mení a hodnoty sú vždy od 0-5.
                <b>"y"</b> je aktuálna pozícia guličky.
                <b>"x"</b> je aktuálny náklon tiče.
                V prvom objekte "x" a "y" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba "t" zostáva rovnaké.
                 </pre>
            </p>

        </div>
        <div class="v move">
            <h3>Tlmič kolesa</h3>
            <h5>Vstup</h5>
            <p class="txt">
                Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>tlmenie</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br>
            </p>
            <h5>Vystup</h5>
            <p class="txt">
            <pre>
                Vystupom je JSON objekt v tvare: <br>
                <div class="objekt">
                {"data":[
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            },
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            }
                        ]
                }
                </div>
                <b>"t"</b> je čas na základe ktorého sa pozícia kolesa mení pri nabehaní
                na rôzne prekážky a hodnoty sú vždy od 0-5.
                <b>"y"</b> je aktuálna pozícia vozidla.
                <b>"x"</b> je aktuálny pozícia kolesa.
                V prvom objekte "x" a "y" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba "t" zostáva rovnaké.
                 </pre>
            </p>

        </div>
        <div class="v move">
            <h3>Náklon lietadla</h3>
            <h5>Vstup</h5>
            <p class="txt">
                Zadaný parameter <b>'r'</b> zo vstupu sa pošle na url:<br> './api/scripts?scripts=<b>lietadlo</b>&'parameter='+ <b>r</b> +'&key=<b>99cf0f8b-8b17-4a1b-93e7-be2efaec965e</b>' <br>
            </p>
            <h5>Vystup</h5>
            <p class="txt">
            <pre>
                Vystupom je JSON objekt v tvare: <br>
                <div class="objekt">
                {"data":[
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            },
                            {
                                "t":[],
                                "y":[],
                                "x":[]
                            }
                        ]
                }
                </div>
                <b>"t"</b> je čas na základe ktorého sa náklon lietadla mení a hodnoty sú vždy od 0-40.
                <b>"y"</b> je aktuálny náklon lietadla.
                <b>"x"</b> je aktuálny náklon zadnej klapky.
                V prvom objekte "x" a "y" sa nastavia na počiatočné nulové
                podmienky a v druhom sa hodnoty nastavia na základe
                poslednej hodnoty z prvého objektu. Iba "t" zostáva rovnaké.
                 </pre>
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