<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Input;
use Uuid;

class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

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
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $notices = DB::table('notice')->get();

        return view('home',['notices'=>$notices]);
    }

    public function About()
    {
        return view('about');
    }
    public function ViewProfile()
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id',$id)->first();
        return view('profile',['user'=>$user]);
    }
    public function UpdateProfile(Request $request)
    {
        $inputAll = $request->except('_token','id');

        DB::table('users')->where('id',$request->id)->update($inputAll);
        return redirect()->route('profile');
    }

    public function ImageUpload(Request $request)
    {   
        $id = Auth::user()->id;
        if (Input::hasFile('file'))
        {
            $file = Input::file('file');

            $cropedImage = $request->cropedImageContent;
            $pos = strpos($cropedImage, ',');
            $rest = substr($cropedImage,$pos); 
            $data = base64_decode($rest);

            $name = $file->getClientOriginalName();
            $temp = explode('.',$name);
            $extention = array_pop($temp);
            
            $fileName1 = Uuid::generate(1);
            $fileName1 = $fileName1.".".$extention;

            /*$destinationPath = public_path();
            $fileLocation = $destinationPath."/images/users/".$fileName1;
            file_put_contents ($fileLocation,$data);*/
            
            
            $fileLocation = "images/users/".$fileName1;
            file_put_contents ($fileLocation,$data);
            

            $image = array(
                'image' => $fileName1
            );
            DB::table('users')->where('id',$id)->update($image);
           
        }
        return json_encode(array('success' => true, 'message' =>'Your profile picture successfully changed!' ));
    }

    public function Users()
    {
        $users = DB::table('users')->get();

        return view('users',['users'=>$users]);
    }

    public function UserDetails($id)
    {
        $user = DB::table('users')->where('id',$id)->first();
        return view('user_details',['user'=>$user]);
    }
}
