<?php


namespace App\Http\Controllers;


use App\Comment;
use App\Post;
use App\User;
use App\VoteComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SettingsController extends Controller
{
    
    public function show(Request $request, User $username) {
        return view('user_settings', ['user' => $username]);
    }

    public function update_password(Request $request)
    {
        $attributes = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:5|required_with:newpasswordrepeat|same:newpasswordrepeat',
            'newpasswordrepeat' => 'required|min:5'
        ]);
      
       $usr = Auth::user()->addUpdatePassword($attributes);
       if($usr == true){
       }
    }
    
}

?>