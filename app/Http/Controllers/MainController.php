<?php
#WEB
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Session;

class MainController extends Controller
{

  public function main_web(Request $request,$token){    
        if (Session::get('loginConfirmed')=='True') {
            
        
            
            return view('main',['token'=>$token]);
        }

        return redirect('login');

    }

    public function login_web(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
            
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        Session::put('loginConfirmed', 'True' );
        return $this->main_web($request,$token);
    }
  
    public function register_web(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100|regex:"[A-Za-z1-9]+"',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
        
        Session::put('registerConfirmed', 'True' );
        return redirect('login');
    }


}
