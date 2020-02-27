<?php
namespace App\Services\Image;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageService extends BaseService implements IImageService
{

    public function repository()
    {
        return "App\\Repositories\\Image\IImageRepository";
    }

}