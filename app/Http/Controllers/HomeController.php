<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Auth;
use Hash;
use App\User;
use App\Category;
use App\SubCategory;

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
        $admin_id = Auth::user()->id;

        $usersCount = User::all()->count();
        $latestUsers = User::all()->take(5);

        $categoryCount = Category::all()->count();
        $latestCategory = Category::orderBy('id','desc')->take(5)->get();

        $subCategoryCount = SubCategory::all()->count();
        $latestSubCategory = SubCategory::orderBy('id','desc')->take(5)->get();
       
        return view('home')->with(compact('usersCount', 'latestUsers','categoryCount','latestCategory','subCategoryCount','latestSubCategory'));
    }

     /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile')->with('user',$user);
    }

    public function updateProfile(Request $request){
        
        $user = User::find(Auth::id());
        $request->validate([

            'name' => ['required','min:5','max:30'],
            'phone'=> ['required','min:8','max:12']

        ]);
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
        $user->phone = $request->phone;
        if($user->save()){
            return redirect()->to('/profile')->with('success','Profile Updated Successfully');
        }
    }

    public function changePassword(Request $request){
        
        $request->validate([
            'current_password' => ['required'],
            'new_password'=> 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password'=> ['required','min:6'],
 
        ]);
 
        $request_data = $request->All();
        $old_password = Auth::user()->password;
        if(Hash::check($request_data['current_password'], $old_password))
        {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request_data['new_password']);;
            if($user->save()){
                return redirect()->to('/profile')->with('success','Password changed Successfully');
            }
        }
        else{
            return redirect()->to('/profile')->with('failed','Current Password Doesnot Match');
        }
    }
}
