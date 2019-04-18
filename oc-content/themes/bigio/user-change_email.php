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
        <script type="text/javascript">
            $(document).ready(function() {
                $('form#change-email').validate({
                    rules: {
                        new_email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        new_email: {
                            required: '?php echo osc_esc_js(__("Email: this field is required", "bigio")); ?>.',
                            email: '<?php echo osc_esc_js(__("Invalid email address", "bigio")); ?>.'
                        }
                    },
                    errorLabelContainer: "#error_list",
                    wrapper: "li",
                    invalidHandler: function(form, validator) {
                        $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
                    },
                    submitHandler: function(form){
                        $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                        form.submit();
                    }
                });
            });
        </script>
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        
        <!-- our theme content -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    <div class="row">
                    	
						
                        <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Change your e-mail', 'bigio'); ?></h4>
                            </div>
                             <form id="change-email" action="<?php echo osc_base_url(true); ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="action" value="change_email_post" />
                            <div class="page-content">
                           
                            	<div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    	<p></p>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    	<p><?php _e('Current e-mail', 'bigio'); ?>: <strong><?php echo osc_logged_user_email(); ?></strong></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    	<p><?php _e('New e-mail', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    	<input type="text" name="new_email" id="new_email" value="" />
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    	<p></p>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    	<input class="big" type="submit" value="<?php _e('Update', 'bigio'); ?>">
                                    </div>
                                    
                                </div>
                            </div></form>
                                           
                    	</div>
                        
                    </div>
                   
						
				</section>
				<!-- /Main Content -->
				
				
				
				
				<!-- Sidebar -->
				<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
                    
					<!-- Categories -->
					<div class="row sidebar-box green">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							
							
							<div class="sidebar-box-content">
                            <div class="sidebar-box-heading">
								<i class="icons icon-cog"></i>
								<h4><?php _e('My account', 'bigio'); ?></h4>
							</div>
								<?php echo osc_private_user_menu( get_user_menu() ); ?>
							</div>
							
						</div>
							
					</div>
					<!-- /Categories -->
                   
				</aside>
				<!-- /Sidebar -->
        <!-- end our theme content -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>