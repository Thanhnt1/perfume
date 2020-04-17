<?php
namespace App\Services\Comment;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentService extends BaseService implements ICommentService
{

    public function repository()
    {
        return "App\\Repositories\\Comment\ICommentRepository";
    }

}