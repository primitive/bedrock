<?php
    function theme_settings_general_content() {
?>

    <div id="bedrock-janet">

        <?php
            // Check if the user has premissions to edit these settings.
            if (!current_user_can('manage_options')) {
                wp_die('You do not have sufficient permissions to access this page.');
            }
        ?>

        <h1>Main Theme Settings</h1>
        <p>
            You can control the look here.
        </p>

        <div class="row">
            <div class="col">
                <h2>Site Options</h2>

                <form method="POST" action="options.php">

                    <?php
                        settings_fields("theme_settings_options");
                        do_settings_sections("theme-options");
                    ?>

                    <h3>General Settings</h3>

                    <div class="form-group">
                        <label for="background_image">Site Background Image</label>
                        <sub>This will be displayed on the [ index, blog, archive, home, search ] pages.</sub>
                        <input type="text" name="background_image" id="background_image" value="<?php echo get_option('background_image'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <sub>This will be displayed on the homepage.</sub>
                        <input type="text" name="company_name" id="company_name" value="<?php echo get_option('company_name'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="company_tag">Company Tagline</label>
                        <input type="text" name="company_tag" id="company_tag" value="<?php echo get_option('company_tag'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="company_address">Company Postal Address</label>
                        <input type="text" name="company_address" id="company_address" value="<?php echo get_option('company_address'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="company_contact_phone">Company Contact Number</label>
                        <input type="text" name="company_contact_phone" id="company_contact_phone" value="<?php echo get_option('company_contact_phone'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="company_contact_email">Company Contact Email</label>
                        <input type="text" name="company_contact_email" id="company_contact_email" value="<?php echo get_option('company_contact_email'); ?>" />
                    </div>
 
                    <div class="form-group">
                        <label for="company_copyright">Company Copyright Notice</label>
                        <input type="text" name="company_copyright" id="company_copyright" value="<?php echo get_option('company_copyright'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="company_legal">Company Legal Notice</label>
                        <input type="text" name="company_legal" id="company_legal" value="<?php echo get_option('company_legal'); ?>" />
                    </div>



                    <hr>
                    <div class="form-group">
                        <label for="company_logo">Your Standard Company Logo</label>
                        <sub>This will be displayed on normal pages.</sub>
                        <input id="company_logo" type="text" name="company_logo" value="<?php echo get_option('company_logo'); ?>" />
                        <input id="upload-logo-button" type="button" class="button" value="Upload Image" />
                        <div class="form-group">
                            <input type="checkbox" id="company_logo_white" name="company_logo_white" value="1" <?php if(get_option('company_logo_white') == true) { echo "checked"; }; ?>>
                            <label for="company_logo_white" class="inline">Logo Contain Light Text?</label>
                        </div>
                    </div>
                    <h3>Header Settings</h3>
                    <div class="form-group">
                        <label for="header_company_email">Header Email Us Message</label>
                        <sub>This will be displayed on all pages in the header.</sub>
                        <input type="text" name="header_company_email" id="header_company_email" value="<?php echo get_option('header_company_email'); ?>" />
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="header_company_phone">Header Call Us Message</label>
                        <sub>This will be displayed on all pages in the header.</sub>
                        <input type="text" name="header_company_phone" id="header_company_phone" value="<?php echo get_option('header_company_phone'); ?>" />
                    </div>
                    <h3>Footer Settings</h3>
                    <div class="form-group">
                        <label for="footer_logo">Your Standard Company Logo</label>
                        <sub>This will be displayed on normal pages.</sub>
                        <input id="footer_logo" type="text" name="footer_logo" value="<?php echo get_option('footer_logo'); ?>" />
                        <input id="upload-footer-logo-button" type="button" class="button" value="Upload Image" />
                    </div>
                    <div class="form-group">
                        <label for="footer_location_title">Office Location Title</label>
                        <input type="text" name="footer_location_title" id="footer_location_title" value="<?php echo get_option('footer_location_title'); ?>" />
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="footer_contactform">Contact Form Code (From Contact Form 7)</label>
                        <input type="text" name="footer_contactform" id="footer_contactform" value="<?php echo get_option('footer_contactform'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="company_logo">Background Image for Footer</label>
                        <sub>This will be displayed on normal pages.</sub>
                        <input id="footer_background" type="text" name="footer_background" value="<?php echo get_option('footer_background'); ?>" />
                        <input id="upload-footer-background-button" type="button" class="button" value="Upload Image" />
                    </div>
                    <?php
                    submit_button();
                    ?>
                </form>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="previews">
                <h2>Previews</h2>

                <div class="form-group">
                    <label>Your Selected Company Logo</label>
                    <sub>This is displayed in the header and footer of the website.</sub>
                    <?php if (get_option('company_logo') !== ''): ?>
                        <?php if (get_option('company_logo_white') == true) { echo '<div class="dark-bg">'; } ?>
                        <img src="<?php echo get_option('company_logo'); ?>" alt="<?php echo get_option('company_name'); ?>">
                        <?php if (get_option('company_logo_white') == true) { echo '</div>'; } ?>
                    <?php endif; ?>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <?php
}
