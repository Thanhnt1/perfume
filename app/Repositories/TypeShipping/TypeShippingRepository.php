<?php
namespace App\Repositories\TypeShipping;

use App\Repositories\BaseRepository;
use App\Models\TypeShipping;
class TypeShippingRepository extends BaseRepository implements ITypeShippingRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\TypeShipping";
    }

}