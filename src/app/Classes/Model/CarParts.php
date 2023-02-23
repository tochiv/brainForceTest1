<?php

declare(strict_types=1);

namespace Classes\Model;

use Classes\Core\Model;
use PDO;

class CarParts extends Model
{
    public function getParts(): array
    {
        $statement = $this->db
            ->prepare("SELECT `id`, `part` FROM `car_parts`");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}