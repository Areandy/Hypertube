<?php

namespace App\Http\Controllers;

use App\User as User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AuthController extends APIBaseController
{

	public function signin(Request $req)
	{
		print_r($req->input());
		return response($req);
	}


	public function signup(Request $req)
	{

		$data   = $req->input();
		$val    = Validator::make($data, [
			'fname'     => 'required|min:2|max:15',
			'lname'     => 'required|min:2|max:15',
			'username'  => 'required|min:5|max:20',
			'email'     => 'required|min:13|max:30',
			'pass1'     => 'required|min:6|max:30',
			'pass2'     => 'required|min:6|max:30'
        ]);

		if ($val->fails())
			return $this->sendError('You have errors', $val->errors());
		else if ($data['pass1'] !== $data['pass2'])
            return $this->sendError("Passwords don't match.");

        $data['password'] = password_hash($data['pass1'], PASSWORD_DEFAULT);

        unset($data['fname']);
        try {
            User::create($data);
        } catch (QueryException $e) {
            return $this->sendError('Error in SQL query');
        }

        $data['validation'] = $val->errors();

        // $user->email    = $data['email'];
        // if (!$user->save())
        //     return $this->sendError('User cant be created');
		return response()->json($data);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
