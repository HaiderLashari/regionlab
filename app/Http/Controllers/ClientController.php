<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use App\User;
use App\Client;
use Auth;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use App\Exports\Client2;
use Maatwebsite\Excel\Facades\Excel;
class ClientController extends Controller
{
    public function index()
    {
        return view('admin.client-add');
    }


    public function display()
    {
        $finds = auth::user();
        $finds = $finds->clients()->get();   
        $clients = Client::with('users')->get();
        $users = User::where('id', '!=', auth()->user()->id)->where('role', 'user')->get();
        $client = Client::with('users')->get();
        // $firstassign = $client->users()->pluck('users.id')->toArray();
        
        return view('admin.client-display', ['clients' => $clients,'users' => $users ,'finds'=>$finds]);
    }
    public function display2(Request $request)
    {
        $finds = auth::user();
        $finds = $finds->clients()->get();  

        // dd($request->all());
        if($request->country == null && $request->status == null && $request->date == null && $request->company == null){
            $clients = Client::with('users')->get();
        }elseif($request->country != null && $request->status == null && $request->date == null && $request->company == null){
            $clients = Client::with('users')->where('country_of_residence', $request->country)->get();
        }elseif($request->country == null && $request->status != null && $request->date == null && $request->company == null){
            $clients = Client::with('users')->where('status', $request->status)->get();
        }elseif ($request->country != null && $request->status != null && $request->company == null && $request->date == null) {
            $clients = Client::with('users')->where('status', $request->status)->where('country_of_residence', $request->country)->get();
        }elseif($request->country == null && $request->status == null && $request->date != null && $request->company == null){
            $clients = Client::with('users')->whereDate('created_at', '=', $request->date)->get();
        }elseif($request->country != null && $request->status == null && $request->date != null && $request->company == null){
            $clients = Client::with('users')->whereDate('created_at', '=', $request->date)->where('country_of_residence', $request->country)->get();
        }elseif($request->country == null && $request->status != null && $request->date != null && $request->company == null){
            $clients = Client::with('users')->whereDate('created_at', '=', $request->date)->where('status', $request->status)->get();
        }elseif($request->country != null && $request->status != null && $request->date != null && $request->company == null){
            $clients = Client::with('users')->whereDate('created_at', '=', $request->date)->where('status', $request->status)->where('country_of_residence', $request->country)->get();
        }elseif($request->country != null && $request->status != null && $request->date != null && $request->company != null){
            $clients = Client::with('users')->whereDate('created_at', '=', $request->date)->where('status', $request->status)->where('country_of_residence', $request->country)->where('company', $request->company)->get();
        }elseif($request->country == null && $request->status == null && $request->date == null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->get();
        }elseif($request->country == null && $request->status != null && $request->date == null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->where('status', $request->status)->get();
        }elseif($request->country != null && $request->status == null && $request->date == null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->where('country_of_residence', $request->country)->get();
        }elseif($request->country == null && $request->status == null && $request->date != null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->whereDate('created_at', $request->date)->get();
        }elseif($request->country == null && $request->status != null && $request->date != null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->where('status', '=', $request->status)->whereDate('created_at', $request->date)->get();
        }elseif($request->country != null && $request->status == null && $request->date != null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->where('country_of_residence', '=', $request->country)->whereDate('created_at', $request->date)->get();
        }elseif($request->country != null && $request->status != null && $request->date == null && $request->company != null){
            $clients = Client::with('users')->where('company', '=', $request->company)->where('country_of_residence', '=', $request->country)->where('status', $request->status)->get();
        }
        $all = [];
        $all = $request->all();
        unset($all['_token']);
        // dd($all);
        $users = User::where('id', '!=', auth()->user()->id)->where('role', 'user')->get();
        $client = Client::with('users')->get();
        // $firstassign = $client->users()->pluck('users.id')->toArray();
        
        return view('admin.client-display', ['clients' => $clients,'users' => $users ,'finds'=>$finds, 'all' => $all]);
    }
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
         'new' => 'nullable',
         'lead_id' => 'required',
         'status' => 'nullable',
         'time_of_cell' => 'required',
         'person_responsible' => 'required',
         'name' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'address' => 'nullable',
         'company' => 'required',
         'position' => 'required',
         'comment' => 'nullable',
         'type' => 'nullable',
         'other_email' => 'nullable|email',
         'other_phone' => 'nullable',
         'country_of_residence' => 'required',
         'nationality' => 'nullable',
         'addtional_detail'=>'nullable',

     ]);
        $client = new Client;
        $client->new = $request->new;
        $client->lead_id = $request->lead_id;
        $client->status = $request->status;
        $client->name = $request->name;
        $client->time_of_cell = $request->time_of_cell;
        $client->person_responsible = $request->person_responsible;
        $client->comment = $request->comment;
        $client->type = $request->type;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->company = $request->company;
        $client->position = $request->position;
        $client->other_email = $request->other_email;
        $client->other_phone = $request->other_phone;
        $client->country_of_residence = $request->country_of_residence;
        $client->nationality = $request->nationality;
        $client->save();

        return redirect()->route('client.display');
    }
    public function export()
    {
        // $ids = [1, 2, 3]; // Replace with the IDs you want to export
    return Excel::download(new Client2, 'filename.csv');
    }
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client-edit', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
// dd($request->all());
// $request->validate([
//     'lead_id' => 'required|unique:clients,lead_id,' . $id,
//     'status' => 'nullable',
//     'name' => 'required',
//     'email' => 'required|unique:clients,email,' . $id,
//     'phone' => 'required',
//     'address' => 'required',
//     'company' => 'required',
//     'position' => 'required',
//     'other_email' => 'nullable|email',
//     'other_phone' => 'nullable',
//     'country_of_residence' => 'required',
//     'nationality' => 'required',
// ]);

        $client = Client::find($id);
        $data = $request->all();
        unset($data['_token']);
        $client->update($data);
        return redirect()->route('client.display');
    }

    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('client.display');
    }

    public function clientProfile($id) {

        $client = Client::findOrFail($id); 

        return view('admin.client_profile', ['client' => $client]);
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = $file->storeAs('uploads', $file->getClientOriginalName(), 'public'); 
            $url = url('storage/app/public/'.$path);

            $filePath = storage_path('app/public/'.$path);
            if (!file_exists($filePath) || !is_readable($filePath)) {
                return false; 
            }

            $delimiter = ',';
            $header = null;
            $data = array();
            $addtionl = array();
            if (($handle = fopen($filePath, 'r')) !== false) {
                while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
                    if (!$header) {
                        $header = $row;
                    } else {
                        if (count($header) === count($row)) {
                            $data[] = array_combine($header, $row);

                        } else {


                        }
                    }
                }
                fclose($handle);
            }
            foreach ($data as $value) {
               $keysToRemove = ['Person Responsible', 'Status', 'Name', 'Position', 'Time of Call', 'Work Phone', 'Country', 'Other Phone Number', 'Work E-mail', 'Other E-mail', 'Company Name', 'Comments', 'Lead ID'];
               $filteredData = array_diff_key($value, array_flip($keysToRemove));

               if(empty($filteredData)){
                $additional = null;
            }
            else{
               $additional = json_encode($filteredData,true);
           }
           $value['addtional_detail'] = $additional;

           $fb = $value;
           $col = [
            'person_responsible' => $fb['Person Responsible'],
            'status' => $fb['Status'],
            'name' => $fb['Name'],
            'position' => $fb['Position'],
            'time_of_cell' => $fb['Time of Call'],
            'phone' => $fb['Work Phone'],
            'country_of_residence' => $fb['Country'],
            'other_phone' => $fb['Other Phone Number'],
            'email' => $fb['Work E-mail'],
            'other_email' => $fb['Other E-mail'],
            'company' => $fb['Company Name'],
            'comment' => $fb['Comments'],
            'lead_id' => $fb['Lead ID'],
        ];
        $col['addtional_detail'] = $additional;

        $check = $col['email'];
        $checkemail = Client::where('email',$check)->first();
        if($checkemail == null){

            $obj = new Client;
            $obj->create($col);

        }else{

           echo "<script>alert('Email is already exist');</script>";
       }     
   }
   return redirect()->route('client.display');
}
}


