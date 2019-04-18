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
        <!-- new content -->
        <!-- our theme content -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    <div class="row">
                    	
						
                        <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Change your password', 'bigio'); ?></h4>
                            </div>
                             <form action="<?php echo osc_base_url(true); ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="action" value="change_password_post" />
                            <div class="page-content">
                           
                            	<div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    	<p><?php _e('Current password', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    <input type="password" name="password" id="password" value="" />	
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    	<p><?php _e('New password', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    	<input type="password" name="new_password" id="new_password" value="" />
                                    </div>	
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    	<p><?php _e('Repeat new password', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    	<input type="password" name="new_password2" id="new_password2" value="" />
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