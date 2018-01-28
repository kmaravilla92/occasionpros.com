<?php

namespace App\Models\Repositories;

interface RepositoryInterface {
    public static function findAll($options = []);
    public static function findById($id = null, $options = []);
}