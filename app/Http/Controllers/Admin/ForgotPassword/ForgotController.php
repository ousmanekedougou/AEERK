<?php

namespace App\Http\Controllers\Admin\ForgotPassword;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Notifications\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class ForgotController extends Controller
{
    public function reset(){
        return view('admin.auth.passwords.email');
    }

    public function verify(Request $request){
        $validator = $this->validate($request , [
            'email' => 'required|email',
        ]);

        $admin_email = Admin::where('email',$request->email)->first();

        if ($admin_email) {
            $admin_email->notify(new ForgotPassword());
            return back()->with('message','Un email vous a ete envoyer merci de verifier');
        }else {
            return back()->with('error_email','Cet adresse email n\' existe');
        }
    }

    public function confirm($id,$email){
        $admin_confirm = Admin::where('id',$id)->where('email',$email)->first();
        $token= str_replace('/','',Hash::make(Str::random(40)));
        if($admin_confirm){
            return view('admin.auth.passwords.reset',compact('admin_confirm','token'));
        }
    }

    public function update(Request $request ,$id,$email,$token){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|string|confirmed',
        ]);
        if ($request->token == $token) {

            $update_admin_email = Admin::where('id',$id)->where('email',$email)->first();
            
            if ($update_admin_email) {
                $update_admin_email->update(['password' => Hash::make($request->password)]);
                return redirect()->route('admin.admin.login')->with('message','Votre mot de passe a ete modifier avec success,veuillez vous connecter a nouveu');
            }else {
                return back()->with('error_email','Adress email ou mot de passe non valide');
            }
        }
        return back()->with('error_email','Cette requette semble plus valide');

    }
}
