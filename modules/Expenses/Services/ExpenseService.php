<?php

namespace Modules\Expenses\Services;

use Modules\Expenses\Repositories\ExpenseRepository;
use Modules\Expenses\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseService
{
    public function __construct(private ExpenseRepository $repository) {}

    public function getAll($filters = [])
    {
        return $this->repository->getAll($filters);
    }

    public function create(array $data): Expense
    {
        return DB::transaction(fn() => $this->repository->create($data));
    }

    public function update(Expense $expense, array $data): Expense
    {
        return $this->repository->update($expense, $data);
    }

    public function delete(string $id): void
    {
        $expense = $this->repository->findById($id);
        if (!$expense) {
            throw new \Exception('Expense not found');
        }
        $this->repository->delete($expense);
    }
}
