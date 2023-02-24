<?php

declare(strict_types=1);

namespace Classes\Model;

use Classes\Core\Model;
use PDO;

class CarBrand extends Model
{
    public function getBrands(): array
    {
        $statement = $this->db
            ->prepare("SELECT `id`, `brand` FROM `car_brand`");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCarBrandIdByName(string $name): string
    {
        $statement = $this->db
            ->prepare("SELECT `id`, `brand` FROM `car_brand` WHERE `brand` LIKE '$name'");

        $statement->execute();

        $id = $statement->fetch(PDO::FETCH_NUM);

        return $id[0];
    }
}
