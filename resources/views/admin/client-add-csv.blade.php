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
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class=" p-5 border">
                        @csrf
                        <div class="form-group">
                            <label > Import Clients:</label>
                              <input type="file" name="file" accept=".csv">
                        </div>
                       
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection