@extends('admin.admin-dashboard')
@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0 text-white text-center">Add Clients</h2>
                </div>
                <div class="card-body p-4 border">
                    <form action="{{url('/client-create')}}" method="POST" class=" p-5 border">
                        @csrf
                         <div class="form-group">
                            <label for="address">Person Responsible:</label>
                            <input type="text" class="form-control" placeholder=" Enter your Person Responsible" id="address" name="person_responsible" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter your name " id="name" name="name" required>
                        </div>
                         <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" placeholder=" Enter your position" id="position" name="position" required>
                        </div>
                           <div class="form-group">
                            <label for="address">Time of Call:</label>
                            <input type="time" class="form-control" placeholder="Enter your Time of Call" id="address" name="time_of_cell" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Work Phone:</label>
                            <input type="text" class="form-control" placeholder="Enter your Phone number" id="phone" name="phone" required>
                        </div>
                           <div class="form-group">
                            <label for="country_of_residence">Country:</label>
                            <input type="text" class="form-control" placeholder="Enter the country" id="country_of_residence" name="country_of_residence" required>
                        </div>
                        
                         <div class="form-group">
                            <label for="other_phone">Other Phone Number:</label>
                            <input type="text" class="form-control" placeholder=" Enter your other_phone" id="other_phone" name="other_phone">
                        </div>
                        <div class="form-group">
                            <label for="email">Work E-mail:</label>
                            <input type="email" class="form-control"placeholder="Enter your email"  id="email" name="email" required>
                        </div>                    
                        <div class="form-group">
                            <label for="other_email">Other E-mail:</label>
                            <input type="email" class="form-control"placeholder=" Enter your other_email"  id="other_email" name="other_email">
                        </div>
                   
                        <div class="form-group">
                            <label for="company">Company Name:</label>
                            <input type="text" class="form-control" placeholder="Enter your company " id="company" name="company" required>
                        </div>
                     
                        <div class="form-group">
                            <label for="lead_id">Lead ID:</label>
                            <input type="text" class="form-control" placeholder="Enter your Lead_ID " id="lead_id" name="lead_id" required>
                        </div>
                             <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" placeholder=" Enter your address" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="nationality">Nationality:</label>
                            <input type="text" class="form-control" placeholder=" Enter your nationality" id="nationality" name="nationality" >
                        </div>
                       
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection