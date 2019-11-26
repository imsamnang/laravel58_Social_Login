<?php

namespace App\Http\Controllers;

use App\SocialSetting;
use Auth;
use Illuminate\Http\Request;

class SocialSettingController extends Controller
{
	private $id = 1;

	public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
	}
	
	public function editSocial()
	{
		$id = $this->getId();
		$social = SocialSetting::findOrFail($id);
		return view('social.social',compact('social'));
	}

  public function updateSocial(Request $request)
  {
		// return $request->all();
    $id = $this->getId();
    $social = SocialSetting::find($id);
    if (!empty($social)) {      
      $social->facebook_client_id       = $request->login_facebook_client_id;
      $social->facebook_client_secret   = $request->login_facebook_client_secret;
      $social->facebook_client_status   = $request->login_facebook_status;
        
      $social->twitter_client_id        = $request->login_twitter_client_id;
      $social->twitter_client_secret    = $request->login_twitter_client_secret;
      $social->twitter_client_status    = $request->login_twitter_status;
      
      $social->google_client_id         = $request->login_google_client_id;
      $social->google_client_secret     = $request->login_google_client_secret;
      $social->google_client_status     = $request->login_google_status;
      
      $social->linkedin_client_id       = $request->login_linkedin_client_id;
      $social->linkedin_client_secret   = $request->login_linkedin_client_secret;
      $social->linkedin_client_status   = $request->login_linkedin_status;
      
      $social->github_client_status     = $request->login_github_status;
      $social->github_client_id         = $request->login_github_client_id;
      $social->github_client_secret     = $request->login_github_client_secret;
      
      $social->bitbucket_client_id      = $request->login_bitbucket_client_id;
      $social->bitbucket_client_secret  = $request->login_bitbucket_client_secret;
      $social->bitbucket_client_status  = $request->login_bitbucket_status;
      
      $social->nocaptcha_secret         = $request->nocaptcha_secret;
      $social->nocaptcha_sitekey        = $request->nocaptcha_sitekey;
      $social->nocaptcha_status         = $request->nocaptcha_status;

      // $social->updated_by = 1;
      $social->save();
        // Update .env file
        $env_update = $this->changeEnv([					
					'FACEBOOK_STATUS'         => $request->login_facebook_status,
					'FACEBOOK_CLIENT_ID'      => $request->login_facebook_client_id,
					'FACEBOOK_CLIENT_SECRET'  => $request->login_facebook_client_secret,
					
					'GOOGLE_STATUS'           => $request->login_google_status,
					'GOOGLE_CLIENT_ID'        => $request->login_google_client_id,
					'GOOGLE_CLIENT_SECRET'    => $request->login_google_client_secret,
					
					'GITHUB_STATUS'           => $request->login_github_status,
					'GITHUB_CLIENT_ID'        => $request->login_github_client_id,
					'GITHUB_CLIENT_SECRET'    => $request->login_github_client_secret,
					
					'LINKEDIN_STATUS'         => $request->login_linkedin_status,
					'LINKEDIN_CLIENT_ID'      => $request->login_linkedin_client_id,
					'LINKEDIN_CLIENT_SECRET'  => $request->login_linkedin_client_secret,
					
					'TWITTER_STATUS'          => $request->login_twitter_status,
					'TWITTER_CLIENT_ID'       => $request->login_twitter_client_id,
					'TWITTER_CLIENT_SECRET'   => $request->login_twitter_client_secret,						
					
					'BITBUCKET_STATUS'        => $request->login_bitbucket_status,
					'BITBUCKET_CLIENT_ID'     => $request->login_bitbucket_client_id,
					'BITBUCKET_CLIENT_SECRET' => $request->login_bitbucket_client_secret,

					'NOCAPTCHA_STATUS'        => $request->nocaptcha_status,
					'NOCAPTCHA_SECRET'        => $request->nocaptcha_secret,
					'NOCAPTCHA_SITEKEY'       => $request->nocaptcha_sitekey
					]);
					return redirect()->action('SocialSettingController@editSocial')
					->with('doneMessage', trans('backLang.saveDone'))
					->with('active_tab', $request->active_tab);
				} else {
        return redirect()->route('front');
    }
  }

  public function changeEnv($data = array())
  {
    if(count($data) > 0){
        // Read .env-file
        $env = file_get_contents(base_path() . '/.env');
        // Split string on every " " and write into array
        $env = preg_split('/\s+/', $env);;
        // Loop through given data
        foreach((array)$data as $key => $value){
            // Loop through .env-data
            foreach($env as $env_key => $env_value){
                // Turn the value into an array and stop after the first split
                // So it's not possible to split e.g. the App-Key by accident
                $entry = explode("=", $env_value, 2);
                // Check, if new key fits the actual .env-key
                if($entry[0] == $key){
                    // If yes, overwrite it with the new one
                    $env[$env_key] = $key . "=" . $value;
                } else {
                    // If not, keep the old one
                    $env[$env_key] = $env_value;
                }
            }
        }
        // Turn the array back to an String
        $env = implode("\n", $env);
        // And overwrite the .env with the new data
        file_put_contents(base_path() . '/.env', $env);
        return true;
    } else {
        return false;
    }
  }
}
