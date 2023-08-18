@extends('admin.admin-dashboard') 
@section('content')

<style type="text/css">

*{
	box-sizing:border-box;
}
body{
	background-color:#abd9e9;
	font-family:Arial;
}
#container{
	width:750px;
	height:800px;
	background:#eff3f7;
	margin:0 auto;
	font-size:0;
	border-radius:5px;
	overflow:hidden;
}
aside{
	width:260px;
	height:800px;
	background-color:#3b3e49;
	display:inline-block;
	font-size:15px;
	vertical-align:top;
}
main{
	width:662px;
	height:800px;
	display:inline-block;
	font-size:15px;
	vertical-align:top;
}

aside header{
	padding:30px 20px;
}
aside input{
	width:100%;
	height:50px;
	line-height:50px;
	padding:0 50px 0 20px;
	background-color:#5e616a;
	border:none;
	border-radius:3px;
	color:#fff;
	background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
	background-repeat:no-repeat;
	background-position:170px;
	background-size:40px;
}
aside input::placeholder{
	color:#fff;
}
aside ul{
	padding-left:0;
	margin:0;
	list-style-type:none;
	overflow-y:AUTO;
	height:690px;
}
aside li{
	padding:10px 0;
}
aside li:hover{
	background-color:#5e616a;
}
h2,h3{
	margin:0;
}
aside li img{
	border-radius:50%;
	margin-left:20px;
	margin-right:8px;
}
aside li div{
	display:inline-block;
	vertical-align:top;
	margin-top:12px;
}
aside li h2{
	font-size:14px;
	color:#fff;
	font-weight:normal;
	margin-bottom:5px;
}
aside li h3{
	font-size:12px;
	color:#7e818a;
	font-weight:normal;
}

.status{
	width:8px;
	height:8px;
	border-radius:50%;
	display:inline-block;
	margin-right:7px;
}
.green{
	background-color:#58b666;
}
.orange{
	background-color:#ff725d;
}
.blue{
	background-color:#6fbced;
	margin-right:0;
	margin-left:7px;
}

main header{
	background: #242849;
	height:84px;
	padding:10px 20px 0px 40px;
}
main header > *{
	display:inline-block;
	vertical-align:top;
}
main header img:first-child{
	border-radius:50%;
}
main header img:last-child{
	width:24px;
	margin-top:8px;
}
main header div{
	margin-left:10px;
	margin-right:145px;
}
main header h2{
	font-size:16px;
	margin-bottom:5px;
}
main header h3{
	font-size:14px;
	font-weight:normal;
	color:#7e818a;
}

#chat{
	background: #ffff;
	padding-left:0;
	margin:0;
	list-style-type:none;
	overflow-y:AUTO;
	height:610px;
/*	border:1px solid ;
	border-bottom:2px solid #fff;*/
}
#chat li{
	padding:10px 30px;
}
#chat h2,#chat h3{
	display:inline-block;
	font-size:13px;
	font-weight:normal;
}
#chat h3{
	color:#bbb;
}
#chat .entete{
	margin-bottom:5px;
}
#chat .message{
	padding:20px;
	color:#fff;
	line-height:25px;
	max-width:90%;
	display:inline-block;
	text-align:left;
	border-radius:5px;
}
#chat .me{
	text-align:right;
}
#chat .you .message{
	background-color:#58b666;
	    word-wrap: break-word;
}
#chat .me .message{
	background-color:#6fbced;
	    word-wrap: break-word;
}
#chat .triangle{
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 10px 10px 10px;
}
#chat .you .triangle{
		border-color: transparent transparent #58b666 transparent;
		margin-left:15px;
}
#chat .me .triangle{
		border-color: transparent transparent #6fbced transparent;
		margin-left:375px;
}

main footer{
	background:#242849;
    height: 100px;
    padding: 5px 10px 0px 12px;
}
main footer textarea{
	resize:none;
	border:none;
	display:block;
	width:100%;
	height:60px;
	border-radius:3px;
	padding:20px;
	font-size:13px;
	margin-bottom:13px;
}
main footer textarea::placeholder{
	color:#ddd;
}
main footer img{
	height:30px;
	cursor:pointer;
}
main footer a{
	text-decoration:none;
	text-transform:uppercase;
	font-weight:bold;
	color:#6fbced;
	vertical-align:top;
	margin-left:333px;
	margin-top:5px;
	display:inline-block;
}
.send{
 text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #6fbced;
    vertical-align: top;
  
    display: inline-block;
}

</style>

<div id="container" style="width:85%;">
	<aside>
	
		<ul>
			 @if(Auth::check() && Auth::user()->role == 'admin')
              @foreach($users as $val)
				<a href="{{url('/chatbox/'.$val->id)}}">
			<li style="border-bottom: 1px solid white;">
				<img class="rounded-circle mt-2" width="45px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="">
				<div>
					<h2>{{$val->name}}</h2>
				</div>
			
			</li>
				</a>
			@endforeach
			@elseif(Auth::check() && Auth::user()->role == 'user')
               @foreach($admin as $vel)
		  	<li>
			
                  
				<a href="{{url('/chatbox/'.$vel['id'])}}">
				<img class="rounded-circle mt-2" width="45px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="">
				<div>
					<h2>{{$vel['name']}}</h2>
				</div>

				</a>
			
			</li>
		 @endforeach
			@endif
	
		</ul>
	</aside>
	<main>
    @if(@$user->id)
		
		<header>
		
			<img class="rounded-circle mt-2" width="45px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="">
			
			
				<h2 class="mt-3 text-white ml-3">Chat with  {{$user->name}}</h2>
				
		</header>
	
	
		<ul id="chat">
            @foreach($result as $value)  
            @if($value->sender_id != auth()->user()->id)
			<li class="you">
				<div class="message">
					{{$value->message}}
				</div>
				
				<div class="entete">
					<span class="status green"></span>
					<h2 class="">{{$user->name}}</h2>
					<h3 >{{$value->created_at->format(' h:i:s')}}</h3>
				</div>
			</li>
			
			@else
			<li class="me">
				<div class="message">
					{{$value->message}}
				</div>
				
				<div class="entete">
					<h3 class="">{{$value->created_at->format(' h:i:s')}}</h3>
					<h2 class="">{{ auth()->user()->name }}</h2>
					<span class="status blue"></span>
				</div>
			</li>
			@endif
			@endforeach
		</ul>
		<footer>
		 	<form action = "{{url('/adminmessage/'.@$user->id)}}" method="POST" >
           @csrf
          <div class="container">
          <div class="row" style="margin-top: 20px;">
          <div class="col-md-10 px-0">
 <input type="hidden" name="reciver_id" value="{{@$user->id}}">
			<textarea type= "text" name="message" placeholder="Type your message"></textarea>
          </div>
            <div class="col-md-2" style="margin-top:20px;">
            <input type="submit" class=" send btn" value="send">	
          </div>
          </div>
          </div>
          
          
			</form> 
		</footer>
	  @else
	  <img style="height: 100%;width: 100%;object-fit: cover;"  src="https://cdn.dribbble.com/users/1590794/screenshots/5822231/blank_inbox_email.png">
	  @endif
	</main>
</div>

@endsection


