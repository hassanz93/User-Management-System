<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
	//Display all users data except for the user logined in
	function show()
	{
		$data = User::where('id', '!=', auth()->id())->get();

		return view('successlogin', [
			'users' => $data
		]);
	}

	//DELETE USING ANOTHER METHOD
	// function delete_function($id)
	// {
	//     $data = User::find($id);
	//     $data->delete();
	//     return redirect('/login_success');
	// }


	//Controller for Editing and Deleteing
	function action(Request $request)
	{
		if ($request->ajax()) {
			if ($request->action == 'edit') {
				$data = array(
					'name'	    =>	$request->name,
					'email'		=>	$request->email,
					'password'	=>	Hash::make($request->password)
				);
				DB::table('users')
					->where('id', $request->id)
					->update($data);
			}
			if ($request->action == 'delete') {
				DB::table('users')
					->where('id', $request->id)
					->delete();
			}
			return response()->json($request);
		}
	}
}
