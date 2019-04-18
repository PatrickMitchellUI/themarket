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

    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);

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
        <!-- content our theme -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    
                     <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
							<div class="carousel-heading">
                                <h4><?php _e('Latest listings', 'bigio'); ?>: <strong><?php echo osc_user_name(); ?></strong></h4>
                            </div>
                            <?php if(osc_count_items() == 0) { ?>
                    <h3><?php _e('No listings have been added yet', 'bigio'); ?></h3>
                <?php } else { ?>
                            <?php while(osc_has_items()) { ?>
                            <div class="grid-view product">
                            <?php if( osc_images_enabled_at_items() ) { ?>
                                <div class="product-image col-lg-3 col-md-3 col-sm-3">
                    <?php if(osc_count_item_resources()) { ?>
                        <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" /></a>
                    <?php } else { ?>
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.png'); ?>" title="" alt="" />
                    <?php } ?>
                                </div>
                                <?php } ?>
                                <div class="col-lg-9 col-md-9 col-sm-9 product-content no-padding">
                                	<div class="product-info">
                                        <h5><a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ) ); ?></a></h5>
                                      
                                    
                                        <span><?php  echo osc_item_city(); ?> (<i class="icons icon-location-7"></i><?php echo osc_item_region(); ?>) - <i class="icons icon-calendar"></i><?php echo osc_format_date(osc_item_pub_date()); ?></span>
										<div align="right" class="rating-box">
											<span><?php _e("Price", "bigio"); ?>:</span> <span class="price"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() )  echo osc_item_formated_price(); ?></span><br>
										</div>
                                        <p><?php echo osc_highlight( strip_tags( osc_item_description() ), 150 ); ?></p>		
									</div>
 <div>
                                                
                                  </div>
                                    
                                    <div class="product-actions full-width">
                                        <span >
                                            <span >
                                                <i class="icons icon-folder-open-empty"></i>
                                                <span ><?php $aCategory = osc_get_category('id', osc_item_category_id());
                $parentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);

             View::newInstance()->_erase('categories');
             View::newInstance()->_erase('subcategories');
             View::newInstance()->_exportVariableToView('category', $parentCategory);

            echo osc_category_name(); ?><i class="icons icon-right-dir"></i> <?php echo osc_item_category();?></span>
                                            </span>
                                        </span>
                                    </div>
                                          
                              </div>
                            </div> <?php } ?><?php } ?>
                            
                           
                            
                        </div>
                        
                    </div>
					
                   
                   <div class="row"> 
                   
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="category-results">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="pagination">
                            <?php if(osc_search_total_pages() > osc_max_results_per_page_at_search() ) { ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 pull-right"><a class="button regular blue" href="<?php echo osc_base_url(true).'&page=search&sUser[]='.osc_user_id(); ?>"><strong>See all offers »</strong></a></div>
                    <?php } ?>
                            </div>
                        </div>
                        
                    </div>
					
					
						
				</section>
				<!-- /Main Content -->
				
				
				
				
				<!-- Sidebar -->
				<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
                    
					
                    <!-- filters -->
                    <div class="row sidebar-box blue">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="sidebar-box-heading">
                            	<i class="icons icon-user"></i>
								<h4><?php echo sprintf(__('%s\'s profile', 'bigio'), osc_user_name()); ?></h4>
							</div>
							<div class="sidebar-box-content">
                            
                                <div class="page-content contact-form">
                        <strong><?php _e('Full name', 'bigio'); ?></strong>: <?php echo osc_user_name(); ?><br>
                        <strong><?php _e('Address', 'bigio'); ?></strong>: <?php echo $address; ?><br>
                        <strong><?php _e('Location', 'bigio'); ?></strong>: <?php echo $location; ?><br>
                        <strong><?php _e('Website', 'bigio'); ?></strong>: <?php echo osc_user_website(); ?><br>
                        <strong><?php _e('User Description', 'bigio'); ?></strong>: <?php echo osc_user_info(); ?><br><br>
                        <?php if(osc_logged_user_id()!=  osc_user_id()) { ?>
                            <?php if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                                <strong><?php _e("Contact publisher", 'bigio'); ?></strong>
                                <?php ContactForm::js_validation(); ?>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                        <input type="hidden" name="action" value="contact_post" />
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
                        <?php osc_prepare_user_info(); ?>
                                								
									<label><?php _e('Your name', 'bigio'); ?></label>
									<?php ContactForm::your_name(); ?>
									
									<label><?php _e('Your e-mail address', 'bigio'); ?></label>
									<?php ContactForm::your_email(); ?>
									
									<label><?php _e('Phone number', 'bigio'); ?> (<?php _e('optional', 'bigio'); ?>)</label>
									<?php ContactForm::your_phone_number(); ?>
									
									<label><?php _e('Message', 'bigio'); ?></label>
									<?php ContactForm::your_message(); ?>
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
									<br>
									<input class="button blue big" type="submit" value="<?php _e('Send', 'bigio'); ?>">
									
                                </form>
                                <?php     } ?>
                <?php } ?>
								
                            </div>
                            
							</div>
						</div>
						
					</div>
                    <!-- /filters -->
					
				</aside>
				<!-- /Sidebar -->
        <!-- end content our theme -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
