<div>
    <div class="d-flex vh-100 py-3">
        <div class="container p-4 d-flex  align-self-center justify-content-center" >
            <div class="row border rounded-4 shadow bg-white" style="max-height:500px;max-width:600px;">
                <img class="col-md-6 col-lg-6 p-0 rounded-start-4 d-none d-md-block" src="{{ asset('assets/page/dev.png') }}" alt="" style="object-fit:cover;height:500px;" >
                <div class="col-md-6 col-lg-6 p-3 py-5 align-self-center">
                    <div class="row">
                        <h3>
                            Sign in
                        </h3>
                    </div>
                    <div class="row">
                        <form wire:submit.prevent="login()">
                            <input class="form-control my-2" type="text" wire:model.defer="username" placeholder="Username / Email address">
                            <input class="form-control" type="password" wire:model.defer="password" placeholder="Enter Password">
                            <div class="d-grid gap-2 mt-2">
                                <button type="submit"class="btn btn-block btn-primary ">Login</button>
                            </div>
                        </form>
                    </div>
                    <a href="/auth/google/redirect" target="_blank">Google</a>
                    <button onclick="logout();"> logout</button>

                        <fb:login-button 
                          scope="public_profile,email"
                          onlogin="checkLoginState();">
                        </fb:login-button>
                    <div class="row">
                        <p class="text-reset mt-4"><a href="/forgot-password" wire:navigate class="text-dark">Forgot password</a></p>
                        <p class="text-reset mt-2">Don't have an account? <a href="/register-email" wire:navigate class="text-dark">Register using Email</a></p>
                    </div>
                    <p id="profile"></p>
                </div>
            </div>
        </div>
    </div>


      
<script>
  window.fbAsyncInit = function() {
    FB.init({
        appId      : '901857398162315',
        cookie     : true,
        xfbml      : true,
        version    : 'v21.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  function logout(){
      FB.logout(function(response) {
      // Person is now logged out
    });
  }
</script>
</div>