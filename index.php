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
    echo $form1->label('for', 'textlabel')
        ->input('name', 'value', 'type', 'id', 'class', 'placeholder', 20, 'required')
        ->selectOpt('selectid',  ['option1', 'option2', 'option3'], $required = 'required', 'id', 'form-control form-control-lg')
        ->textarea('txtarea', 'txtclass', 10, 20, 'required', 'id', 'class')
        ->checkradio('radio', 'name', 'My_radio', 'checked', 'required', 'id', 'class')
        ->file('file',  ['image/png', 'image/jpeg'], 'id', 'class')
        ->fieldset('radio', 'List of film', ['Horror', 'Thriller', 'Comedy'], 'film', true)
        ->button('value', 'id', 'class')
        ->generate();
    ?>

</body>

</html>