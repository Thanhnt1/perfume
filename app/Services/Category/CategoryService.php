<?php
namespace App\Services\Category;

use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService extends BaseService implements ICategoryService
{

    public function repository()
    {
        return "App\\Repositories\\Category\ICategoryRepository";
    }

    /**
     * {@inheritDoc}
     * @see \App\Services\Template\ITemplateService::fetchAllJSON()
     */
    public function fetchAllJSON()
    {
        $categories = $this->repository->fetchData();
        
        return datatables()->of($categories)->make(true);
    }
}