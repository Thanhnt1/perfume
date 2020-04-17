<?php
namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements ICommentRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::model()
     */
    public function model()
    {
        return "App\\Models\\Comment";
    }
}