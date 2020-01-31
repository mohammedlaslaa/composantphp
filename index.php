<?php

require_once('./vendor/form/formbuilder.php');

use form\formbuilder as myform;

?>

<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <title>Document</title>
</head>

<body>

    <?php

    $form1 = new myform();
    echo $form1->label('name', 'Nom')
        ->input('name', '', '', 'id', 'class', '', 20, 'required')
        ->label('selectid', 'Nom')
        ->selectOpt('selectid', 'form-control form-control-lg', ['option1', 'option2', 'option3'], $required = 'required')
        ->textarea('txtarea', 'txtclass', '', 10, 20)
        ->checkradio('radio', 'rad', 'myrad', 'Mon_radio', 'chcked', 'required')
        ->file('file', 'pdfjpg', ['image/png', 'image/jpeg'])
        ->fieldset('radio', 'Liste de film', ['Horreur', 'Thriller', 'Comédie'], 'film', true)
        ->button('btn btn-primary', 'Envoyer')
        ->input('submit', 'btnsub', 'submit')
        ->generate();
    ?>

</body>
</html>