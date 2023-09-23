@extends('admin.admin-dashboard') 
@section('content')

<style type="text/css">

    body {
        background: #242849;
        width: 80%;
        padding: 20px 20px;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>



<div class="container rounded bg-white ml-5  mb-5">  
   <h1 class="text-center py-3   mb-0">Client Profile</h1> 
   <div class="row bg-white border mx-5">
    <div class="col-md-5 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-2" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <span class="font-weight-bold mt-5">{{ $client->name }}</span>
            <span class="text-black-50 mt-2">{{ $client->email }}</span>

        </div>
    </div>
    <div class="col-md-7 borderd">
        <div class="p-3 py-5">

            <div class="row mt-2">
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

        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <label for="address">Person Responsible:</label>
            <input type="text" class="form-control" value="{{$client->person_responsible}}"  readonly required>             
        </div> 
        @if($client->status)
        <div class="col-md-12">
            <label for="nationality">Status</label>
            <input type="text" class="form-control"  value="{{$client->status}}"  readonly  required>
        </div>
        @endif                
        <div class="col-md-12">
         <label for="name">Name:</label>
         <input type="text" class="form-control"    value="{{$client->name}}"  readonly  required>
     </div>
     <div class="col-md-12">
      <label for="position">Position:</label>
      <input type="text" class="form-control"  value="{{$client->position}}"  readonly  required>
  </div>
  <div class="col-md-12">
    <label for="address">Time of Call:</label>
    <input type="text" class="form-control"  value="{{$client->time_of_cell}}"  readonly required>
</div>
<div class="col-md-12">
    <label for="phone">Work Phone:</label>
    <input type="text" class="form-control"    value="{{$client->phone}}"  readonly  required>
</div>
<div class="col-md-12">
    <label for="country_of_residence">Country:</label>
    <input type="text" class="form-control"   value="{{$client->country_of_residence }}"  readonly  required>
</div>
@if($client->other_phone )
<div class="col-md-12">
    <label for="other_phone">Other Phone Number:</label>
    <input type="text" class="form-control"   value="{{$client->other_phone }}"  readonly  >
</div>
@endif
<div class="col-md-12">
    <label for="email">Work E-mail:</label>
    <input type="email" class="form-control"    value="{{$client->email}}"  readonly  required>
</div>
@if($client->other_email )
<div class="col-md-12">
    <label for="other_email">Other E-mail:</label>
    <input type="email" class="form-control"  value="{{$client->other_email}}"  readonly  >
</div>
@endif

<div class="col-md-12">
    <label for="company">Company Name:</label>
    <input type="text" class="form-control"  value="{{$client->company}}"  readonly required>
</div>

<div class="col-md-12">
    <label for="lead_id">Lead ID:</label>
    <input type="text" class="form-control"    value="{{$client->lead_id}}" readonly required>
</div>

@if($client->address)
<div class="col-md-12">
    <label for="address">Address:</label>
    <input type="text" class="form-control"    value="{{$client->address}}"  readonly  required>
</div>
@endif

@if($client->nationality)
<div class="col-md-12">
    <label for="nationality">Nationality:</label>
    <input type="text" class="form-control"  value="{{$client->nationality }}"  readonly  required>
</div>
@endif="col-md-12">
<label for="nationality">Addtional Details</label>
<input type="text" class="form-control"  value="{{$client->addtional_detail }}"  readonly  required>
</div>
@endif
--}}

</div>
</div>
</div>
</div>

@endsection