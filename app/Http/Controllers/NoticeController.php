<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NoticeController extends Controller
{
	public function ViewNotice()
	{
		$notices = DB::table('notice')->get();

		return view('notice_view',['notices'=>$notices]);
	}

	public function NoticeForm()
	{
		return view('notice_form');
	}
	public function AddNotice(Request $request)
	{
		$input = $request->except('_token');
		//$body = DB::mysqli_real_DB::DB::($request->body);
		//$input['body'] = $body;

		$insertion = DB::table('notice')->insertGetid($input);
		if ($insertion) {
			return redirect()->route('notice_view');
		}

	}

	public function NoticeRemove($id)
	{
		DB::table('notice')->where('id',$id)->delete();
		return redirect()->route('notice_view');
	}

}
