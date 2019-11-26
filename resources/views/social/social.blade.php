@extends('layouts.app')

@push('css')

@endpush

@section('content')
  <div class="container">
    <div class="row">
      <form action="{{ route('social.update') }}" method="POST">
        <button type="submit" class="btn btn-primary">Save Settings</button>
        {{ csrf_field() }}
        {{ method_field('PUT  ') }}
        {{-- Social Settings --}}
        <div class="p-a-md col-md-12">
        {{-- Login with Facebook --}}
          <div class="row m-t-3">
            <div class="form-group col-md-12">
              <label><h6>Login with Facebook
                <a target="_blank" href="https://developers.facebook.com/apps">
                  <i class="material-icons"></i>
                </a>
              </h6></label>
              <div class="radio">
                <div>
                  <label class="ui-check ui-check-md">
                    <input id="login_facebook_status2" class="has-value" name="login_facebook_status" type="radio" 
                    value="0" {{$social->facebook_client_status?'':'checked'}}><i class="dark-white"></i> Not Active
                  </label>
                </div>
                <div style="margin-top: 5px;">
                  <label class="ui-check ui-check-md">
                    <input id="login_facebook_status1" class="has-value" name="login_facebook_status" type="radio" 
                    value="1" value="{{$social->facebook_client_status}}" {{$social->facebook_client_status?'checked':''}}>
                    <i class="dark-white"></i>
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8" id="facebook_ids_div" style="display: {{$social->facebook_client_status?'block':'none'}}">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">App ID</label>
                <div class="col-sm-10">
                <input placeholder="" class="form-control has-value" dir="ltr" name="login_facebook_client_id" type="text" value="{{$social->facebook_client_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">App Secret</label>
                <div class="col-sm-10">
                <input placeholder="" class="form-control has-value" dir="ltr" name="login_facebook_client_secret" type="text" value="{{$social->facebook_client_secret}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">
                  <small>Callback URL</small>
                </label>
                <div class="col-sm-10">
                  <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_facebook_callbackURL" type="text" 
                  value="{!!config('app.url') . '/oauth/facebook/callback'!!}">
                </div>
              </div>
            </div>
          </div>
        {{-- Login with Twitter --}}
          <div class="row m-t-2">
            <div class="form-group col-md-12">
              <label><h6>Login with Twitter
              <a target="_blank" href="https://apps.twitter.com">
                <i class="material-icons"></i>
              </a></h6></label>
              <div class="radio">
                <div>
                  <label class="ui-check ui-check-md">
                    <input id="login_twitter_status2" class="has-value" name="login_twitter_status" type="radio" 
                    value="0" {{$social->twitter_client_status?'':'checked'}}>
                    <i class="dark-white"></i>
                    Not Active
                  </label>
                </div>
                <div style="margin-top: 5px;">
                  <label class="ui-check ui-check-md">
                    <input id="login_twitter_status1" class="has-value" name="login_twitter_status" type="radio" 
                    value="1" {{$social->twitter_client_status?'checked':''}}>
                    <i class="dark-white"></i>
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8" id="twitter_ids_div" style="display: {{$social->twitter_client_status?'block':'none'}}">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">API Key</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_twitter_client_id" type="text" 
                  value="{{$social->twitter_clident_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">API Secret</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_twitter_client_secret" type="text" 
                  value="{{$social->twitter_clident_secret}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">
                  <small>Callback URL</small>
                </label>
                <div class="col-sm-10">
                  <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_twitter_callbackURL" type="text" 
                  value="{!!config('app.url') . '/oauth/twitter/callback'!!}">
                </div>
              </div>
            </div>
          </div>
        {{-- Login with Google --}}
          <div class="row m-t-2">
            <div class="form-group col-md-12">
              <label><h6>Login with Google
              <a target="_blank" href="https://developers.google.com/identity/sign-in/web/sign-in">
                <i class="material-icons"></i>
              </a></h6></label>
              <div class="radio">
                <div>
                  <label class="ui-check ui-check-md">
                    <input id="login_google_status2" class="has-value" name="login_google_status" type="radio" 
                    value="0" {{$social->google_client_status?'':'checked'}}>
                    <i class="dark-white"></i>
                    Not Active
                  </label>
                </div>
                <div style="margin-top: 5px;">
                  <label class="ui-check ui-check-md">
                    <input id="login_google_status1" class="has-value" name="login_google_status" type="radio" 
                    value="1" {{$social->google_client_status?'checked':''}}>
                    <i class="dark-white"></i>
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8" id="google_ids_div" style="display: {{$social->google_client_status?'block':'none'}}">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Client ID</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_google_client_id" type="text" 
                  value="{{$social->google_client_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Client Secret</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_google_client_secret" type="text" 
                  value="{{$social->google_client_secret}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">
                  <small>Callback URL</small>
                </label>
                <div class="col-sm-10">
                  <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_google_callbackURL" type="text" 
                  value="{!!config('app.url') . '/oauth/google/callback'!!}">
                </div>
              </div>
            </div>
          </div>
        {{-- Login with LinkedIn --}}
          <div class="row m-t-2">
            <div class="form-group col-md-12">
              <label><h6>Login with LinkedIn
              <a target="_blank" href="https://www.linkedin.com/developer/apps/">
                <i class="material-icons"></i>
              </a></h6></label>
              <div class="radio">
                <div>
                  <label class="ui-check ui-check-md">
                    <input id="login_linkedin_status2" class="has-value" name="login_linkedin_status" type="radio" 
                    value="0" {{$social->twitter_client_status?'':'checked'}}>
                    <i class="dark-white"></i>
                    Not Active
                  </label>
                </div>
                <div style="margin-top: 5px;">
                  <label class="ui-check ui-check-md">
                    <input id="login_linkedin_status1" class="has-value" name="login_linkedin_status" type="radio" 
                    value="1" {{$social->twitter_client_status?'checked':''}}>
                    <i class="dark-white"></i>
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8" id="linkedin_ids_div" style="display: {{$social->linkedin_client_status?'block':'none'}}">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Client ID</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_linkedin_client_id" type="text" 
                  value="{{$social->linkedin_clident_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Client Secret</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_linkedin_client_secret" type="text" 
                  value="{{$social->linkedin_clident_secret}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">
                  <small>Callback URL</small>
                </label>
                <div class="col-sm-10">
                  <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_linkedin_callbackURL" type="text" value="{!!config('app.url') . '/oauth/linkedin/callback'!!}">
                </div>
              </div>
            </div>
          </div>
        {{-- Login with GitHub   --}}
          <div class="row m-t-2">
            <div class="form-group col-md-12">
              <label><h6>Login with GitHub
              <a target="_blank" href="https://github.com/settings/developers">
                <i class="material-icons"></i>
              </a></h6></label>
              <div class="radio">
                <div>
                  <label class="ui-check ui-check-md">
                    <input id="login_github_status2" class="has-value" name="login_github_status" type="radio" 
                    value="0" {{$social->twitter_client_status?'':'checked'}}>
                    <i class="dark-white"></i>
                    Not Active
                  </label>
                </div>
                <div style="margin-top: 5px;">
                  <label class="ui-check ui-check-md">
                    <input id="login_github_status1" class="has-value" name="login_github_status" type="radio" 
                    value="1" {{$social->twitter_client_status?'checked':''}}>
                    <i class="dark-white"></i>
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8" id="github_ids_div" style="display: {{$social->github_client_status?'block':'none'}}">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Client ID</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_github_client_id" type="text" 
                  value="{{$social->github_client_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Client Secret</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_github_client_secret" type="text" 
                  value="{{$social->github_client_secret}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">
                  <small>Callback URL</small>
                </label>
                <div class="col-sm-10">
                  <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_github_callbackURL" type="text" 
                  value="{!!config('app.url') . '/oauth/github/callback'!!}">
                </div>
              </div>
            </div>
          </div>
        {{-- Login with Bitbucket   --}}
          <div class="row m-t-2">
            <div class="form-group col-md-23">
              <label><h6>Login with Bitbucket
              <a target="_blank" href="https://bitbucket.org/account">
                <i class="material-icons"></i>
              </a></h6></label>
              <div class="radio">
                <div>
                  <label class="ui-check ui-check-md">
                    <input id="login_bitbucket_status2" class="has-value" name="login_bitbucket_status" type="radio" 
                    value="0" {{$social->twitter_client_status?'':'checked'}}>
                    <i class="dark-white"></i>
                    Not Active
                  </label>
                </div>
                <div style="margin-top: 5px;">
                  <label class="ui-check ui-check-md">
                    <input id="login_bitbucket_status1" class="has-value" name="login_bitbucket_status" type="radio" 
                    value="1" {{$social->twitter_client_status?'checked':''}}>
                    <i class="dark-white"></i>
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8" id="bitbucket_ids_div" style="display: {{$social->bitbucket_client_status?'block':'none'}}">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Key</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_bitbucket_client_id" type="text" 
                  value="{{$social->bitbucket_client_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Secret</label>
                <div class="col-sm-10">
                  <input placeholder="" class="form-control" dir="ltr" name="login_bitbucket_client_secret" type="text" 
                  value="{{$social->bitbucket_client_secret}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">
                  <small>Callback URL</small>
                </label>
                <div class="col-sm-10">
                  <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_bitbucket_callbackURL" type="text" 
                  value="{!!config('app.url') . '/oauth/bitbucket/callback'!!}">
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- Google reCAPTCHA Status --}}
        <div class="p-a-md col-md-12">
          <div class="form-group">
            <label>Google reCAPTCHA Status : </label>
            <div class="radio">
              <div>
                <label class="ui-check ui-check-md">
                  <input id="nocaptcha_status2" class="has-value" name="nocaptcha_status" type="radio" 
                  value="0" {{$social->nocaptcha_status?'':'checked'}}>
                  <i class="dark-white"></i>
                  Not Active
                </label>
              </div>
              <div style="margin-top: 5px;">
                <label class="ui-check ui-check-md">
                  <input id="nocaptcha_status1" class="has-value" name="nocaptcha_status" type="radio" 
                  value="1" {{$social->nocaptcha_status?'checked':''}}>
                  <i class="dark-white"></i>
                  Active
                </label>
              </div>
            </div>
          </div>
          <div id="nocaptcha_div" style="display: none;">
            <div class="form-group">
              <label>NOCAPTCHA_SECRET</label>
              <input placeholder="" class="form-control" dir="ltr" name="nocaptcha_secret" type="text" value="">
            </div>
            <div class="form-group">
              <label>NOCAPTCHA_SITEKEY</label>
              <input placeholder="" class="form-control" dir="ltr" name="nocaptcha_sitekey" type="text" value="">
            </div>
          </div>          
          <small><a href="https://www.google.com/recaptcha" style="text-decoration: underline" target="_blank"><i class="material-icons"></i> Google reCAPTCHA</a></small>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('js')
  {{-- <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script> --}}
  <script type="text/javascript">
    $("input:radio[name=api_status]").click(function () {
      if ($(this).val() == 1) {
        $("#api_key_div").css("display", "block");
      } else {
        $("#api_key_div").css("display", "none");
      }
    });

    function generate_key() {
      if (!confirm('{!!trans('backLang.APIKeyConfirm') !!}')) {
        return false;
      } else {
        $("#api_key").val(Math.floor(Math.random() * 1000000000000000));
      }
    }
    
    $(document).ready(function () {
      $("#nocaptcha_status2").click(function () {
        $("#nocaptcha_div").css("display", "none");
      });
      $("#nocaptcha_status1").click(function () {
        $("#nocaptcha_div").css("display", "block");
      });
      $("#google_tags_status2").click(function () {
        $("#google_tags_div").css("display", "none");
      });
      $("#google_tags_status1").click(function () {
        $("#google_tags_div").css("display", "block");
      });
      $("#login_facebook_status2").click(function () {
        $("#facebook_ids_div").css("display", "none");
      });
      $("#login_facebook_status1").click(function () {
        $("#facebook_ids_div").css("display", "block");
      });
      $("#login_twitter_status2").click(function () {
      $("#twitter_ids_div").css("display", "none");
      });
      $("#login_twitter_status1").click(function () {
        $("#twitter_ids_div").css("display", "block");
      });
      $("#login_google_status2").click(function () {
        $("#google_ids_div").css("display", "none");
      });
      $("#login_google_status1").click(function () {
        $("#google_ids_div").css("display", "block");
      });
      $("#login_linkedin_status2").click(function () {
        $("#linkedin_ids_div").css("display", "none");
      });
      $("#login_linkedin_status1").click(function () {
        $("#linkedin_ids_div").css("display", "block");
      });
      $("#login_github_status2").click(function () {
      $("#github_ids_div").css("display", "none");
      });
      $("#login_github_status1").click(function () {
        $("#github_ids_div").css("display", "block");
      });
      $("#login_bitbucket_status2").click(function () {
        $("#bitbucket_ids_div").css("display", "none");
      });
      $("#login_bitbucket_status1").click(function () {
        $("#bitbucket_ids_div").css("display", "block");
      });
    });
  </script>  
@endpush