@extends('admin.admin-dashboard')
@section('content')

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
  thead tr th{
    color: white!important;
  }
 span.select2.select2-container.select2-container--default {
    width: 100% !important;
}
</style>
@if(Auth::check() && Auth::user()->role == 'admin')
<div style="background:#efeff6;" class="ml-3 d-flex "><a href="{{ url('user/insert')}}"  class="btn btn-primary px-4 py-2 " style="font-size: 20px; font-weight: bolde;">Add</a></div>
@endif

<div class="container card px-0 " style="width: 97%;">
  <table class="table ">
    <thead class="bg-primary text-white">
      <tr >
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Assign to Client</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $index => $val)
      <tr class="border">
       <td>{{$index+1}}</td>
       <td>{{$val->name}}</td>
       <td>{{$val->email}}</td>
       <td>{{$val->role}}</td>
       <td><a href="{{ route('user.edit', ['id' => $val->id]) }}" class="btn btn-success">Update</a></td>
       <td><a href="{{ route('user.destroy', ['id' => $val->id]) }}" class="btn btn-danger">Delete</a></td>
       
       <td>
        @if($val->role == 'user')
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$val->id}}">
         Assign
       </button>
       @endif
     </td>
       
     </tr>
          @endforeach
      </tbody>
    </table>
  </div>
 @foreach($users as $index => $val)
 <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$val->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="{{$val->id}}">Select client</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" >&times;</span>
            </button>
          </div>
          <div class="modal-body">

                  <form action="{{url('/client-access/'.$val->id)}}" id="accessForm" method="post">
                    @csrf
                   <select name="client_id[]" class="multiple" class="js-states form-control" multiple required>
                    @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

             
        <button type="submit"  class="btn btn-primary">Save changes</button>
      
            
                </div>
              </form>

            </div>
          </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $(".multiple").select2({
          placeholder: "Select ",
          allowClear: true,

      });
    </script>
  @endforeach
  @endsection