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
<!-- start new content -->
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
                                <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>"><i class="icons icon-th-list-4"></i></a>
                   <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>"><i class="icons icon-th-3 active-button"></i></a>
								</div>
							</div><div class="categories-heading" align="center"><?php osc_run_hook('search_ads_listing_top'); ?></div>                            <div class="row subcategories masonry">

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

                                 <?php while(osc_has_premiums()) { ?>
                                <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory item">
                                    <?php if( osc_images_enabled_at_items() ) { ?>
                                	<?php if(osc_count_premium_resources()) { ?>
                        <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_original_url(); ?>" width="160" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" /></a>
                    <?php } else { ?>
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.png'); ?>" width="160" title="" alt="" />
                    <?php } ?>      <?php } ?>

                                    <div class="product-info">
                                        <h6><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ), 33 ); ?></a></h6>
                                        <h5><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { echo osc_premium_formated_price() ; } ?></h5><strong style="color:#FF9900" title="<?php _e('Premium listings', 'bigio'); ?>"><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i><i class="icons icon-star-3"></i></strong>
                                    </div>
                                    
                                </div><?php } ?><?php } ?>
                                
                                        <?php while(osc_has_items()) { ?>
                                <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory item">
                                	<?php if( osc_images_enabled_at_items() ) { ?>
                     <?php if(osc_count_item_resources()) { ?>
                        <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_original_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" width="160" /></a>
                    <?php } else { ?>
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.png'); ?>" width="160" title="" alt="" />
                    <?php } ?>    
                                                    <?php } ?>
                                    <div class="product-info">
                                        <h6><a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ), 33 ); ?></a></h6>
                                        <h5><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price() ; } ?></h5>
                                    </div>
                                    
                                </div>                 <?php } ?>
                                
                            </div>
                            
                        </div>
                        
                    </div>
<!-- end new content -->
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