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
       
<meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
					
					<div class="products-row row">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="row">
                    
                    	<!-- Heading -->
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="carousel-heading">
							<h4><?php _e('Latest Listings', 'bigio'); ?></h4>
							</div>
                            <?php if( osc_count_latest_items() == 0) { ?>
                        <div class="categories-heading"><p><?php _e('No Latest Listings', 'bigio'); ?></p></div>
                    <?php } else { ?>
                            <div class="categories-heading" align="center">
                                <!-- header ad 728x60-->
<?php echo osc_get_preference('header-728x90', 'bigio'); ?>
<!-- /header ad 728x60-->
                            </div>
							
						</div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="row subcategories masonry">
                            	
                                <?php while ( osc_has_latest_items() ) { ?>
                                <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory item">
                                
                                
                                        <?php if( osc_images_enabled_at_items() ) { ?>
                                        <?php if( osc_count_item_resources() ) { ?>
                                                <a href="<?php echo osc_item_url(); ?>">
                                                    <img src="<?php echo osc_resource_original_url(); ?>" width="160" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                                </a>
                                            <?php } else { ?>
                                                <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.png'); ?>" alt="No photo" title="<?php echo osc_item_title(); ?>" width="160" /></a>
                                            <?php } ?>
                                                                                    <?php } ?>

                                    <div class="product-info">
                                     <h6><a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ), 33 ); ?></a></h6>
                                     <h5><?php if( osc_price_enabled_at_items() ) { echo osc_item_formated_price() ; } ?></h5> <strong style="color:#FF9900" title="<?php _e('Premium listings', 'bigio'); ?>"><?php echo (osc_item_is_premium()?" <i class='icons icon-star-3'></i><i class='icons icon-star-3'></i><i class='icons icon-star-3'></i><i class='icons icon-star-3'></i><i class='icons icon-star-3'></i>":""); ?></strong>
                                        
                                    </div>
                                </div>
        

                                <?php } ?>
                          </div>
                           
                        </div>
                        
                        <script src="<?php echo osc_current_web_theme_url('js/imagesloaded.pkgd.min.js') ; ?>"></script>
                        <script src="<?php echo osc_current_web_theme_url('js/masonry.pkgd.min.js') ; ?>"></script>

<script>
  

    var container = $('.masonry').masonry(
            {"isFitWidth": true, "columnWidth": 160, "itemSelector": ".item", "gutter": 17, "stamp": ".stamp"}
    );
    
    container.imagesLoaded( function () {
        container.masonry();
    });

   

</script>

                        <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                        <div><?php echo osc_search_pagination(); ?></div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><a class="button regular blue" href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all listings", 'bigio'); ?> &raquo;</strong></a></div>
                        <?php } ?>
                    <?php View::newInstance()->_erase('items'); } ?>
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
								<i class="icons icon-folder-open-empty"></i>
								<h4><?php _e('Category', 'bigio'); ?></h4>
							</div>
                            
								<ul>
                                 <?php osc_goto_first_category() ; ?>
                                <?php while ( osc_has_categories() ) { ?>
									<li><a href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?>  						
(<?php echo osc_category_total_items() ; ?>)</a> </li> <?php } ?>
									
								</ul>
                               
							</div>                                
							
						</div>
							
					</div>
                    <!-- start regions -->
                    <div class="row sidebar-box green">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<?php if(osc_count_list_regions() > 0 ) { ?>
							<div class="sidebar-box-content">
                            <div class="sidebar-box-heading">
								<i class="icons icon-location"></i>
								<h4><?php _e("Location", 'bigio'); ?></h4>
							</div>
								<ul>
                                 <?php while(osc_has_list_regions() ) { ?>
									<li><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name(); ?>  						
(<?php echo osc_list_region_items(); ?>)</a> </li> <?php } ?>
									
								</ul>
                               
							</div>                                
							
						</div>
						                    <?php } ?>
	
					</div>
                    <!-- end regions -->
					<!-- /Categories -->
				<?php if( osc_get_preference('sidebar-300x250', 'bigio') != '') {?>
                     <div align="center">
                    <?php echo osc_get_preference('sidebar-300x250', 'bigio'); ?>
                    </div>
                <?php } ?>
                <br>
                <?php if( osc_get_preference('facebook-sidebar', 'bigio') != '') {?>
                     <div align="center">
                    <?php echo osc_get_preference('facebook-sidebar', 'bigio'); ?>
                    </div>
               
                <?php } ?>
				</aside>
				<!-- /Sidebar -->
                <? // php osc_current_web_theme_path('inc.main.php') ; ?>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>
