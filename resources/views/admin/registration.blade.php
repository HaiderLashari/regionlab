@extends('admin.admin-dashboard')
@section('content')

<style>
    .bdy {
        background-color: #f1f1f1;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .button-container {
        text-align: center;
    }

    .btn {
        background-color:blue;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: blue;
    }
</style>

<div class="bdy">
    <div class="container w-75">
        <h2>Add user</h2>
        <form action="{{ url('/user-form')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
              @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                  @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
            </div>
            <div class="button-container">
                <input type="submit" value="Add User" class="btn ">
            </div>
        </form>
    </div>
</div>

@endsection
