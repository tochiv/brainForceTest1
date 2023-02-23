<?php

declare(strict_types=1);

namespace Classes\Model;

use Classes\Core\Model;

class SendOrderClass extends Model
{
    public function sendOrder(string $name, string $phone, string $brand, string $model, string $part)
    {
        $statement = $this->db
            ->prepare("INSERT INTO `car_order` (`name`, `phone`, `brand`, `model`, `part`) VALUES(:name, :phone, :brand, :model, :part)");

        $statement->bindParam(':name', $name);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':brand', $brand);
        $statement->bindParam(':model', $model);
        $statement->bindParam(':part', $part);


        $statement->execute();
    }
}