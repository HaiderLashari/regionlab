@extends('admin.admin-dashboard') 

@section('content')
<style type="text/css">
  thead tr th{
    color: white!important;
  }
  .dataTables_length{
  padding:15px 0px 0px 10px;
  }
  .dataTables_info{
     padding:0px 0px 0px 8px;
     margin-top: 10px;
  }
  .dataTables_filter{
    margin:10px!important;
  }
  .dataTables_paginate{
     padding: 9px!IMPORTANT;

  }
  .toggle:focus{
   box-shadow: none!important;

  }
.btn-secondary:focus{
      box-shadow: none!important;
  }
  .dropdown-item:hover {
    color: #5969ff!important;
    background: #efeff6;
}
</style>
@if(Auth::check() && Auth::user()->role == 'admin')
<div style="background:#efeff6;" class="ml-3 d-flex ">
  <a href="{{url('/client-add')}}"  class="btn btn-warning px-4 py-2 mr-2 mb-2 " style="font-size: 20px; font-weight: bolde;">Add</a>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalccdd">
  Add CSV
</button>
</div> 
@endif
<div class="container  card  px-0 " style="width: 98%;">
  <table class="table" id="clientTable">
    <thead class="bg-primary text-white">
      <tr >
        <th>ID</th>
        <th>Name</th>
        <th>Company</th> 
        <th>Postion</th>
        <th>Time of Call</th>
        <th>Work Phone</th>
        {{-- <th>Detail</th> --}}
  {{--       <th>Update</th>
        <th>Delete</th> --}}
    {{--     <th>Status</th>
         @if(Auth::check() && Auth::user()->role == 'admin')
        <th>Access</th>
        @endif --}}
        {{-- <th>Comment</th> --}}
        {{-- <th>View Commant</th> --}}
        <th>Clients Detail</th>
      </tr>
    </thead>
    <tbody>
      @if(Auth::check() && Auth::user()->role == 'admin')
      @foreach($clients as $index => $val)
       
      <tr class="border">
       <td>{{$index+1}}</td>
       <td>{{$val->name}}</td>
       <td>{{$val->company}}</td> 
       <td>{{$val->position}}</td>
       <td>{{$val->time_of_cell}}</td>
       <td>{{$val->phone}}</td>
       {{-- <td><a href="{{url('/client-profile/'.$val->id)}}" class="btn btn-warning">Detail</a></td>       --}}
     {{--   <td><a href="{{ route('client.edit', ['id' => $val->id]) }}" class="btn btn-success">Update</a></td>
       <td><a href="{{ route('client.destroy', ['id' => $val->id]) }}" class="btn btn-danger">Delete</a></td> --}}
    {{--    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$val->id}}">
        Status
      </button></td>
      <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalabc{{$val->id}}">
       Assign
     </button></td> --}}
{{--      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalcomnt{{$val->id}}">
  Comment
</button></td> --}}
{{-- <td><a href="{{url('/view_comment/'.$val->id)}}" class="btn btn-success">View Comment</a></td>  --}}
<td><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$val->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    View Detail
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;" data-toggle="modal" data-target="#exampleModaldetail{{$val->id}}" >Detail</a>
     <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;" data-toggle="modal" data-target="#exampleModal{{$val->id}}" >Status</a>
     <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;" data-toggle="modal" data-target="#exampleModalabc{{$val->id}}" >Assign</a>
     <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;" data-toggle="modal" data-target="#exampleModalcomnt{{$val->id}}" >Comment</a>
     <a class="dropdown-item" href="{{url('/view_comment/'.$val->id)}}">View Comment</a>
     <a class="dropdown-item" href="{{ route('client.edit', ['id' => $val->id]) }}">Update</a>
     <a class="dropdown-item" href="{{ route('client.destroy', ['id' => $val->id]) }}">Delete</a>
  </div>
</div></td>
   </tr>

