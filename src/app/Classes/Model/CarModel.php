<?php

declare(strict_types=1);

namespace Classes\Model;

use Classes\Core\Model;
use PDO;

class CarModel extends Model
{
    public function getModels()
    {
        $statement = $this->db
            ->prepare("SELECT `id`, `model`, `brand_id` FROM `car_model`");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getModelByBrandId(int $id)
    {
        $statement = $this->db
            ->prepare("SELECT `model` FROM `car_model` WHERE `brand_id` = '$id'");

        $statement->execute();

        return json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
    }
}
