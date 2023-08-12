 @extends('admin.admin-dashboard') 
@section('content')
  
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0 text-white text-center">Update Clients</h2>
                </div>
                <div class="card-body p-4 border">
                    <form action=" " method="POST" class=" p-5 border">
                        @csrf
                        <div class="form-group">
                            <label for="person_responsible">Person Responsible:</label>
                            <input type="text" class="form-control"  id="person_responsible" name="person_responsible" value="{{$client->person_responsible}}" required>
                        </div>
                                           
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{$client->name}}"  required>
                        </div>

                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" id="position" name="position"  value="{{$client->position}}"  required>
                        </div>

                        <div class="form-group">
                            <label for="time_of_cell">Time of Call:</label>
                            <input type="time" class="form-control" value="{{$client->time_of_cell}}" id="time_of_cell" name="time_of_cell" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Work Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone"  value="{{$client->phone}}"  required>
                        </div>

                        <div class="form-group">
                            <label for="country_of_residence">Country:</label>
                            <input type="text" class="form-control" id="country_of_residence" name="country_of_residence"  value="{{$client->country_of_residence }}"  required>
                        </div>

                        <div class="form-group">
                            <label for="other_phone">Other Phone Number:</label>
                            <input type="text" class="form-control" id="other_phone" name="other_phone" value="{{$client->other_phone }}"  >
                        </div>

                        <div class="form-group">
                            <label for="email">Work E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{$client->email}}"  required>
                        </div>
                    
                        <div class="form-group">
                            <label for="other_email">Other E-mail:</label>
                            <input type="email" class="form-control" id="other_email" name="other_email" value="{{$client->other_email}}"  >
                        </div>

                        <div class="form-group">
                            <label for="company">Company Name:</label>
                            <input type="text" class="form-control" id="company" name="company"  value="{{$client->company}}"  required>
                        </div>
                      
                        <div class="form-group">
                            <label for="lead_id">Lead ID:</label>
                            <input type="text" class="form-control" id="lead_id" name="lead_id"  value="{{$client->lead_id}}"  required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address"  value="{{$client->address}}">
                        </div>
                                 
                        <div class="form-group">
                            <label for="nationality">Nationality:</label>
                            <input type="text" class="form-control" id="nationality" name="nationality"  value="{{$client->nationality }}" >
                        </div>
                     
                        <input type="submit" value=" Update" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 