@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Welcome, {{ Auth::user()->name }} </h5>
                    <p>You are logged in!</p>

                    <hr>

                    <a href="{{ route('expense.list') }}" class="btn btn-outline-primary me-2"> View Expenses</a>
                    <a href="{{ route('expense.add') }}" class="btn btn-outline-success">Add New Expense</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
