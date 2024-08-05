<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Model hiện tại.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Khởi tạo repository với model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Lấy tất cả các bản ghi.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Tìm một bản ghi bằng ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Tạo một bản ghi mới.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Cập nhật một bản ghi bằng ID.
     *
     * @param int $id
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $attributes)
    {
        $model = $this->model->findOrFail($id);
        $model->update($attributes);
        return $model;
    }

    /**
     * Xóa một bản ghi bằng ID.
     *
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return $model;
    }
}
