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
        <!-- Main Content -->
				<section class="main-content col-lg-9 col-md-9 col-sm-9">
                    
                  
                    <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Recover your password', 'bigio'); ?></h4>
                            </div>
                            
                            <div class="page-content">
                            <form action="<?php echo osc_base_url(true); ?>" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="recover_post" />
                            	<div class="row">
                
                        <div class="col-lg-4 col-md-4 col-sm-4"><p><?php _e('E-mail', 'bigio'); ?></p></div> 
					    <div class="col-lg-8 col-md-8 col-sm-8"><?php UserForm::email_text(); ?></div>
                        </div>
                        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4"><p></p></div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                        <?php if( osc_recaptcha_public_key() ) { ?>
                                <script type="text/javascript">
                                    var RecaptchaOptions = {
                                        theme : 'custom',
                                        custom_theme_widget: 'recaptcha_widget'
                                    };
                                </script>
                                <style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:300px; } </style>
                                <div id="recaptcha_widget">
                                    <div id="recaptcha_image"><img /></div>
                                    <span class="recaptcha_only_if_image"><?php _e('Enter the words above','bigio'); ?>:</span>
                                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                    <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'bigio'); ?></a></div>
                                </div>
                                <?php } ?>
                                <?php osc_show_recaptcha(); ?>
</div>
                        </div>
                        
                        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4"><p></p></div>
                        <div class="col-lg-4 col-md-8 col-sm-8">
                        <input type="submit" value="<?php _e('Send me a new password', 'bigio'); ?>">
                        </div>
                                                
                </form><br><br><br>
                                    
                            </div>
                            
                    	</div>
                          
                    </div>
                        
                    
				</section>
				<!-- /Main Content -->
				
				<!-- Sidebar -->
				<aside class="sidebar right-sidebar col-lg-3 col-md-3 col-sm-3">
					<div class="row sidebar-box grey">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="">
                                <a href="<?php echo osc_register_account_url(); ?>">
				<div class="right-side-banner banner-item light-grey">
					<h5 align="center"><?php _e("Register for a free account", 'bigio'); ?></h5>
				</div></a>
							</div>
						</div>
					</div>
                    <div class="row sidebar-box grey">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="">
                                
                            	<a href="<?php echo osc_user_login_url(); ?>">
				<div class="right-side-banner banner-item light-grey">
					
					<h5 align="center"><?php _e("Log in", 'bigio'); ?></h5>
				</div></a>
				        
							</div>
						</div>
						
					</div>					
				</aside>
				<!-- /Sidebar -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>