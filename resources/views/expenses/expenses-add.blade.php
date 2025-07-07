@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">

       <h2>Add Expense</h2>
       <form action="{{ route('expense.save') }}" method="post">
        @csrf
       <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" name="description" class="form-control">
       </div>

       <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input type="date" name="date" class="form-control">
       </div>

       <div class="mb-3">
          <label for="amount" class="form-label">Amount</label>
          <input type="number" name="amount" class="form-control" step="0.01" min="0">
       </div>

       <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select name="category" id="category" class="form-control">
            @foreach($categories as $category)
              <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
          </select>
       </div>

       <div class="mb-3">
          <label for="payment_method" class="form-label">Payment Method</label>
          <select name="payment_method" id="payment_method" class="form-control">
             @foreach($paymentMethods as $paymentMethod)
              <option value="{{ $paymentMethod }}">{{ $paymentMethod }}</option>
             @endforeach
          </select>
       </div>

       <button class="btn btn-primary">Save</button>

       </form>
    </div>
  </div>
</div>

@endsection
