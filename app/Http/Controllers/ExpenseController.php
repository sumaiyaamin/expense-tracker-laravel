<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(){

        $expense = Expense::orderByDesc('id')->paginate(5);
        return view('expenses.expense-index')->with('expenses', $expense);
    ;}
}
