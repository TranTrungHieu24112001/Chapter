<?php
namespace Vendor\App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

session_start();

class AdminController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('admin')->where("admin_email", "=", $email)->where("admin_password", "=", $password)->first();
        if ($result == true) {
            Session::put('admin_email', $result->admin_email);
            return Redirect::to('/dashboard');
        }
        else {
            Session::put('message', 'Nhập sai thông tin, mời nhập lại');
            return Redirect::to('/admin');
        }
    }
}
?>