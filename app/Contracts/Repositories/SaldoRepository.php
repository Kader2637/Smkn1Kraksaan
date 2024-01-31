<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SaldoInterface;

class SaldoRepository extends BaseRepository implements SaldoInterface
{
    public function get(): mixed
    {
        return $this->model->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->store($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
}
