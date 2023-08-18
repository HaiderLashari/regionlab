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
               



{{--     @php
            $client = App\Client::find($val->id);
            // echo $client->id;
            $assignuser = $client->users()->get()->first()->toArray();
         
            @endphp
          <select name="user_id[]" class="form-control" required>
            @foreach($users as $user)
            <option  value="{{$user->id}}"@if(in_array($user->id,$assignuser)) selected @endif >{{$user->name}}</option>
            @endforeach
 --}}





          @dd($val)
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
                        @endif
                    
                    {{--    @if($client->addtional_detail)
                        <div class="col-md-12">
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




    // public function showUserAccessForm()
    // {   
       
    //         $id = Auth::user()->id;
    //       $users = User::where('id', '!=', $id)->get();
    //     return redirect()->route('client.display', ['users' => $users]);
    // }

    // public function saveUserAccess(Request $request,$id)
    // {
    //     $client = Client::find($id);
    //     foreach ($request->user_id as $id) {
    //         $client->users()->attach($id);
    //     }
    //     return redirect()->route('client.display'); 
    // }



//  public function saveUserAccess(Request $request, $id)
// {
//     $client = Client::find($id);

//     $assignedUsers = $client->users()->pluck('users.id');

//     foreach ($request->user_id as $userId) {
//         if (in_array($userId, $assignedUsers)) {
//             return redirect()->route('client.display');
//         }

//         $client->users()->attach($userId);
//     }

//     return redirect()->route('client.display');
// }


// public function saveUserAccess(Request $request, $id)
// {
//     $clients = DB::table('user_client')->where('client_id', $id)->get()->count();
//     dd($clients);
//     if($clients >= 1){

//     }
//     $client = Client::find($id);
//     $requestedUser = $request->user_id;
    
//     $assignedUser = $client->users()->pluck('users.id')->toArray();
    
//     $usersToAssign = array_diff($requestedUser, $assignedUser);
    
//     if (count($usersToAssign) >= 0) {
//         foreach ($usersToAssign as $userId) {

//             $client->users()->attach($userId);
//         }
//         return redirect()->route('client.display');
//     } else {
//         return redirect()->route('client.display');
//     }
// }

// public function saveClientAccess(Request $request,$id)
// {   
   

//     $user = User::find($id);

//     foreach ($request->client_id as $id) {

//         $user->clients()->attach($id);
//     }
//     $show = $user->clients()->get();

//     return redirect()->route('user.display'); 
// }   


// public function saveClientAccess(Request $request, $id)
// {   
//     $user = User::find($id);
//     $attachedClients = $user->clients()->pluck('clients.id')->toArray();
//     $requestedClients = $request->client_id;
    
//     $clientsToAttach = array_diff($requestedClients, $attachedClients);
    
//     if (count($clientsToAttach) > 0) {
//         foreach ($clientsToAttach as $clientId) {
//             $user->clients()->attach($clientId);
//         }
//     }
    
//     return redirect()->route('user.display');
//     }


[11:02 PM, 8/16/2023] haiderlashari1122: public function saveClientAccess(Request $request, $id)
{
    $client = Client::find($id);
    $requestedUsers = $request->user_id;

    $currentAssignedUsers = $client->users()->pluck('users.id')->toArray();
    
    // Detach users not in the requested list
    $usersToDetach = array_diff($currentAssignedUsers, $requestedUsers);
    foreach ($usersToDetach as $userId) {
        $client->users()->detach($userId);
    }

    // Attach new users
    $usersToAttach = array_diff($requestedUsers, $currentAssignedUsers);
    foreach ($usersToAttach as $userId) {
        $client->users()->attach($userId);
    }
    
    return redirect()->route('client.display');
}
{{-- [11:05 PM, 8/16/2023] haiderlashari1122: <form action="{{ route('save.client.access', ['id' => $client->id]) }}" method="post">
    @csrf
    <select name="user_id[]" multiple>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" @if(in_array($user->id, $assignedUserIds)) selected @endif>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Save</button>
</form> --}}