@extends('layout')

@section('content')
@if (Session::get('status'))
<div class="alert alert-danger" role="alert">
  {{Session::get('status')}}
</div>
<p class="text-center font-weight-bold">{{__('home.api_error')}}</p>
<div class="row justify-content-center mb-5">
    <button style="color: white" class="btn btn-dark btn-lg ml-5 mr-5 mt-5" onClick="window.location.reload();">
        <i class="fa fa-refresh "></i>
    </button>
</div>
@else
@if (Session::get('email'))
<div class="alert alert-success text-center" role="alert">
    <i class="fa fa-envelope-o"></i>
    {{Session::get('email')}}
</div>
@endif
@if (Session::get('loginError'))
<div class="alert alert-danger text-center" role="alert">
    <i class="fa fa-envelope-o"></i>
    {{Session::get('loginError')}}
</div>
@endif
@if (Session::get('loggedUser'))
<div class="row justify-content-center mb-1">
    <a style="color: white" class="btn btn-info ml-5 mr-5 mt-1" href="/send-email">
        <i class="fa fa-envelope-o "></i> {{__('home.mailMe')}}
    </a>
</div>
@endif
<input class="form-control" id="myInput" type="text" placeholder="{{__('home.search')}}">
<div class="container mt-3">
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>{{__('home.user')}}</th>
        <th>{{__('home.todoTitle')}}</th>
        <th>{{__('home.status')}}</th>
      </tr>
    </thead>
    <tbody id="myTable">
    @foreach ($data as $item)
    <tr>
      <td>{{$item['id']}}</td>
      <td>{{$item['userId']}}</td>
      <td>{{$item['title']}}</td>
      <td>{!! ($item['completed']) ? '<i class="fa fa-check" style="color: green"></i>' : '<i class="fa fa-times" style="color: red"></i>' !!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>  
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endif

@stop