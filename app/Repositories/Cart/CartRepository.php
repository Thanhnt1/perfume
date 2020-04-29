<?php
namespace App\Repositories\Cart;

use App\Repositories\BaseRepository;

class CartRepository extends BaseRepository implements ICartRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Cart";
    }
}