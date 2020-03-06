<?php
namespace App\Services;

use App\Traits\ExceptionHandler;
use App\Repositories\BaseRepository;
use Illuminate\Container\Container as Application;
// use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseService
{
    use ExceptionHandler;

    protected $app;
    protected $repository;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeRepository();
    }

    abstract public function repository();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeRepository()
    {
        $repository = $this->app->make($this->repository());

        if (!$repository instanceof BaseRepository) {
            throw new RepositoryException("Class {$this->repository()} must be an instance of App\\Repositories\\BaseRepository");
        }

        return $this->repository = $repository;
    }

    /**
     * GET DATA BY ID OR UUID
     * @param string|integer $id
     * @return mixed|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByID($id)
    {
        try {
            if (is_numeric($id)) {
                $data = $this->repository->find($id);
            } else {
                $data = $this->findByUuid($id);
            }
            return $data;
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }

    /**
     * GET DATA BY UUID
     * @param Uuid $uuid
     * @return mixed|array|Closure
     */
    public function findByUuid($uuid)
    {
        return $this->repository->findByField('uuid', $uuid)->first();
    }

    /**
     * CREATE NEW DATA
     * @param array $params
     * @return mixed|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function createData(array $params)
    {
        return $this->repository->create($params);
    }

    /**
     * UPDATE DATA
     * @param array $params
     * @param integer $id
     * @return mixed|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function updateData(array $params, $id)
    {
        return $this->repository->update($params, $id);
    }

    public function fetchAll($orderBy, $direction = 'asc', $columns = array('*'))
    {
        return $this->repository->orderBy($orderBy, $direction)->all($columns);
    }

    public function renderDataOptions($data, $key = 'id', $name = 'name')
    {
        //
        $results = [];
        foreach ($data as $item){
            $results["{$item->{$key}}"] = $item->{$name};
        }
        return $results;
    }

    public function findByIds(array $ids = [])
    {
        return $this->repository->findWhereIn('id', $ids)->all();
    }

    public function getActiveDataOnlyIds()
    {
        $idString = $this->repository->getActiveStringId();
        return explode(',', $idString);
    }

    // function base64_to_jpeg($base64_string, $output_file = null) {
    //     if(!$output_file)
    //         $output_file = public_path('/admin/img/temporary_image.jpg');
    //     // open the output file for writing
    //     $ifp = fopen( $output_file, 'wb' ); 
    
    //     // split the string on commas
    //     // $data[ 0 ] == "data:image/png;base64"
    //     // $data[ 1 ] == <actual base64 string>
    //     // $data = explode( ',', $base64_string );
    
    //     // we could add validation here with ensuring count( $data ) > 1
    //     fwrite( $ifp, base64_decode( $base64_string ) );
    
    //     // clean up the file resource
    //     fclose( $ifp ); 
    
    //     return url('/admin/img/temporary_image.jpg'); 
    // }
}