@endforeach
@else
      @foreach($finds as $index => $val)
      <tr class="border">
       <td>{{$index+1}}</td>
       <td>{{$val->name}}</td>
       <td>{{$val->company }}</td> 
       <td>{{$val->position}}</td>
       <td>{{$val->time_of_cell}}</td>
       <td>{{$val->phone}}</td>
     {{--    <td><a href="{{url('/client-profile/{$id}')}}" class="btn btn-warning">Detail</a></td>      
       <td><a href="{{ route('client.edit', ['id' => $val->id]) }}" class="btn btn-success">Update</a></td>
       <td><a href="{{ route('client.destroy', ['id' => $val->id]) }}" class="btn btn-danger">Delete</a></td> --}}
     {{--   <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$val->id}}">
        Status
      </button></td> --}}
       @if(Auth::check() && Auth::user()->role == 'admin')
      <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalabc{{$val->id}}">
       Assign
     </button></td>
     @endif
{{--           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalcomnt{{$val->id}}">
  Comment
</button></td> --}}
{{-- <td><a href="{{url('/view_comment/'.$val->id)}}" class="btn btn-success">View Comment</a></td> --}}
<td><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$val->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    View Detail
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;" data-toggle="modal" data-target="#exampleModaldetail{{$val->id}}" >Detail</a>
    <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;"  data-toggle="modal" data-target="#exampleModal{{$val->id}}" >Status</a>
    <a class="dropdown-item btn" style="padding: 0.25rem 1.5rem;"   data-toggle="modal" data-target="#exampleModalcomnt{{$val->id}}" >Comment</a>
    <a class="dropdown-item" href="{{url('/view_comment/'.$val->id)}}">View Comment</a>
  {{--   <a class="dropdown-item" href="{{ route('client.edit', ['id' => $val->id]) }}">Update</a>
    <a class="dropdown-item" href="{{ route('client.destroy', ['id' => $val->id]) }}">Delete</a> --}}
  </div>
</div></td> 
   </tr>

@endforeach
@endif

</tbody>
</table>
</div>
      @foreach($clients as $index => $val)
 <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$val->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{$val->id}}">Select status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('/client-edit/'.$val->id)}}" method="POST" id="fst">
            @csrf
              <label for="status">Status:</label>
              <select  class="form-control"  name="status" required>
                @if($val->status){
                <option >{{$val->status}}</option>
                }@else{
                     <option value=" ">Select your status</option>
                }@endif
                <option value="Open / Fresh Lead">Open / Fresh Lead</option>
                <option value="Open –Attempted Contact">Open –Attempted Contact</option>
                <option value="Open – Booked Appointment">Open – Booked Appointment</option>
                <option value="Open – Client Contact">Open – Client Contact</option>
                <option value="Closed – 6th or 7th attempt htr">Closed – 6th or 7th attempt htr</option>
                <option value="Open – Fronted">Open – Fronted</option>
                <option value="Open – Half-Pitched Keep">Open – Half-Pitched Keep</option>
                <option value="Open – Pitched Keep">Open – Pitched Keep</option>
                <option value="Open – Deal Written">Open – Deal Written</option>
                <option value="Open – Deal Complied">Open – Deal Complied</option>
                <option value="Closed – No pitches/Blow offs">Closed – No pitches/Blow offs</option>
                <option value="Closed – allocated to email marketing">Closed – allocated to email marketing</option>
                <option value="Closed – Bad number">Closed – Bad number</option>
                <option value="Closed – Half-pitch no keep">Closed – Half-pitch no keep</option>
                <option value="Closed – payment cleared – deal complete">Closed – payment cleared – deal complete</option>
                <option value="Closed – dnc heat">Closed – dnc heat</option>
                <option value="Open – Institutional pitch">Open – Institutional pitch</option>
                <option value="Open – dci fresh">Open – dci fresh</option>
                <option value="Open – htr">Open – htr</option>
                <option value="Resting / Mature">Resting / Mature</option>
                <option value="C – L">C – L</option>
                <option value="Good Lead">Good Lead</option>
                <option value="Junk Lead">Junk Lead</option>
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
@endforeach 


@foreach($clients as $index => $val)
<div class="modal fade" id="exampleModaldetail{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$val->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{$val->id}}">Client Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
     <style type="text/css">
 .modeltable  tr{
 border: 1px solid #7178a3;
  }
   .modeltable tr th{
    font-size: 16px;
    padding: 10px 0px 10px 10px;
      border: 1px solid #7178a3;
   }
    .modeltable tr td{
      font-size: 14px;
    padding: 10px 0px 10px 10px;
    
   }
     </style>  
 

<table class="modeltable m-auto" style="width:90%">
 
@if($val->addtional_detail)
 @php
  $merge = array_merge($val->toArray(), json_decode($val->addtional_detail, true));
  unset($merge['addtional_detail']);
  unset($merge['id']);
  unset($merge['created_at']);
  unset($merge['updated_at']);
 @endphp
