<?php

namespace Modules\Expenses\Repositories;

use Modules\Expenses\Models\Expense;
use Illuminate\Database\Eloquent\Collection;

class ExpenseRepository
{
    /**
     * Get all expenses with optional filters.
     */
    public function getAll(array $filters = []): Collection
    {
        $query = Expense::query();

        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (!empty($filters['from']) && !empty($filters['to'])) {
            $query->whereBetween('expense_date', [$filters['from'], $filters['to']]);
        }

        return $query->orderBy('expense_date', 'desc')->get();
    }

    /**
     * Store a new expense.
     */
    public function create(array $data): Expense
    {
        return Expense::create($data);
    }

    /**
     * Update an existing expense.
     */
    public function update(Expense $expense, array $data): Expense
    {
        $expense->update($data);
        return $expense;
    }

    /**
     * Delete an expense.
     */
    public function delete(Expense $expense): void
    {
        $expense->delete();
    }

    /**
     * Find expense by ID.
     */
    public function findById(string $id): ?Expense
    {
        return Expense::find($id);
    }
}
