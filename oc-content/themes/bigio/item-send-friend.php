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
        
        <!-- start our content -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9">
                    
                  
                    <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Send to a friend', 'bigio'); ?></h4>
                            </div>
                            <!-- start form -->
                       
                            <div class="page-content">
                        <form id="sendfriend" name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post">
                        <input type="hidden" name="action" value="send_friend_post" />
                        <input type="hidden" name="page" value="item" />
                        <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                            	<div class="row">
                                	<div class="col-lg-4 col-md-4 col-sm-4">
                                    <p><?php _e('Listing', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<p><a href="<?php echo osc_item_url( ); ?>"><?php echo osc_item_title(); ?></a></p>
                                    </div>
                                    <?php if(osc_is_web_user_logged_in()) { ?>
                            <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                            <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
                        <?php } else { ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p><?php _e('Your name', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php SendFriendForm::your_name(); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p><?php _e('Your e-mail address', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php SendFriendForm::your_email(); ?>
                                    </div>	
                                    
                                </div>
                                <?php }; ?>
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p><?php _e("Your friend's name", 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php SendFriendForm::friend_name(); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e("Your friend's e-mail address", 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php SendFriendForm::friend_email(); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p><?php _e('Message', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php SendFriendForm::your_message(); ?>
                                    </div>	
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
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
                                <?php osc_show_recaptcha(); ?>
                                    </div>	
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input class="big blue" type="submit" value="<?php _e('Send', 'bigio'); ?>">
                                        <input class="big" type="reset" value="<?php _e('Cancel', 'bigio'); ?>">
                                    </div>
                                    
                                </div>
                                </form>
                            </div> <!-- end form -->
                            <?php SendFriendForm::js_validation(); ?>
                    	</div>
                          
                    </div>
                        
                    
				</section>
				<!-- /Main Content -->
				
				
				
				
				<!-- Sidebar -->
				<aside class="sidebar right-sidebar col-lg-3 col-md-3 col-sm-3">
					<div class="row sidebar-box green">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
						
							
							<div class="sidebar-box-content">
                            <div class="sidebar-box-heading">
								<i class="icons icon-folder-open-empty"></i>
								<h4><?php _e('Category', 'bigio'); ?></h4>
							</div>
                            
								<ul>
                                 <?php osc_goto_first_category() ; ?>
                                <?php while ( osc_has_categories() ) { ?>
									<li><a href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?> 						
<span class="badge pull-right">(<?php echo osc_category_total_items() ; ?>)</span></a> </li> <?php } ?>
									
								</ul>
                               
							</div>                                
							
						</div>
							
					</div>
					<?php if( osc_get_preference('sidebar-300x250', 'bigio') != '') {?>
                     <div align="center">
                    <?php echo osc_get_preference('sidebar-300x250', 'bigio'); ?>
                    </div>
                    <?php } ?>	
				</aside>
				<!-- /Sidebar -->
        <!-- end our content -->
        
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>