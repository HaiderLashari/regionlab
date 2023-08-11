@extends('admin.admin-dashboard')
@section('content')

   <!DOCTYPE html>
   <html>
   <head>
   	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<title></title>
   	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   </head>
   <body>
    <form action="" method="post">
        @csrf
          <label >Access to Client</label>
          <select class="multiple" class="js-states form-control" name="client[]" multiple>
           @foreach ($clients as $client)
                        <option class="form-control" value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
        <input class="btn btn-primary" type="submit" >
   
       
   </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $(".multiple").select2({
          placeholder: "Select ",
          allowClear: true
      });
    </script>
   </body>
   </html>

@endsection