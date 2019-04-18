<div class="content item">
            
            
            <div id="sidebar">
                <?php if( osc_images_enabled_at_items() ) { ?>
                    <?php if( osc_count_item_resources() > 0 ) { ?>
                    <div id="photos">
                        <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                        <a href="<?php echo osc_resource_url(); ?>" rel="image_group" title="<?php _e('Image', 'bigio'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
                            <?php if( $i == 0 ) { ?>
                            <img src="<?php echo osc_resource_url(); ?>" width="315" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                            <?php } else { ?>
                                <img src="<?php echo osc_resource_thumbnail_url(); ?>" width="75" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                            <?php } ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                <?php } ?>
                <?php if( osc_get_preference('sidebar-300x250', 'bigio') != '') {?>
                <!-- sidebar ad 350x250 -->
                <div class="ads_300">
                    <?php echo osc_get_preference('sidebar-300x250', 'bigio'); ?>
                </div>
                <!-- /sidebar ad 350x250 -->
                <?php } ?>
                <div id="contact">
                    <h2><?php _e("Contact publisher", 'bigio'); ?></h2>
                    <?php if( osc_item_is_expired () ) { ?>
                        <p>
                            <?php _e("The listing is expired. You can't contact the publisher.", 'bigio'); ?>
                        </p>
                    <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
                        <p>
                            <?php _e("It's your own listing, you can't contact the publisher.", 'bigio'); ?>
                        </p>
                    <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                        <p>
                            <?php _e("You must log in or register a new account in order to contact the advertiser", 'bigio'); ?>
                        </p>
                        <p class="contact_button">
                            <strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'bigio'); ?></a></strong>
                            <strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'bigio'); ?></a></strong>
                        </p>
                    <?php } else { ?>
                        <?php if( osc_item_user_id() != null ) { ?>
                            <p class="name"><?php _e('Name', 'bigio') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></p>
                        <?php } else { ?>
                            <p class="name"><?php _e('Name', 'bigio') ?>: <?php echo osc_item_contact_name(); ?></p>
                        <?php } ?>
                        <?php if( osc_item_show_email() ) { ?>
                            <p class="email"><?php _e('E-mail', 'bigio'); ?>: <?php echo osc_item_contact_email(); ?></p>
                        <?php } ?>
                        <?php if ( osc_user_phone() != '' ) { ?>
                            <p class="phone"><?php _e("Tel", 'bigio'); ?>.: <?php echo osc_user_phone(); ?></p>
                        <?php } ?>
                        <ul id="error_list"></ul>
                        <?php ContactForm::js_validation(); ?>
                        <form <?php if( osc_item_attachment() ) { ?>enctype="multipart/form-data"<?php } ?> action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                            <?php osc_prepare_user_info(); ?>
                            <fieldset>
                                <label for="yourName"><?php _e('Your name', 'bigio'); ?>:</label> <?php ContactForm::your_name(); ?>
                                <label for="yourEmail"><?php _e('Your e-mail address', 'bigio'); ?>:</label> <?php ContactForm::your_email(); ?>
                                <label for="phoneNumber"><?php _e('Phone number', 'bigio'); ?> (<?php _e('optional', 'bigio'); ?>):</label> <?php ContactForm::your_phone_number(); ?>
                                <?php if( osc_item_attachment() ) { ?>
                                <label for="contact-attachment"><?php _e('Attachments', 'twitter') ; ?></label><?php ContactForm::your_attachment() ; ?>
                                <?php } ?>
                                <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                                <label for="message"><?php _e('Message', 'bigio'); ?>:</label> <?php ContactForm::your_message(); ?>
                                <input type="hidden" name="action" value="contact_post" />
                                <input type="hidden" name="page" value="item" />
                                <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                <?php if( osc_recaptcha_public_key() ) { ?>
                                <script type="text/javascript">
                                    var RecaptchaOptions = {
                                        theme : 'custom',
                                        custom_theme_widget: 'recaptcha_widget'
                                    };
                                </script>
                                <style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:280px; } </style>
                                <div id="recaptcha_widget">
                                    <div id="recaptcha_image"><img /></div>
                                    <span class="recaptcha_only_if_image"><?php _e('Enter the words above','bigio'); ?>:</span>
                                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                    <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'bigio'); ?></a></div>
                                </div>
                                <?php } ?>
                                <?php osc_show_recaptcha(); ?>
                                <button type="submit"><?php _e('Send', 'bigio'); ?></button>
                            </fieldset>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>