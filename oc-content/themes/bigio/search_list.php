<script type="text/javascript">
        function Show_Div(Div_id) {
            if (false == $(Div_id).is(':visible')) {
                $(Div_id).show(250);
            }
            else {
                $(Div_id).hide(250);
            }
        }
    </script>
<div class="row"> 
                   
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="carousel-heading">
								<h4><strong><?php echo search_title(); ?></strong> <a href="javascript:;" onClick="Show_Div(Div_1)"><?php _e('Sort by', 'bigio'); ?>:<i class="icons icon-sort"></i></a></h4>
<div id="Div_1" style="display: none;">                                <?php $i = 0; ?>
                                <?php $orders = osc_list_orders();
                                foreach($orders as $label => $params) {
                                    $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                    <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                        <a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a>
                                    <?php } else { ?>
                                        <a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a>
                                    <?php } ?>
                                    <?php if ($i != count($orders)-1) { ?>
                                        |
                                    <?php } ?>
                                    <?php $i++; ?>
                                <?php } ?></div>
                                <div class="category-buttons">
                                <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>"><i class="icons icon-th-list-4 active-button"></i></a>
                   <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>"><i class="icons icon-th-3"></i></a>
								</div>
                                
							</div>
                            <div class="categories-heading" align="center"><?php osc_run_hook('search_ads_listing_top'); ?></div>
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

    osc_get_premiums();
    if(osc_count_premiums() > 0) {
?>
<!-- start new content -->

                                <?php while(osc_has_premiums()) { ?>
                            <div class="grid-view product">
                                <?php if( osc_images_enabled_at_items() ) { ?>
                                <div class="product-image col-lg-3 col-md-3 col-sm-3">
                                <?php if(osc_count_premium_resources()) { ?>
                        <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" /></a>
                    <?php } else { ?>
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.png'); ?>" title="" alt="" />
                    <?php } ?>
                                </div>
                                <?php } ?>
                                <div class="col-lg-9 col-md-9 col-sm-9 product-content no-padding">
                               	  <div class="product-info">
                                        <h5> <a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ) ); ?></a></h5>
                                        <?php _e("Price", "bigio"); ?>
                                        : <span class="price">
                                        <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { echo osc_premium_formated_price(); ?>
                                        </span> 
                                           <span>&nbsp;<?php } echo osc_premium_city(); ?> (<i class="icons icon-location-7"></i><?php echo osc_premium_region(); ?>) - <i class="icons icon-calendar"></i><?php echo osc_format_date(osc_premium_pub_date()); ?></span>
                                    <div class="rating-box">
											<span><strong style="color:#FF9900" title="<?php _e('Premium listings', 'bigio'); ?>"><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i></strong></span>
									</div>
                                        <p><?php echo osc_highlight( strip_tags( osc_premium_description() ), 150 ); ?></p>		
								  </div> 
                                     
                                    
                                    
                                    <div class="product-actions full-width">
                                        <span >
                                            <span >
                                                <i class="icons icon-folder-open-empty"></i>
                                                <span ><?php $aCategory = osc_get_category('id', osc_premium_category_id());
                $parentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);

             View::newInstance()->_erase('categories');
             View::newInstance()->_erase('subcategories');
             View::newInstance()->_exportVariableToView('category', $parentCategory);

            echo osc_category_name(); ?><i class="icons icon-right-dir"></i> <?php echo osc_item_category();?></span>
                                            </span>
                                        </span>
                                    </div>
                                    
                            	</div>
                            </div>
                                                                <?php } ?>
                        </div>
                      
                    </div>
                     <?php } ?>
                    <!-- normal ads -->
                    <div class="row"> 
                   
                        <div class="col-lg-12 col-md-12 col-sm-12">
                         <?php while(osc_has_items()) { $i++; ?>
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
                            </div> <?php } ?>
                            
                        </div> 
                        </div>