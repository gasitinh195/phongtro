<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\User;
use App\Http\Requests\Userrequest;
use Hash;
use Auth;

class UserController extends Controller {

    public function getAdd(){
       $user=user::select('id','username','email','level')->get()->toArray();
        return view('admin.user.add');
    }
    public function postAdd(Userrequest $userRequest){  
        $user = new user();
        $user->username = $userRequest->txtUser;
        $user->password = Hash::make($userRequest->txtPass);
        $user->email = $userRequest->txtEmail;
        $user->level = $userRequest->rdoLevel;
        $user->remember_token = $userRequest->_token;
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_messages'=>'Add user successfull']);    
    }
    public function getList(){
        $data=user::select('id','username','password','email','level')->get()->toArray();
        return view('admin.user.list',compact('data'));
    }

    public function getDelete($id) {
        $user_current_login = Auth::user()->id;
        $user= user::find($id);
        if ($id == 4 || ($user_current_login != 4 && $user["level"]==1)) {
            return redirect()->route('admin.user.getList')->with(['flash_level'=>'danger','flash_messages'=>'Use can not access delete user']); 
        }
        else {
            $user->delete($id);
            return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_messages'=>'Delete user successfull']); 
        }
    }
}
