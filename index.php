<?php

require_once('./vendor/form/formbuilder.php');
require_once('./vendor/validator/validator.php');

use composant\formbuilder as myform;
use composant\validator as validator;

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


    var_dump($_FILES["upfile"]);
    echo basename($_FILES["upfile"]["tmp_name"]);

    $form = new myform("index.php", "post");
    echo $form
        ->label('name', 'Nom')
        ->input('name', '', 'text', 'id', 'class', '')
        ->label('mail', 'Email')
        ->input('mail', '', 'email', 'id', 'class', '')
        ->label('url', 'URL')
        ->input('url', '', 'url', 'id', 'class', '')
        ->label('file', 'File')
        ->input('upfile', '', 'file', 'id', 'class', '')
        ->label('date', 'Date')
        ->input('date', '', 'date', 'id', 'class', '')
        ->label('password', 'Mot de passe')
        ->input('password', '', 'password', 'id', 'class', '')
        ->input('valid', 'envoyer', 'submit')
        ->generate();

    if (isset($_POST['valid'])) {
        $validator = new validator();
        $validator->testInputLength($_POST['name'], 10, "The name is incorrect")
            ->testMail($_POST['mail'], "Invalid email")
            ->testPassword($_POST['password'], "Password")
            ->testDate($_POST['date'], 'Invalid Format date', "The separator must to be a hyphen")
            // ->inputMatchRegex($_POST['test'], "/^[a-z]*([.]|\w)[a-z]*\d*[@][a-z]*[.]\w{2,5}/", "Invalid regex message" )
            ->validUrl($_POST['url'], "Invalid URL")
            ->validTypeMime('upfile', ['image/jpeg', 'image/png', 'application/pdf'], "uploads\\" ,"This MIME Content-type is not valid")
            ->isValid();
    }
    ?>

</body>

</html>