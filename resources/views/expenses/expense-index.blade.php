@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table">
 <thead>
   <tr>
    <th>#</th>
    <th>Description</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Payment Method</th>
    
    
  </tr>
 </thead>
 <tbody>
  @foreach($expenses as $expense)
  <tr>
    <td>{{$expense->id}}</td>
    <td>{{$expense->description}}</td>
    <td>{{$expense->amount}}</td>
    <td>{{$expense->category}}</td>
    <td>{{$expense->payment_method}}</td>
    
  </tr>
  @endforeach
 </tbody>
</table> 

{{$expenses->render()}}

    </div>
  </div>
</div>

@endsection