window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '135347913857820', // FB App ID
      cookie     : false,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.10' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
            fbLogout();
        }else if (response.status === 'not_authorized') {
    // the user is logged in to Facebook, 
    // but has not authenticated your app
       // fbLogin();
    
              } else {
                // the user isn't logged in to Facebook.
                                
              }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data            
            getFbUserData();
            
        } else {
            document.getElementById('status').innerHTML = '<div class="alert alert-warning">Login cancelled by User.</div>';
        }
    }, {scope: 'email,publish_actions,user_likes,user_birthday', return_scopes: true});
}



  function fbLogout() {
      FB.logout(function() {
            //userlogout
      });
  }
 



// Save user data to the database
function saveUserData(userData){
    $.post('userData.php', { oauth_provider:'facebook',userData: JSON.stringify(userData)}, function(data){   
        document.getElementById('status').innerHTML = data; 
        fbLogout();
        window.location = "fill_full_user_details.php?username="+userData.email+"&email="+userData.email; 
     return true;      
     });
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,name,email,link,gender,locale,picture,birthday'},
    function (response) {
        //alert(response);
           //document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
        // Save user data
        saveUserData(response);
    });
}
