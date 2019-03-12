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
        $user_id = Auth::user()->user_id;
       $usr = Auth::user()->UpdatePassword($attributes, $user_id);
       if($usr == true);

       return redirect()->back();
       
       
    }
    
    public function update_userdata(Request $request){
        $attributes = $request->validate([
               'name' => 'required|min:3|max:20',
               'surname' => 'required|min:3|max:20',
               'email' => 'required|min:4',
               'desc' => 'required|min:3' 
        ]);
        $user_id = Auth::user()->user_id;
        $usr = Auth::user()->updateData($attributes, $user_id);
        if($usr == true);
        return redirect()->back();
        
    }


}

?>