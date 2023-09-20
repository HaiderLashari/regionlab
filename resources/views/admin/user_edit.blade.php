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
            margin-bottom: 15px;
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
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<div class="bdy">
    <div class="container">
        <h2> Update</h2>
        <form action=" " method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" value="{{$user->name}}" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="{{$user->email}}" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" value="{{$user->password}}" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
             <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
             <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                </select>
            </div>
            <div class="button-container">
                <input type="submit" value="update" class="btn">
            </div>
        </form>
    </div>
</div>



@endsection