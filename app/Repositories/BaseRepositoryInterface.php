<?php
namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Lấy tất cả các bản ghi.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);

    /**
     * Tìm một bản ghi bằng ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id);

    /**
     * Tạo một bản ghi mới.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes);

    /**
     * Cập nhật một bản ghi bằng ID.
     *
     * @param int $id
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $attributes);

    /**
     * Xóa một bản ghi bằng ID.
     *
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id);
}
