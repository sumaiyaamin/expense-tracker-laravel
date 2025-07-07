@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Expense List</h2>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Date</th>
            <th>Payment Method</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($expenses as $expense)
          <tr>
            <td>{{ $expense->id }}</td>
            <td>{{ $expense->description }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->category }}</td>
            <td>{{ $expense->date }}</td>
            <td>{{ $expense->payment_method }}</td>
            <td>
              
              <a href="{{ route('expense.edit', $expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
              
              <form action="{{ route('expense.delete', $expense->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this expense?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $expenses->links() }}
    </div>
  </div>
</div>

@endsection
