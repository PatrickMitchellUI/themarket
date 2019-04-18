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
        
        <!-- start our theme -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    <div class="row">
                    	
						
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
							<div class="carousel-heading">
                                <h4><?php _e('Your listings', 'bigio'); ?> <a href="<?php echo osc_item_post_url(); ?>">+ <?php _e('Post a new listing', 'bigio'); ?></a></h4>
                            </div>
                            <?php if(osc_count_items() == 0) { ?>
                    <h3><?php _e("You don't have any listings yet", 'bigio'); ?></h3>
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
                                      
                                   <a class="button small blue" href="<?php echo osc_item_edit_url(); ?>"><?php _e('Edit', 'bigio'); ?></a>  <?php if(osc_item_is_active()) { echo '<a class="button small green user-listing-active">'.__('Active', 'bigio').'</a>'; } else { echo '<span class="user-listing-inactive">'.__('Inactive', 'bigio').'</span>'; }; ?>
                                        <?php if(osc_item_is_premium()) { echo '<a class="button small red user-listing-premium">'.__('Premium', 'bigio').'</a>'; }; ?>
                                        <?php if(osc_item_is_spam()) { echo '<span class="user-listing-spam">'.__('Spam', 'bigio').'</span>'; }; ?> <a class="button small orange delete" onClick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bigio')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'bigio'); ?></a>
                                        <?php if(osc_item_is_inactive()) {?>
                                        
                                        <a class="button green" href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'bigio'); ?></a>
                                        <?php } ?> 
										<div align="right" class="rating-box">
											<span><?php _e("Price", "bigio"); ?>:</span> <span class="price"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() )  echo osc_item_formated_price(); ?></span><br>
										</div>
                                        <p><span><?php  echo osc_item_city(); ?> (<i class="icons icon-location-7"></i><?php echo osc_item_region(); ?>) - <i class="icons icon-calendar"></i><?php echo osc_format_date(osc_item_pub_date()); ?></span> <?php echo osc_highlight( strip_tags( osc_item_description() ), 150 ); ?></p>		
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
                            </div> <?php } ?>
                            
                           
                            
                        </div>
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="pagination pull-left"><ul>
                            <?php for($i = 0; $i < osc_list_total_pages(); $i++) {
                        if($i == osc_list_page()) {
                            printf('<li><a href="%s">%d</a></li>', osc_user_list_items_url($i+1), ($i + 1));
                        } else {
                            printf('<li><a href="%s">%d</a></li>', osc_user_list_items_url($i+1), ($i + 1));
                        }
                    } ?></ul>
                                
                            </div>
                            <?php } ?>
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
        <!-- end our theme -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>