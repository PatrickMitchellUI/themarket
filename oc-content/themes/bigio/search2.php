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
        <?php if( osc_count_items() == 0 || Params::getParam('iPage') > 0 || stripos($_SERVER['REQUEST_URI'], 'search') )  { ?>
            <meta name="robots" content="noindex, nofollow" />
            <meta name="googlebot" content="noindex, nofollow" />
        <?php } else { ?>
            <meta name="robots" content="index, follow" />
            <meta name="googlebot" content="index, follow" />
        <?php } ?>
            <style>
                ul.sub {
                    padding-left: 20px;
                }
                .chbx{
                    width:15px; height:15px;
                    display: inline;
                    padding:8px 3px;
                    background-repeat:no-repeat;
                    cursor: pointer;
                }
                .chbx span{
                    width:13px; height:13px;
                    display: inline-block;
                    border:solid 1px #bababa;
                    border-radius:2px;
                    -moz-border-radius:2px;
                    -webkit-border-radius:2px;
                }
                .chbx.checked{
                    background-image:url('<?php echo osc_current_web_theme_url('images/checkmark.png'); ?>');
                }
                .chbx.semi-checked{
                    background-image:url('<?php echo osc_current_web_theme_url('images/checkmark-partial.png'); ?>');
                }
            </style>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('li.parent').each(function() {
                        var totalInputSub = $(this).find('ul.sub>li>input').size();
                        var totalInputSubChecked = $(this).find('ul.sub>li>input:checked').size();
                        $(this).find('ul.sub>li>input').each(function(){
                            $(this).hide();
                            var id = $(this).attr('id');
                            id = id+'_';
                            if( $(this).is(':checked') ){
                                var aux = $('<div class="chbx checked"><span></span></div>').attr('id', id);
                                $(this).before(aux);
                            } else {
                                var aux = $('<div class="chbx"><span></span></div>').attr('id', id);
                                $(this).before(aux);
                            }
                        });

                        var input = $(this).find('input.parent');
                        $(input).hide();
                        var id = $(input).attr('id');
                        id = id+'_';
                        if(totalInputSub == totalInputSubChecked) {
                            if(totalInputSub == 0) {
                                if( $(this).find("input[name='sCategory[]']:checked").size() > 0) {
                                    var aux = $('<div class="chbx checked"><span></span></div>').attr('id', id);
                                    $(input).before(aux);
                                } else {
                                    var aux = $('<div class="chbx"><span></span></div>').attr('id', id);
                                    $(input).before(aux);
                                }
                            } else {
                                var aux = $('<div class="chbx checked"><span></span></div>').attr('id', id);
                                $(input).before(aux);
                            }
                        }else if(totalInputSubChecked == 0) {
                            // no input checked
                            var aux = $('<div class="chbx"><span></span></div>').attr('id', id);
                            $(input).before(aux);
                        }else if(totalInputSubChecked < totalInputSub) {
                            var aux = $('<div class="chbx semi-checked"><span></span></div>').attr('id', id);
                            $(input).before(aux);
                        }
                    });

                    $('li.parent').prepend('<span style="width:6px;display:inline-block;" class="toggle">+</span>');
                    $('ul.sub').toggle();

                    $('span.toggle').click(function(){
                        $(this).parent().find('ul.sub').toggle();
                        if($(this).text()=='+'){
                            $(this).html('-');
                        } else {
                            $(this).html('+');
                        }
                    });

                    $("li input[name='sCategory[]']").change( function(){
                        var id = $(this).attr('id');
                        $(this).click();
                        $('#'+id+'_').click();
                    });

                    $('div.chbx').click( function() {
                        var isChecked       = $(this).hasClass('checked');
                        var isSemiChecked   = $(this).hasClass('semi-checked');

                        if(isChecked) {
                            $(this).removeClass('checked');
                            $(this).next('input').prop('checked', false);
                        } else if(isSemiChecked) {
                            $(this).removeClass('semi-checked');
                            $(this).next('input').prop('checked', false);
                        } else {
                            $(this).addClass('checked');
                            $(this).next('input').prop('checked', true);
                        }

                        // there are subcategories ?
                        if($(this).parent().find('ul.sub').size()>0) {
                            if(isChecked){
                                $(this).parent().find('ul.sub>li>div.chbx').removeClass('checked');
                                $(this).parent().find('ul.sub>li>input').prop('checked', false);
                            } else if(isSemiChecked){
                                // if semi-checked -> check-all
                                $(this).parent().find('ul.sub>li>div.chbx').removeClass('checked');
                                $(this).parent().find('ul.sub>li>input').prop('checked', false);
                                $(this).removeClass('semi-checked');
                            } else {
                                $(this).parent().find('ul.sub>li>div.chbx').addClass('checked');
                                $(this).parent().find('ul.sub>li>input').prop('checked', true);
                            }
                        } else {
                            // is subcategory checkbox or is category parent without subcategories
                            var parentLi = $(this).closest('li.parent');

                            // subcategory
                            if($(parentLi).find('ul.sub').size() > 0) {
                                var totalInputSub           = $(parentLi).find('ul.sub>li>input').size();
                                var totalInputSubChecked    = $(parentLi).find('ul.sub>li>input:checked').size();

                                var input    = $(parentLi).find('input.parent');
                                var divInput = $(parentLi).find('div.chbx').first();

                                $(input).prop('checked', false);
                                $(divInput).removeClass('checked');
                                $(divInput).removeClass('semi-checked');

                                if(totalInputSub == totalInputSubChecked) {
                                    $(divInput).addClass('checked');
                                    $(input).prop('checked', true);
                                }else if(totalInputSubChecked == 0) {
                                    // no input checked;
                                }else if(totalInputSubChecked < totalInputSub) {
                                    $(divInput).addClass('semi-checked');
                                }
                            } else {
                                // parent category
                            }
                        }
                    });
                });
            </script>
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <!-- start our content -->
       <!-- Main Content -->
				<section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- start content from search_list.php and gallery.php -->
                         <?php if(osc_count_items() == 0) { ?>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="empty" ><?php printf(__('There are no results matching "%s"', 'bigio'), osc_search_pattern()); ?></p></div>
                    <?php } else { ?>
                        <?php require(osc_search_show_as() == 'list' ? 'search_list.php' : 'search_gallery.php'); ?>
                        <!-- end content from list and gallery pages -->
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="pagination pull-left">
                            <?php echo osc_search_pagination(); ?>
                            </div>
                           <?php } ?>
                        </div>
                        <!-- start footer page search -->
                         <?php $footerLinks = osc_search_footer_links(); ?>
                    
                    <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
                        <?php if($f['total'] < 3) continue; ?>
                       <a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a>
                    <?php } ?>
                        <!-- en footer page search -->
                    </div>
                </section>
				<!-- /Main Content -->
        
        
        <!-- start sidebar our theme -->
        <!-- Sidebar -->
				<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
                    
					<!-- Categories -->
				  <div class="row sidebar-box green">
						
					<div class="col-lg-12 col-md-12 col-sm-12">
							<?php $spubcat = get_categoriesHierarchy(); ?>
                    	<?php if (!isset($spubcat[2]) && !isset($spubcat[1]) && isset($spubcat[0])){ ?>
                        <div class="sidebar-box-content">
                    		<div class="sidebar-box-heading">
								<i class="icons icon-folder-open-empty"></i>
							<h4><?php _e('<a href="' . $spubcat[0]["url"] . '">' .  $spubcat[0]["s_name"] . '</a> (' . get_category_num_items($spubcat[0]) . ')' , 'bigio') ; ?> </h4>
						</div><!--end titleheaderbg-->
							
							
							
                            <!-- here starting -->
                     <?php ; echo '
<ul>';
                    		 foreach(get_subcategories() as $subcat) {
					echo "<li><a class='linkcolorbg' href='".$subcat["url"]."'>".$subcat["s_name"]." (" . get_category_num_items($subcat) . ")</a></li>";
				 }
				 echo '</ul></div>';
                    		 } 
                    	elseif (!isset($spubcat[2]) && isset($spubcat[1]) && isset($spubcat[0])) { ?>
                        <div class="sidebar-box-content">							
						<div class="sidebar-box-heading">
							<h4><?php _e('<a href="' . $spubcat[1]["url"] . '">' .  $spubcat[1]["s_name"] . '</a> (' . get_category_num_items($spubcat[1]) . ')' , 'bigio') ; ?></h4>
						</div><!--end titleheaderbg-->

                        <ul>
                    		
                    		<li> <?php _e('<a class="linkcolorbg3" href="' . $spubcat[0]["url"] . '">' .  $spubcat[0]["s_name"] . ' (' . get_category_num_items($spubcat[0]) . ')' , 'bigio') ; ?></a></li></ul>
							<?php ; echo '<ul>';
                    		 foreach(get_subcategories() as $subcat) {
					
					echo "<li><a class='linkcolorbg' href='".$subcat["url"]."'>".$subcat["s_name"]."</a> (" . get_category_num_items($subcat) . ")</li>";
				 }
				 echo '</ul></div>';
                    		}
                    	else { ?>
                    	<?php if (isset($spubcat[2])){ ?> <h1><strong> <?php _e('<a href="' . $spubcat[2]["url"] . '">' .  $spubcat[2]["s_name"] . '</a> (' . get_category_num_items($spubcat[2]) . ')' , 'bigio') ; ?> </strong></h1><?php ; } ?>
                   	  <ul>
                    	<?php if (isset($spubcat[1])){ ?> <li><h2><strong> <?php _e('<a href="' . $spubcat[1]["url"] . '">' .  $spubcat[1]["s_name"] . '</a> (' . get_category_num_items($spubcat[1]) . ')' , 'bigio') ; ?> </strong></h2></li><?php ; } ?>
                    	<?php if (isset($spubcat[0])){ ?> <li class="lastchild"><h4><strong> <?php _e('<a href="' . $spubcat[0]["url"] . '">' .  $spubcat[0]["s_name"] . '</a> (' . get_category_num_items($spubcat[0]) . ')' , 'bigio') ; ?> </strong></h4></li><?php ; } ?>
                   <?php } ?> </ul></div>
					
							</div>

							
					<!-- /Categories -->
                    <br>
                    <!-- filters -->

                    
                    
                    <div class="sidebar-box-content sidebar-padding-box">
                    <form action="<?php echo osc_base_url(true); ?>" method="get" onSubmit="return doSearch()" class="nocsrf">
                        <input type="hidden" name="page" value="search" />
                        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
                        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting(); echo osc_esc_html($allowedTypesForSorting[osc_search_order_type()]); ?>" />
                        <?php foreach(osc_search_user() as $userId) { ?>
                            <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
                        <?php } ?>
                            <?php _e('Your search', 'bigio'); ?>
                           
                                <input type="text" name="sPattern" id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" />
                                <div id="search-example"></div>
                            
                            <?php _e('Location', 'bigio'); ?>
                            
                               <?php _e('City', 'bigio'); ?>
                                <input type="text" id="sCity" name="sCity" value="<?php echo osc_esc_html( osc_search_city() ); ?>" />
                                <input type="hidden" id="sRegion" name="sRegion" value="" />
                           
