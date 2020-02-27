<?php
namespace App\Repositories\Image;

use App\Repositories\BaseRepository;

class ImageRepository extends BaseRepository implements IImageRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Image";
    }
}