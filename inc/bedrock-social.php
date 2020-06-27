<?php
    // Social Settings Admin Page
    function bedrock_social() {
?>

    <div id="bedrock-janet">

        <?php
            // Hallpass / check for permissions to edit these settings.
            if (!current_user_can('manage_options')) {
                wp_die('You do not have sufficient permissions to access this page.');
            }
        ?>

        <header class="row">
            <div class="col">
                <h1>Social Profiles</h1>
                <p>Here we add links to your social profiles and configure social settings.</p>
            <div>
        </header>

        <div class="row">
            <div class="col-md-6 col-xs-12">

                <h2>Settings</h2>

                <form method="POST" action="options.php">


                    <?php
                        settings_fields("theme_social_options");
                        do_settings_sections("theme-social");
                    ?>


                    <div class="form-group">
                        <label for="header_title">Header: Social Title</label>
                        <input type="text" name="header_title" id="header_title"
                               value="<?php echo get_option('header_title'); ?>"/>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="twitter_social">Twitter Profile URL</label>
                        <input type="text" name="twitter_social" id="twitter_social"
                               value="<?php echo get_option('twitter_social'); ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="facebook_social">Facebook Page URL</label>
                        <input type="text" name="facebook_social" id="facebook_social"
                               value="<?php echo get_option('facebook_social'); ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="pintrest_social">Pinterest Page URL</label>
                        <input type="text" name="pintrest_social" id="pintrest_social"
                               value="<?php echo get_option('pintrest_social'); ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="linkin_social">LinkedIn Profile URL</label>
                        <input type="text" name="linkin_social" id="linkin_social"
                               value="<?php echo get_option('linkin_social'); ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="youtube_social">YouTube Profile URL</label>
                        <input type="text" name="youtube_social" id="youtube_social"
                               value="<?php echo get_option('youtube_social'); ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="instagram_social">Instagram Profile URL</label>
                        <input type="text" name="instagram_social" id="instagram_social" value="<?php echo get_option('instagram_social'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="spotify_social">Spotify Profile URL / Spotify Playlist</label>
                        <input type="text" name="spotify_social" id="spotify_social" value="<?php echo get_option('spotify_social'); ?>" />
                    </div>

                    <?php submit_button(); ?>

                </form>
            </div>

            <div class="row">
            <div class="col">
                <h3>Help and Development</h2>
            </div>
            </div>
        </div>
    </div> <!-- END: bedrock-janet -->




    <?php
}
