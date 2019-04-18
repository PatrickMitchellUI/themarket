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
                                <h4><?php _e('Your alerts', 'bigio'); ?></h4>
                            </div>
                             
                            <div class="page-content">
                           
                            	<div class="row">
                               
                                    <div id="main">
                <?php if(osc_count_alerts() == 0) { ?>
                    <h3><?php _e('You do not have any alerts yet', 'bigio'); ?>.</h3>
                <?php } else { ?>
                    <?php while(osc_has_alerts()) { ?>
                        <div class="userItem" >
                            <div><?php _e('Alert', 'bigio'); ?> | <a onClick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'bigio')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><?php _e('Delete this alert', 'bigio'); ?></a></div>
                            <div s >
                            <?php while(osc_has_items()) { ?>
                                <div class="userItem" >
                                    <div><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></div>
                                    <div class="userItemData" >
                                    <?php _e('Publication date', 'bigio'); ?>: <?php echo osc_format_date(osc_item_pub_date()); ?><br />
                                    <?php if( osc_price_enabled_at_items() ) { _e('Price', 'bigio'); ?>: <?php echo osc_format_price(osc_item_price()); } ?>
                                    </div>
                                </div>
                                <br />
                            <?php } ?>
                            <?php if(osc_count_items() == 0) { ?>
                                    <br />
                                    0 <?php _e('Listings', 'bigio'); ?>
                            <?php } ?>
                            </div>
                        </div>
                        <br />
                    <?php } ?>
                <?php  } ?>
            </div>
                                    </div>
                            </div>
                                           
                    	</div>
                    </div>
				</section>
				<!-- /Main Content -->
				<!-- Sidebar -->
				<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
                    
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
                   
				</aside>
				<!-- /Sidebar -->
        <!-- end our theme content -->
        <!-- end new content -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>