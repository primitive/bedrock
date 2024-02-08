<?php
/**
 * Force Login WP Plugin
 * Bypass Force Login to allow for REST API
 */
remove_filter( 'rest_authentication_errors', 'v_forcelogin_rest_access', 99 );