public function show()
{

    return  view('admin.client-display');
}


public function showUserAccessForm()
{   

    $id = Auth::user()->id;
    $users = User::where('id', '!=', $id)->get();
    return redirect()->route('client.display', ['users' => $users]);
}

    // public function saveUserAccess(Request $request,$id)
    // {
    //     $client = Client::find($id);
    //     foreach ($request->user_id as $id) {
    //         $client->users()->attach($id);
    //     }
    //     return redirect()->route('client.display'); 
    // }


public function saveUserAccess(Request $request, $id)
{
    $client = Client::find($id);
    $requestedUsers = $request->user_id;

    $firstassign = $client->users()->pluck('users.id')->toArray();

    $detachusers = array_diff($firstassign, $requestedUsers);
    foreach ($detachusers as $userId) {
        $client->users()->detach($userId);
    }

    $attachusers = array_diff($requestedUsers, $firstassign);
    foreach ($attachusers as $userId) {
        $client->users()->attach($userId);
    }
    
    return redirect()->route('client.display');
}


public function addcomment(Request $request,$id)
{
   $client = Client::find($id);

   $selection = $request->input('selection');

   if ($selection == 'comment') {
    $data = [
        'comment' => $request->input('comment'),
        'type' => $request->input('selection')
    ];


} elseif ($selection == 'file') {

    $file = $request->file('file');
    $filePath = $file->store('/uploads', 'public');
    $url = url('storage/app/public/'.$filePath);

    $data = [
        'comment' => $url,
        'type' => $request->input('selection')
    ];

}
if ($selection == 'comment') {
    $data = [
        'comment' => $request->input('comment'),
        'type' => $request->input('selection')
    ];
    $client->comment =$request->comment;
    $client->type =$request->selection;
    $client->save();
} 
elseif ($selection == 'file') {

    $file = $request->file('file');
    $filePath = $file->store('/uploads', 'public');
    $url = url('storage/app/public/'.$filePath);

    $data = [
       'comment' => $url,
       'type' => $request->input('selection')
   ];
   $client->comment =$url;
   $client->type =$request->selection;
   $client->save();

}  

return redirect()->route('client.display'); 


}
public function viewcomment($id){

    $client = Client::findOrFail($id); 

    return view('admin.view_comment',['client' => $client]);

}


}



// public function display()
// {
//     $finds = auth()->user();
//     $clients = $finds->clients()->get();
//     $users = User::where('id', '!=', $finds->id)->get();

//     $clientAssignments = [];
//     foreach ($clients as $client) {
//         $firstassign = $client->users()->pluck('users.id')->toArray();
//         $clientAssignments[$client->id] = $firstassign;
//     }

//     return view('admin.client-display', [
//         'clients' => $clients,
//         'users' => $users,
//         'finds' => $finds,
//         'clientAssignments' => $clientAssignments,
//     ]);
// }


// foreach ($data as $row) {
//     // ... your existing code ...

//     // Check if the email already exists in the database
//     $existingClient = Client::where('email', $row['Work E-mail'])->first();
//     if ($existingClient) {
//         return redirect()->back()->withErrors(['file' => 'Email ' . $row['Work E-mail'] . ' already exists']);
//     }

//     $obj = new Client;
//     $obj->create($col);
// }