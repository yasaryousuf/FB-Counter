<?php
define('APP_ID', "173616700073283");
define('FACEBOOK_PAGE_ID', "1397701093818068");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- <button onclick="checkLoginState()">Login to Facebook</button> -->
<fb:login-button scope="manage_pages,read_insights,pages_show_list,public_profile,email" onlogin="checkLoginState();"></fb:login-button>
<style type="text/css">
    span{
        position: absolute !important;
        left: 45% !important;
        top: 200px !important;
    }
    .fb_iframe_widget{
        width: 100% !important;
    }
</style>
<script type="text/javascript">
	(function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
   	}(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
        FB.init({
          appId      : <?= APP_ID?>,
          xfbml      : true,
          version    : 'v2.8'
        });
        // var appId = <?= APP_ID?>;
        // console.log(appId);
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    };

    function checkLoginState()
    {
		FB.getLoginStatus(function(response) {
	        // if(response.status == 'not_authorized'){
	        //     FB.login(function(){}, {scope: 'manage_pages,read_insights,pages_show_list,public_profile,email'});
	        // }else if (response.status == 'unknown') {
	        //     FB.login(function(){}, {scope: 'manage_pages,read_insights,pages_show_list,public_profile,email'});
	        // }else{
	            statusChangeCallback(response);
	        // }
	    });
	}

	function statusChangeCallback(response)
    {
        if (response.status === 'connected') {
            window.location.href = '/counter';
        } else {
            console.log('Please log into this app.');
        }
    }
</script>
</body>
</html>