<br>
                        
                            <?php if( osc_images_enabled_at_items() ) { ?>
                            <div>
                                <ul>
                                    <li>
                                        <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
                                        <label for="withPicture"><?php _e('Show only listings with pictures', 'bigio'); ?></label>
                                    </li>
                                </ul>
                            </div>
                            <?php } ?>
                            <?php if( osc_price_enabled_at_items() ) { ?>
                            <div>
                                <?php _e('Price', 'bigio'); ?>
                                <?php _e('Min', 'bigio'); ?>.
                                <input type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="1" maxlength="6" />
                                <?php _e('Max', 'bigio'); ?>.
                                <input type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="1" maxlength="6" />
                            </div>
                            <?php } ?>
                            <?php  osc_get_non_empty_categories(); ?>
                            <?php  if ( osc_count_categories() ) { ?>
                                <div class="checkboxes">
                                    <?php _e('Category', 'bigio'); ?>
                                    <ul>
                                        <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                                        <?php osc_goto_first_category(); ?>
                                        <?php while(osc_has_categories()) { ?>
                                            <li class="parent">
                                                <input class="parent" type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>" <?php $parentSelected=false; if (in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){ echo 'checked="checked"'; $parentSelected=true;} ?> /> <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                                               
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php
                            if(osc_search_category_id()) {
                                osc_run_hook('search_form', osc_search_category_id());
                            } else {
                                osc_run_hook('search_form');
                            }
                        ?>
                        <input type="submit" value="<?php _e('Apply', 'bigio'); ?>">
                        <input class="dark-blue" type="reset" value="Reset">
                    </form>
                    <?php osc_alert_form(); ?>
                    
                    
                    
                       	<label>Categories</label><br>
                        <select class="chosen-select-full-width">
                           	<option>Category 1</option>
                        </select>
                        <br><br>
                        <label>Manufacturers</label><br>
                        <input type="checkbox" id="categorymanufacturer1"><label for="categorymanufacturer1">Lorem <span class="grey">(12)</span></label><br>
                               
                        <br>
                        <label>Price</label>
                       	<div class="noUiSlider" data-min-range="30" data-max-range="200" data-min-value="80" data-max-value="150"></div>
						<span class="price-range-min"></span>
						<span class="price-range-max"></span>
                        <br><br>
                        <label>Color</label><br>
						<input id="checkbox-color-white" type="checkbox"><label class="color-checkbox white" for="checkbox-color-white"></label>
                               
                        <br><br>
                        <input type="submit" value="Show">
                        <input class="dark-blue" type="reset" value="Reset">
                    </div>
                  <!-- /filters -->
                  <br>
					<?php if( osc_get_preference('sidebar-300x250', 'bigio') != '') {?>
                     <div align="center">
                    <?php echo osc_get_preference('sidebar-300x250', 'bigio'); ?>
                    </div>
                    <?php } ?> </div>
	</aside>
				<!-- /Sidebar -->
        <!-- end sidebar our theme -->
        
        
        
        
        
        
        <!-- old content -->
        
            <div id="sidebar">
                <div class="filters">
                    <form action="<?php echo osc_base_url(true); ?>" method="get" onSubmit="return doSearch()" class="nocsrf">
                        <input type="hidden" name="page" value="search" />
                        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
                        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting(); echo osc_esc_html($allowedTypesForSorting[osc_search_order_type()]); ?>" />
                        <?php foreach(osc_search_user() as $userId) { ?>
                            <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
                        <?php } ?>
                        <fieldset class="box location">
                            <h3><strong><?php _e('Your search', 'bigio'); ?></strong></h3>
                            <div class="row one_input">
                                <input type="text" name="sPattern" id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" />
                                <div id="search-example"></div>
                            </div>
                            <h3><strong><?php _e('Location', 'bigio'); ?></strong></h3>
                            <div class="row one_input">
                                <h6><?php _e('City', 'bigio'); ?></h6>
                                <input type="text" id="sCity" name="sCity" value="<?php echo osc_esc_html( osc_search_city() ); ?>" />
                                <input type="hidden" id="sRegion" name="sRegion" value="" />
                            </div>
                        </fieldset>

                        <fieldset class="box show_only">
                            <?php if( osc_images_enabled_at_items() ) { ?>
                            <h3><strong><?php _e('Show only', 'bigio'); ?></strong></h3>
                            <div class="row checkboxes">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
                                        <label for="withPicture"><?php _e('Show only listings with pictures', 'bigio'); ?></label>
                                    </li>
                                </ul>
                            </div>
                            <?php } ?>
                            <?php if( osc_price_enabled_at_items() ) { ?>
                            <div class="row two_input">
                                <h6><?php _e('Price', 'bigio'); ?></h6>
                                <div><?php _e('Min', 'bigio'); ?>.</div>
                                <input type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
                                <div><?php _e('Max', 'bigio'); ?>.</div>
                                <input type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
                            </div>
                            <?php } ?>
                            <?php  osc_get_non_empty_categories(); ?>
                            <?php  if ( osc_count_categories() ) { ?>
                                <div class="row checkboxes">
                                    <h6><?php _e('Category', 'bigio'); ?></h6>
                                    <ul>
                                        <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                                        <?php osc_goto_first_category(); ?>
                                        <?php while(osc_has_categories()) { ?>
                                            <li class="parent">
                                                <input class="parent" type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>" <?php $parentSelected=false; if (in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){ echo 'checked="checked"'; $parentSelected=true;} ?> /> <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                                                <?php if(osc_count_subcategories() > 0) { ?>
                                                <ul class="sub">
                                                    <?php while(osc_has_subcategories()) { ?>
                                                    <li>
                                                    <input type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>"  <?php if( $parentSelected || in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){echo 'checked="checked"';} ?> />
                                                    <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </fieldset>
                        <?php
                            if(osc_search_category_id()) {
                                osc_run_hook('search_form', osc_search_category_id());
                            } else {
                                osc_run_hook('search_form');
                            }
                        ?>
                        <button type="submit"><?php _e('Apply', 'bigio'); ?></button>
                    </form>
                    <?php osc_alert_form(); ?>
                </div>
            </div>
            <script type="text/javascript">
                $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php _e('Selected', 'bigio'); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php _e('Nothing selected, input was', 'bigio'); ?> " + this.value );
                        }
                    });
                });

                function checkEmptyCategories() {
                    var n = $("input[id*=cat]:checked").length;
                    if(n>0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
