@extends('admin.admin-dashboard') 
@section('content')


<form action=" " method="POST" >
 @csrf
<textarea type="text"></textarea>
<input type="submit" value="send">

</form>

@endsection