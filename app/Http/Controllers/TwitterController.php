<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class TwitterController extends Controller
{
    public function loginwithTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
       
    public function cbTwitter()
    {
        try {
     
            $user = Socialite::driver('twitter')->user();
      
            $userWhere = User::where('twitter_id', $user->id)->first();
      
            if($userWhere){
      
                Auth::login($userWhere);
     
                return redirect('/dashboard');
      
            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->twitter_id,
                    'oauth_type'=> 'twitter',
                    'password' => encrypt('admin595959')
                ]);
     
                Auth::login($gitUser);
      
                return redirect('/dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
