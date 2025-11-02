<?php

namespace Modules\Expenses\Tests\Feature;

use Tests\TestCase;
use Modules\Expenses\Models\Expense;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_can_create_expense()
    {
        $payload = [
            "title" => "Lunch",
            "amount" => 25.5,
            "category" => "food",
            "expense_date" => "2025-10-31",
        ];

        $this->postJson('/api/expenses', $payload)
            ->assertStatus(201)
            ->assertJsonFragment(['title' => 'Lunch']);
        
    }
}
