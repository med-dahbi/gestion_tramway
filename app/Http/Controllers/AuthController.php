<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTExceptions;



class AuthController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User;
    }
    public function register(Request $req)
    {
        /* $validator = Validator::make($req->all(),

     [
          'cin'=>'required'|'string',
          'password'=>'required'|'string',
          'nom'=>'required'|'string',
          'prenom'=>'required'|'string',
          'type'=>'required'|'string',
      ]);

      if ($validator->fails()) {
          return response()->json([
              "success"=>false,
              'message'=>$validator->messages()->toArray(),
          ],400);
      }*/

        $check_cin = $this->user->where("cin", $req->cin)->count();
        if ($check_cin > 0) {
            return response()->json([
                'success' => false,
                'message' => 'this cin already exist , please try anather one'
            ], 200);
        }
        $registerComplete = $this->user::create([
            'cin' => $req->cin,
            'password' => Hash::make($req->password),
            'nom' => $req->nom,
            'fonction' => $req->fonction,
        ]);

        if ($registerComplete) {
            $this->login($req);
        }
    }
    public function login(Request $req)
    {
        /* $validator = Validator::make($req->only('cin','password') ,
             [
           'cin'=>'required'|'string',
          'password'=>'required'|'string', 
             ]
             
             );
             if ($validator->fails()) {
                return response()->json([
                    "success"=>false,
                    'message'=>$validator->messages()->toArray(),
                ],400);
         }*/
        $jwt_token = null;
        $input = $req->only("cin", "password");
        if (!$jwt_token = auth('users')->attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'invalid cin or password'
            ]);
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token
        ]);
    }
}
