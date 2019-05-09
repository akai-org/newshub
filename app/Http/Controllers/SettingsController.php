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

       return redirect()->back()->with('passwordupdate', 'Pomyślnie zaaktualizowano hasło!');
       
       
    }
    
    public function update_socials(Request $request){
        $attributes = $request->validate([
            'github' => 'nullable|url|min:5|max:90',
            'facebook' => 'nullable|url|min:5|max:90',
            'twitter' => 'nullable|url|min:5|max:90',
            'stackoverflow' => 'nullable|url|min:5|max:90' 
     ]);
     $user_id = Auth::user()->user_id;
     $usr = Auth::user()->updateSocials($attributes, $user_id);
     if($usr == true);
     return redirect()->back()->with('socials', 'Pomyślnie zaaktualizowano linki społeczności!');
    }


    public function update_userdata(Request $request){
        $attributes = $request->validate([
               'name' => 'required|min:3|max:20',
               'surname' => 'nullable|min:3|max:20',
               'email' => 'required|min:4',
               'desc' => 'nullable|min:3' 
        ]);
        $user_id = Auth::user()->user_id;
        $usr = Auth::user()->updateData($attributes, $user_id);
        if($usr == true);
        return redirect()->back()->with('userdata', 'Pomyślnie zaaktualizowano twoje dane!');
        
    }


}

?>