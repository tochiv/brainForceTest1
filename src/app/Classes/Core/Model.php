<?php

declare(strict_types=1);

namespace Classes\Core;

class Model
{
    protected DBConnection $db;

    public function __construct()
    {
        $this->db = new DBConnection('localhost', 'brainforce', 'root', 'root');
    }
}