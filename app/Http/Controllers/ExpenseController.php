<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Expense::orderBy('id', 'asc')->paginate(5);

        return view('expenses.expense-index')->with('expenses', $expense);
    }

    public function add()
    {
        $expenseCategories = config('expense.expense_category');
        $paymentMethods = config('expense.payment_method');

        return view('expenses.expenses-add')
            ->with('categories', $expenseCategories)
            ->with('paymentMethods', $paymentMethods);
    }

    public function store(Request $request)
    {
        $expenseCategories = config('expense.expense_category');
        $paymentMethods = config('expense.payment_method');

        $postData = $this->validate($request, [
            'description' => ['required', 'min:3'],
            'date'        => ['required', 'date'],
            'amount'      => ['required', 'min:1'],
            'category' => ['required', Rule::in($expenseCategories)],
            'payment_method' => ['required', Rule::in($paymentMethods)],
        ]);

        $postData['user_id'] = Auth::id();

        Expense::create($postData);

        return redirect()->route('expense.list')->with('success', 'Expense added successfully.');

    }

    public function view($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.expense-view', compact('expense'));
    }

   
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $expenseCategories = config('expense.expense_category');
        $paymentMethods = config('expense.payment_method');

        return view('expenses.expenses-edit', compact('expense', 'expenseCategories', 'paymentMethods'));
    }

   
    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $expenseCategories = config('expense.expense_category');
        $paymentMethods = config('expense.payment_method');

        $postData = $this->validate($request, [
            'description' => ['required', 'min:3'],
            'date'        => ['required', 'date'],
            'amount'      => ['required', 'min:1'],
            'category' => ['required', Rule::in($expenseCategories)],
            'payment_method' => ['required', Rule::in($paymentMethods)],
        ]);

        $expense->update($postData);

        return redirect()->route('expense.list')->with('success', 'Expense updated successfully.');
    }

   
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expense.list')->with('success', 'Expense deleted successfully.');
    }
}
