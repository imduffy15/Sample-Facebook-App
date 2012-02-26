if (self===top) {
	var url_path = window.location.pathname.replace('/SampleApp/','');
    top.location.href = SampleApp.config.fbAppRoot + url_path;
}

$(document).ready(function(){
	(function() {
	    var e = document.createElement('script');
	    e.async = true;
	    e.src = '//connect.facebook.net/en_US/all.js';
	    document.getElementById('fb-root').appendChild(e);
	}());
});

window.fbAsyncInit = function() {
    FB.Canvas.setAutoResize();
    FB.init({
	    appId: SampleApp.config.appId,
        status: false,
        cookie: true,
        xfbml: true,
		oauth: true,
        channelUrl: SampleApp.config.staticRoot + 'channel.html'
	});
	
	FB.getLoginStatus(function (response) {
        // If the user is not logged in, response.session will be null
        if (response.authResponse) {
			// user logged in
			SampleApp.facebook_access_token = response.authResponse.accessToken;
			SampleApp.logged_in_user_id = response.authResponse.userID;
		}
};