<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Uuid;

use Illuminate\Http\Request;

class StudentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function StudentView()
	{
		$students = DB::table('students')->get();

		return view('student.view_students',['students'=>$students]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function StudentAddForm()
	{
		return view('student.add_student');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function AddStudent(Request $request)
	{
		$input = $request->except('_token');

		$insertion = DB::table('students')->insertGetid($input);
		if ($insertion) {
			return redirect()->route('student_view');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function StudentDetails($id)
	{
		$studentDetails = DB::table('students')->where('id',$id)->first();

		return view('student.student_details',['studentDetails'=>$studentDetails]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function StudentUpdate(Request $request)
	{
		$inputAll = $request->except('_token','id');

		DB::table('students')->where('id',$request->id)->update($inputAll);
		return redirect()->route('student_view');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function StudentRemove($id)
	{
		DB::table('students')->where('id',$id)->delete();
		return redirect()->route('student_view');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function StudentImageUpload(Request $request)
	{
		$id = $request->student_id;
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

            $destinationPath = public_path();
            $fileLocation = $destinationPath."/images/students/".$fileName1;
    		file_put_contents ($fileLocation,$data);
    		
    		/*
            $fileLocation = "images/students/".$fileName1;
    		file_put_contents ($fileLocation,$data);
    		*/

            $image = array(
                'image' => $fileName1
            );
            DB::table('students')->where('id',$id)->update($image);
           
        }
        return json_encode(array('success' => true, 'message' =>'Your profile picture successfully changed!' ));
	}

}
