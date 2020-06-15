<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function login()
    {
        $data= [];
        if(auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = auth()->user();
            $data['status'] = true;
            $data['token'] =  $user->createToken('Breakpoin Appliction')->accessToken;
            $data['loginData'] = $user;
            return response()->json($data, 200);
        }
        else {
            $data['status'] = false;
            $data['message'] = 'Unauthorized';
            return response()->json($data, 401);
        }
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validator->fails()){
            return response()->json(['status' => false , 'message' => $validator->errors()->all()], 400);
        }
        $user = \App\User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);
        \App\Beneficiary::create([
            'user_id' => $user->id,
            'nama_penerima' => $user->name,
        ]);
        $user->assignRole('beneficiary');
        return response()->json(['status' => true , 'message' => 'Anda berhasil mendaftar sebagai calon penerima bantuan, silahkan login sekarang']);
    }
}
