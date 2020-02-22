<?php
namespace App\Services;

interface IBaseService
{
    public function findByID($id);
    public function findByUuid($uuid);
    public function createData(array $params);
    public function updateData(array $params, $id);
    public function fetchAll($orderBy, $direction = 'asc', $columns = array('*'));
}