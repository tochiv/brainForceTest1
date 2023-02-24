<?php

use Classes\Components\FormClass;
use Classes\Components\InputClass;
use Classes\Components\SelectClass;
use Classes\Components\OptionClass;
use Classes\Core\Mail;
use Classes\Model\CarBrand;
use Classes\Model\CarModel;
use Classes\Model\CarParts;
use Classes\Model\SendOrderClass;

require_once('./vendor/autoload.php');
require_once('models.php');

$select = new SelectClass(['class' => 'form-select', 'id' => 'form-select', 'name' => 'brand-select'], true);
$disabledSelect = new SelectClass(['class' => 'form-select', 'name' => 'model-select', 'id' => 'model-select']);
$partsSelect = new SelectClass(['class' => 'form-select', 'name' => 'parts'], true);

$brands = new CarBrand();
$brandsArray = $brands->getBrands();

$models = new CarModel();
$carModels = $models->getModelByBrandId(1);

$parts = new CarParts();
$carParts = $parts->getParts();

foreach ($brandsArray as $brandArray) {
    $select->addOption(new OptionClass($brandArray['brand'], ['class' => 'ke', 'required' => '']));
}

foreach ($carParts as $part) {
    $partsSelect->addOption(new OptionClass($part['part'], ['class' => 'ke']));
}

$form = new FormClass(['class' => 'row g-3', 'action' => 'index.php', 'method' => 'post']);
$form->addInput(new InputClass('text', ['name' => 'name', 'placeholder' => 'Введите своё Имя', 'class' => "form-control"], true));
$form->addInput(new InputClass('tel', ['name' => 'phone', 'placeholder' => 'Номер телефона', 'class' => "form-control phone", 'id' => 'phoneInput'], true));
$form->addSelect($select);
$form->addSelect($disabledSelect);
$form->addSelect($partsSelect);
$form->addInput(new InputClass('submit', ['value' => "Отправить", 'class' => "btn btn-success", 'name' => 'submit']));

if (isset($_POST['submit'])) {
    $order = new SendOrderClass();
    $order->sendOrder($_POST['name'], $_POST['phone'], $_POST['brand-select'], $_POST['model-select'], $_POST['parts']);
    $mail = new Mail('tochivk@gmail.com', 'Test', 'test');
    $mail->send();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="src/public/js/jquery.maskedinput.min.js"></script>
    <title>Document</title>
    <div class="mb-3 row justify-content-center pt-4">
        <div class="col-auto">
            <?php
            echo $form->build();
            ?>
        </div>
    </div>
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
</script>
<script src="src/public/js/main.js">
</script>

</body>
</html>
