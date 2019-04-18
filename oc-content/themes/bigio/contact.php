<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
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

    osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        
        <!-- new theme content -->
        <section class="main-content col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div class="row">
                    	
                       
                        <div class="col-lg-5 col-md-5 col-sm-5">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Contact us', 'bigio'); ?></h4>
                            </div>
                            
                            <div class="page-content contact-form">
                            	<ul id="error_list"></ul>
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact contact-form">
                    <input type="hidden" name="page" value="contact" />
                    <input type="hidden" name="action" value="contact_post" />
                                
									<label><?php _e('Subject', 'bigio'); ?> (<?php _e('optional', 'bigio'); ?>)</label>
									<?php ContactForm::the_subject(); ?>
									
									<label><?php _e('Message', 'bigio'); ?></label>
									<?php ContactForm::your_message(); ?>
									
									<label><?php _e('Your name', 'bigio'); ?> (<?php _e('optional', 'bigio'); ?>)</label>
									<?php ContactForm::your_name(); ?>
									
									<label><?php _e('Your e-mail address', 'bigio'); ?></label>
									<?php ContactForm::your_email(); ?>
                                    
                                    <?php osc_run_hook('contact_form'); ?>
                                    <?php if( osc_recaptcha_public_key() ) { ?>
                                <script type="text/javascript">
                                    var RecaptchaOptions = {
                                        theme : 'custom',
                                        custom_theme_widget: 'recaptcha_widget'
                                    };
                                </script>
                                <style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:230px; } </style>
                                <div id="recaptcha_widget">
                                    <div id="recaptcha_image"><img /></div>
                                    <span class="recaptcha_only_if_image"><?php _e('Enter the words above','bigio'); ?>:</span>
                                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                    <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'bigio'); ?></a></div>
                                </div>
                                <?php } ?>
                                <?php osc_show_recaptcha(); ?><br>
									<input class="big blue full width" type="submit" value="<?php _e('Send', 'bigio'); ?>">
								<?php osc_run_hook('admin_contact_form'); ?>
                                </form>
								<?php ContactForm::js_validation(); ?>
                            </div>
                            
                    	</div>
                        
                        <div class="col-lg-7 col-md-7 col-sm-7">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Address','bigio'); ?> / <?php _e('Email','bigio'); ?></h4>
                            </div>
                            
                            <div class="page-content contact-info">
                            	<div class="row">
                                	
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                    	<div class="contact-item green">
                                            <i class="icons icon-location-3"></i>
                                            <p><?php if( osc_get_preference('address-contact', 'bigio') != '') {?>
                    <?php echo osc_get_preference('address-contact', 'bigio'); ?>
                    <?php } ?></p>
										</div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                    	<div class="contact-item green">
                                            <i class="icons icon-mail"></i>
                                            <p><?php if( osc_get_preference('email-contact', 'bigio') != '') {?>
                    <?php echo osc_get_preference('email-contact', 'bigio'); ?>
                    <?php } ?></p>
										</div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                <?php if( osc_get_preference('map-contact', 'bigio') != '') {?>
                    <?php echo osc_get_preference('map-contact', 'bigio'); ?>
                    <?php } ?>
                               
                                
                            </div>
                            
                    	</div>
                  	</div>
                    
				</section>
        <!-- end new theme content -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>