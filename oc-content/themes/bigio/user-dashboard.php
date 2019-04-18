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
        
        <!-- new content our theme -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    <div class="row">
                    	
						
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
							<div class="carousel-heading">
                                <h4><?php echo sprintf(__('Listings from %s', 'bigio') ,osc_logged_user_name()); ?></h4>
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
                                        <h5><i class="icons icon-eye"></i> <a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ) ); ?></a></h5>
                                      
                                    <a class="button small blue" href="<?php echo osc_item_edit_url(); ?>"><?php _e('Edit', 'bigio'); ?></a>
                                    
                                        <?php if(osc_item_is_inactive()) {?>
                                        <a class="button small red" href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'bigio'); ?></a>
                                        <?php } ?> <span><?php  echo osc_item_city(); ?> (<i class="icons icon-location-7"></i><?php echo osc_item_region(); ?>) - <i class="icons icon-calendar"></i><?php echo osc_format_date(osc_item_pub_date()); ?></span>
										<div align="right" class="rating-box">
											<span><?php _e("Price", "bigio"); ?>:</span> <span class="price"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() )  echo osc_item_formated_price(); ?></span><br>
										</div>
                                        <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ); ?></p>		
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
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="category-results">
                                <p></p>
                                <p>
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="pagination pull-left">
                            <?php for($i = 0; $i < osc_list_total_pages(); $i++) {
                        if($i == osc_list_page()) {
                            printf('<a href="%s"><div class="page-button">%d</div></a>', osc_user_list_items_url($i+1), ($i + 1));
                        } else {
                            printf('<a href="%s"><div class="page-button">%d</div></a>', osc_user_list_items_url($i+1), ($i + 1));
                        }
                    } ?>
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
        <!-- end content our theme -->
        
        
       
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
