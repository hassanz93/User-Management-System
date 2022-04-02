<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{

    function show()
    {
        $data = User::where('id', '!=', auth()->id())->get();
        
        return view('successlogin', [
            'users' => $data
        ]);
    }

    function delete_function($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/login_success');
    }

    function edit($id)
    {
        $data = DB::select('select * from users where id = ?',[$id]);
        return view('successlogin', [
            'users' => $data
        ]);
    }

    function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
    
}