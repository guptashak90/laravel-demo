<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User;
use Auth;
use Hash;
class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = User::where('id', '!=', Auth::user()->id)->get()->all();
        return view('user.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([

            'name' => ['required','min:5','max:30'],
            'email'=> ['required','unique:users'],
            'password'=> ['required','min:6'],
            'phone'=> ['required','min:8','max:12']

        ]);
        
        $user = new user;

        if($request->hasFile('image')){
            if($user->image != "")
            {
                $file_path = public_path('images/user_images/').$user->image;
                unlink($file_path);
            }
             $fileName = time().'.'.request()->image->getClientOriginalExtension();
             request()->image->move(public_path('images/user_images'), $fileName);
             $user->image =  $fileName;
 
         }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
       
        $user->save();
        return redirect()->to("/usersListing")->with('success',"User Create Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=NULL)
    {
        $user = User::findOrFail($id);
        return view('user.update')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => ['required','min:5','max:50'],
            'email'=> ['required','min:3'],
            'phone'=> ['required','min:10']

        ]);

        $user = User::find($id);

        if($request->hasFile('image')){
            $file_path = public_path('images/user_images/').$user->image;
            if($user->image != "" && file_exists($file_path))
            {
                 unlink($file_path);
            }
             $fileName = time().'.'.request()->image->getClientOriginalExtension();
             request()->image->move(public_path('images/user_images'), $fileName);
             $user->image =  $fileName;
 
         }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        return redirect()->to("/usersListing")->with('success',"Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=NULL)
    {
        $user = User::find($id);
        $file_path = public_path('images/user_images/').$user->image;
        if($user->image != "" && file_exists($file_path))
        {
            unlink($file_path);
        }
        $user->delete();
        return redirect()->to("/usersListing")->with('success',"Deleted Successfully");
    }

    public function changeStatus($id=NULL){

        $user = User::find($id);
        if($user->status){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        return redirect()->to("/usersListing")->with("success","Status change successfully");

    }
}
