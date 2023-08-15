<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\User;
use App\Client;
use App\chatbox;
use Hash;
use Auth;

class HomeController extends Controller
{
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
    $this->middleware('auth');
}

/**
* Show the application dashboard.
*
* @return \Illuminate\Contracts\Support\Renderable
*/
public function index()
{
    return view('admin.admin-dashboard');
}

public function show()
{
    return view('admin.registration');
}
public function display()
{    

    $finds =auth::user();
    
    $finds = $finds->clients()->get(); 

    $users = User::all();
    $clients = Client::all();
    return view('admin.user_display', ['users' => $users, 'clients' => $clients,'finds'=>$finds]);
}


public function create(Request $request)
{
          $validator =  $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role'=>'required',
            'password' => 'required|min:8'
        ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->save();

    return redirect()->route('user.display');
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.user_edit', ['user' => $user]);
}

public function update(Request $request, $id)
{
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->save();

    return redirect()->route('user.display');
}

public function destroy($id)
{
    User::destroy($id);

    return redirect()->route('user.display');
}



public function showClientAccessForm()
{
    $clients = Client::all();
    return redirect()->route('user.display',['clients' => $clients]); 
}

public function saveClientAccess(Request $request,$id)
{   

    $user = User::find($id);

    foreach ($request->client_id as $id) {

        $user->clients()->attach($id);
    }
    $show = $user->clients()->get();

    return redirect()->route('user.display'); 
}   

public function chatbox($id=null)
{
    $user = User::find($id);
    $id = Auth::user()->id;
    $users = User::where('id', '!=', $id)->get();

    $chatbox= chatbox::where('reciver_id',@$user->id)->where('sender_id', auth()->user()->id)->get();
    $chatrecive= chatbox::where('reciver_id',auth()->user()->id)->where('sender_id',@$user->id)->get();
    $result=$chatbox->merge($chatrecive);
    $result = $result->sortBy('created_at');

    $admin = User::where('role', 'admin')->get()->toArray();
    
    return view('admin.chatbox',['user' => $user,'users' => $users,'chatbox'=>$chatbox,'result'=>$result ,'admin' => $admin ,'chatrecive' => $chatrecive]);
}

public function adminmessage(Request $request,$id)
{

    $chatbox = new chatbox;
    $chatbox->message =$request->message;
    $chatbox->sender_id = Auth::user()->id;
    $chatbox->reciver_id = $request->input('reciver_id');
    $chatbox->save();

    return redirect()->back();
}

}



    //dd( $chatrecive);
    // dd(auth()->user()->name);
    // dd(@$user->id, auth()->user()->id,$chatbox->toArray());