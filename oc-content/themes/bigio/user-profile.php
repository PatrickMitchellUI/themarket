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

    $locales   = __get('locales');
    $user = osc_user();
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_styles_url('jquery-ui/jquery-ui-1.8.20.custom.css'));
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
        
        <!-- new content our theme -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('My account', 'bigio'); ?></h4>
                            </div>
                            <div class="page-content">
                            <?php UserForm::location_javascript(); ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#delete_account").click(function(){
                            $("#dialog-delete-account").dialog('open');
                        });

                        $("#dialog-delete-account").dialog({
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                "<?php echo osc_esc_js(__('Delete', 'bigio')); ?>": function() {
                                    window.location = '<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>';
                                },
                                "<?php echo osc_esc_js(__('Cancel', 'bigio')); ?>": function() {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                </script>
                <form action="<?php echo osc_base_url(true); ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="action" value="profile_post" />
                            	<div class="row">
                                	
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    	<p><strong><?php _e('Update your profile', 'bigio'); ?></strong></p>
                                    </div>
                                   
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Name', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::name_text(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Username', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	 <?php echo osc_user_username(); ?><br />
                                <?php if(osc_user_username()==osc_user_id()) { ?>
                                    <a href="<?php echo osc_change_user_username_url(); ?>"><?php _e('Modify username', 'bigio'); ?></a>
                                <?php }; ?>
                                    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('E-mail', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php echo osc_user_email(); ?><br />
                                <a href="<?php echo osc_change_user_email_url(); ?>"><?php _e('Modify e-mail', 'bigio'); ?></a> <a href="<?php echo osc_change_user_password_url(); ?>" ><?php _e('Modify password', 'bigio'); ?></a>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('User type', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::is_company_select(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Cell phone', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::mobile_text(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Phone', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::phone_land_text(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Country', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Region', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('City', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('City area', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::city_area_text(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Address', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::address_text(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                 <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Website', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::website_text(osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                 <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Description', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php UserForm::multilanguage_info($locales, osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input class="big" type="submit" value="<?php _e('Update', 'bigio'); ?>">
                                        <a class="button grey" href="<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>"><?php _e('Delete my account', 'bigio'); ?></a>
                                    </div>
                                    
                                </div> 
                                <?php osc_run_hook('user_form'); ?>
                                </form>
                            </div>
                            
                    	</div>
                        <div id="dialog-delete-account" title="<?php _e('Delete account', 'bigio'); ?>" class="has-form-actions hide">
            <div class="form-horizontal">
                <div class="form-row">
                    <p><?php _e('All your listings and alerts will be removed, this action can not be undone.', 'bigio');?></p>
                </div>
            </div>
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
        <!-- end new content our theme -->
        

        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>