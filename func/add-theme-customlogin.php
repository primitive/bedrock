<?php
/**
 * Customise the login page
 * 
 * Modify the wp-login.php 'Logo, Link and Back to' URL
*/

add_action( 'login_enqueue_scripts', 'update_login_logo' );
function update_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(https://api.primitivedigital.uk/wp-content/uploads/img/punky_logo_smcoral.png);
            width:229px;
            height:80px;
            background-size: 229px 80px;
            background-repeat: no-repeat;
            padding-bottom: 15px;
        }
    </style>
<?php }

add_filter( 'login_headertext', 'update_login_title' );
function update_login_title() { return "Primitive Digital's Big Backend"; }

add_filter( 'login_headerurl', 'update_login_logolink' );
function update_login_logolink() { return "https://primitivedigital.uk"; }

add_filter( 'home_url', 'update_login_backtolink' );
function update_login_backtolink( $url ) {
	global $pagenow;
	if( 'wp-login.php' === $pagenow ) { $url = 'https://primitivedigital.uk'; }
	return $url;
}