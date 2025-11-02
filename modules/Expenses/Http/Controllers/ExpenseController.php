<?php

namespace Modules\Expenses\Http\Controllers;

use Modules\Expenses\Models\Expense;
use Modules\Expenses\Services\ExpenseService;
use Modules\Expenses\Http\Requests\StoreExpenseRequest;
use Modules\Expenses\Http\Requests\UpdateExpenseRequest;
use Modules\Expenses\Http\Resources\ExpenseResource;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    public function __construct(private ExpenseService $service) {}

    public function index()
    {
        $expenses = $this->service->getAll(request()->all());
        return ExpenseResource::collection($expenses);
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = $this->service->create($request->validated());
        return new ExpenseResource($expense, Response::HTTP_CREATED);
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $updated = $this->service->update($expense, $request->validated());
        return new ExpenseResource($updated);
    }

    public function destroy($expense)
    {
        $this->service->delete($expense);
        return response()->noContent();
    }
}
