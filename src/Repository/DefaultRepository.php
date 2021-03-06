<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 11/04/2017
 * Time: 22:43
 */
declare(strict_types=1);
namespace TRIFin\Repository;

use Illuminate\Database\Eloquent\Model;

class DefaultRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    private $modelClass;
    /**
     * @var Model
     */
    private $model;

    /**
     * DefaultRepository constructor.
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model= new $modelClass;
    }


    /**
     * @return array
     */
    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {

        $model= $this->findInternal($id);

        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        $model= $this->findInternal($id);
        $model->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id , bool $failIfNotExist=true)
    {
        return $failIfNotExist? $model = $this->model->findOrFail($id) : $model = $this->model->find($id) ;
    }

    public function findByField(string $field, $value)
    {
      return $this->model->where($field,'=', $value)->get() ;
    }

    /**
     * @param array $search
     * @return mixed
     */
    public function findOneBy(array $search)
    {
        $queryBuilder = $this->model;
        foreach ($search as $field =>$value){
            $queryBuilder=$queryBuilder->where($field,'=',$value);
        }
        return $queryBuilder->firstOrFail();
    }

    protected function findInternal($id){
       return is_array($id)? $this->findOneBy($id): $this->model->find($id) ;
    }
}