@foreach($merge as $k => $v)
@if(!empty($v))
<tr>
    <th>{{$k}}:</th>
    <td>{{$v}}</td>
  </tr>
@endif
@endforeach 
@else

  <tr>
    <th>Person Responsible:</th>
    <td>{{$val->person_responsible}}</td>
  </tr>
   @if($val->status)
  <tr>
    <th>Status:</th>
    <td>{{$val->status}}</td>
  </tr>
  @endif
  <tr>
    <th>Name:</th>
    <td>{{$val->name}}</td>
  </tr>
    <tr>
    <th>Posotion:</th>
    <td>{{$val->position}}</td>
  </tr>
  <tr>
    <th>Time of Call:</th>
    <td>{{$val->time_of_cell}}</td>
  </tr>
  <tr>
    <th>Work Phone:</th>
    <td>{{$val->phone}}</td>
  </tr>
    <tr>
    <th>Country:</th>
    <td>{{$val->country_of_residence}}</td>
  </tr>
  @if($val->other_phone )
  <tr>
    <th>Other Phone Number:</th>
    <td>{{$val->other_phone}}</td>
  </tr>
  @endif
  <tr>
    <th>Work E-mail:</th>
    <td>{{$val->email}}</td>
  </tr>
   @if($val->other_email )
    <tr>
    <th>Other E-mail:</th>
    <td>{{$val->other_email}}</td>
  </tr>
  @endif
  <tr>
    <th>Company Name:</th>
    <td>{{$val->company}}</td>
  </tr>
  <tr>
    <th>Lead ID:</th>
    <td>{{$val->lead_id}}</td>
  </tr>
    @if($val->address)
    <tr>
    <th>Address:</th>
    <td>{{$val->address}}</td>
  </tr>
  @endif
    @if($val->nationality)
    <tr>
    <th>Nationality:</th>
    <td>{{$val->nationality}}</td>
  </tr>
  @endif
    @if($val->addtional_detail )
    <tr>
    <th>Addtional Details:</th>
    <td>{{$val->addtional_detail}}</td>
  </tr>
  @endif
  @endif 
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach 


@foreach($clients as $index => $val)
<div class="modal fade" id="exampleModalabc{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$val->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{$val->id}}">Select User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/user-access/'.$val->id)}}" id="accessForm" method="post">
          @csrf
            @php
            $client = App\Client::find($val->id);
            // echo $client->id;
            $assignuser = $client->users()->get()->first()->toArray();
         
            @endphp
          <select name="user_id[]" class="form-control" required>
            @foreach($users as $user)
            <option  value="{{$user->id}}"@if(in_array($user->id, $assignuser)) selected @endif >{{$user->name}}</option>
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

@endforeach
@foreach($clients as $index => $val)
<div class="modal fade" id="exampleModalcomnt{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$val->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{$val->id}}">Add comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
         <form action="{{ url('/add-comment/'.$val->id) }}" method="POST" enctype="multipart/form-data" class="px-3 py-3 border">
                        @csrf
                          <div class="form-group mb-0">
                             <label for="status">Type:</label>
                              <select  class="form-control selection"  name="selection" required>
                               <option value="selectoption">Select the option</option>
                                <option value="comment">Comment</option>
                                <option value="file">File</option>
                              </select>
                        </div>
                        <div class="form-group fileInput mt-4"  styl7="display: none;">
                            <label class="mb-0">Add Comment File</label><br>
                              <input class="w-75 mt-3 ml-3" type="file" name="file" accept=".csv">
                        </div>
                          <div class="form-group commentInput my-5"  style="display: none;">
                            <label class="mb-0">Write Comment</label>
                              <textarea type="text" class="form-control" name="comment"></textarea>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

<div class="modal fade" id="exampleModalccdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CSV FILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="p-3 border">
                        @csrf
                        <div class="form-group mb-0">
                            <label class="mb-0" > Import Clients:</label><br>
                              <input class="w-75 mt-3 ml-3" type="file" name="file" accept=".csv">
                        </div>                                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
           </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.selection').on('change', function() {
      var selectedOption = $(this).val();

      if (selectedOption =='comment') {
        $('.commentInput').show();
        $('.fileInput').hide();
      } else if (selectedOption =='file') {
        $('.commentInput').hide();
        $('.fileInput').show();
      } else if(selectedOption =='selectoption'){
       $('.commentInput').hide();
        $('.fileInput').hide();
        }
    });
  });
</script>

@endsection



