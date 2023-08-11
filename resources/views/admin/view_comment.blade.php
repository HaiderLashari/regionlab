@extends('admin.admin-dashboard') 
@section('content')
<style type="text/css">
	  thead tr th{
   
  }
</style>

<div class="container  card  px-0 " style="width: 80%;">
  <table class="table" >
    <thead class="bg-warning text-white">
    	<tr>
          <th>Name</th>
          <th>Comment</th>
    	</tr>
    	</thead>
    	<tbody>
          <td>{{$client->name}}</td>
         <td>{{$client->comment}}</td>
    	</tbody>

@endsection