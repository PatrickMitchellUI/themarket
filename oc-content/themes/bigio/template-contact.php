<?php
    /*
     *      OSCLass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2010 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <div class="" style="float:left; width: 550px;">
            <h1><?php echo osc_static_page_title() ; ?></h1>
            <div><?php echo osc_static_page_text() ; ?></div>
        </div>
        <div class="user_forms" style="float:right;">
            <div class="inner">
                <h1><?php _e('Contact us', 'bigio') ; ?></h1>
                <ul id="error_list"></ul>
                <form action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact" id="contact">
                    <input type="hidden" name="page" value="contact" />
                    <input type="hidden" name="action" value="contact_post" />
                    <fieldset>
                        <label for="subject"><?php _e('Subject', 'bigio') ; ?> (<?php _e('optional', 'bigio'); ?>)</label> <?php ContactForm::the_subject() ; ?><br />
                        <label for="message"><?php _e('Message', 'bigio') ; ?></label> <?php ContactForm::your_message() ; ?><br />
                        <label for="yourName"><?php _e('Your name', 'bigio') ; ?> (<?php _e('optional', 'bigio'); ?>)</label> <?php ContactForm::your_name() ; ?><br />
                        <label for="yourEmail"><?php _e('Your e-mail address', 'bigio') ; ?></label> <?php ContactForm::your_email(); ?><br />
                        <?php osc_show_recaptcha(); ?>
                        <button type="submit"><?php _e('Send', 'bigio') ; ?></button>
                        <?php osc_run_hook('user_register_form') ; ?>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>