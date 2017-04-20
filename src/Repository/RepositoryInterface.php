<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 11/04/2017
 * Time: 22:39
 */
declare(strict_types=1);
namespace TRIFin\Repository;


interface RepositoryInterface
{
    /**
     * @return array
     */
    public function all():array ;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id, bool $failIfNotExist=true);

    /**
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findByField(string $field, $value) ;

    /**
     * @param array $search
     * @return mixed
     */
    public function findOneBy(array $search);
}
