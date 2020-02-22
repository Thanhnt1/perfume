<?php
namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseRepository extends PrettusBaseRepository
{
    /**
     * {@inheritDoc}
     * @see \Prettus\Repository\Eloquent\BaseRepository::model()
     */
    public function model()
    {
        
    }

}