<?php

use Classes\Model\CarModel;
use Classes\Model\CarBrand;

require_once('./vendor/autoload.php');

$carModel = new CarModel();
$carBrand = new CarBrand();

if (isset($_GET['query'])) {
    $brand = $carBrand->getCarBrandIdByName($_GET['query']);

    $model = $carModel->getModelByBrandId($brand);
}

if (isset($model)) {
    echo $model;
}
