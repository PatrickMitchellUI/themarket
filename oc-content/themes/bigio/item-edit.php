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

        <!-- only item-edit.php -->
        <?php ItemForm::location_javascript(); ?>
        <?php
        if(osc_images_enabled_at_items() && !modern_is_fineuploader()) {
            ItemForm::photos_javascript();
        }
        ?>
        <script type="text/javascript">

            $(document).ready(function(){
                $('body1').on("created", '[name^="select_"]',function(evt) {
                    $(this).uniform();
                });
                $('body1').on("removed", '[name^="select_"]',function(evt) {
                    $(this).parent().remove();
                });
            });

            function uniform_input_file(){
                photos_div = $('div.photos');
                $('div',photos_div).each(
                    function(){
                        if( $(this).find('div.uploader').length == 0  ){
                            divid = $(this).attr('id');
                            if(divid != 'photos'){
                                divclass = $(this).hasClass('box');
                                if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                                    $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
                                }
                            }
                        }
                    }
                );
            }

            setInterval("uniform_plugins()", 250);
            function uniform_plugins() {

                var content_plugin_hook = $('#plugin-hook').text();
                content_plugin_hook = content_plugin_hook.replace(/(\r\n|\n|\r)/gm,"");
                if( content_plugin_hook != '' ){

                    var div_plugin_hook = $('#plugin-hook');
                    var num_uniform = $("div[id*='uniform-']", div_plugin_hook ).size();
                    if( num_uniform == 0 ){
                        if( $('#plugin-hook input:text').size() > 0 ){
                            $('#plugin-hook input:text').uniform();
                        }
                        if( $('#plugin-hook select').size() > 0 ){
                            $('#plugin-hook select').uniform();
                        }
                    }
                }
            }
            <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
            $().ready(function(){
                $("#price").blur(function(event) {
                    var price = $("#price").prop("value");
                    <?php if(osc_locale_thousands_sep()!='') { ?>
                    while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                        price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
                    }
                    <?php }; ?>
                    <?php if(osc_locale_dec_point()!='') { ?>
                    var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
                    if(tmp.length>2) {
                        price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
                    }
                    <?php }; ?>
                    $("#price").prop("value", price);
                });
            });
            <?php }; ?>
        </script>
        <!-- end only item-edit.php -->
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <!-- our theme content -->
        <section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
                        
                    <div class="row">
                    	
						
                        <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><?php _e('Update your listing', 'bigio'); ?></h4>
                            </div>
                            
                            <div class="page-content">
                             <ul id="error_list"></ul>
                            <form name="item" action="<?php echo osc_base_url(true)?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="item_edit_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                    <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                            	<div class="row">
                                	
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    	<p><strong><?php _e('General Information', 'bigio'); ?></strong></p>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Category', 'bigio'); ?> *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php ItemForm::category_multiple_selects(null, null, __('Select a category', 'bigio')); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php ItemForm::multilanguage_title_description(osc_get_locales()); ?>
                                    </div>	
                                    
                                </div>
                                 <?php if( osc_price_enabled_at_items() ) { ?>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Price', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <?php ItemForm::price_input_text(); ?>
                                    <?php ItemForm::currency_select(); ?>
                                    </div>	
                                </div><?php } ?>
                                <br>
                                
                                <?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Photos', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                            <?php
                            if(osc_images_enabled_at_items()) {
                                if(modern_is_fineuploader()) {
                                    // new ajax photo upload
                                    ItemForm::ajax_photos();
                                }
                            } else { ?>
                            <p><?php _e('Photos', 'bigio'); ?></p>
                            </div>	</div>
                            
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Photos', 'bigio'); ?></p>
                                    </div>
                                    <?php ItemForm::photos(); ?>
                                    <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                    <input type="file" name="photos[]" />
                                    </div>	<?php }; ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    <a href="#" onClick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'bigio'); ?></a>
                        <?php
                            }
                        }
                        ?>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    	<p><strong><?php _e('Location', 'bigio'); ?></strong></p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Country', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                   
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Region', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php ItemForm::region_select(osc_get_regions(osc_user_country()), osc_user()) ; ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('City', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php ItemForm::city_select(osc_get_cities(osc_user_region_id()), osc_user()) ; ?>
                                    </div>	
                                    
                                </div>
                                <br>
                                <div class="row">
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('City area', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php ItemForm::city_area_text(); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p><?php _e('Address', 'bigio'); ?></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php ItemForm::address_text(); ?>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                   <?php ItemForm::plugin_edit_item(); ?>
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
                                <?php osc_show_recaptcha(); ?>                                    </div>	
                                    
                                </div>                        <?php }?>
                                
                                
                                
                                
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p></p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    <input class="itemFormButton" type="submit" value="<?php _e('Update', 'bigio'); ?>">
                                    &nbsp;<a href="javascript:history.back(-1)" class="go_back"><?php _e('Cancel', 'bigio'); ?></a>
                                    </div>	
                                    
                                    
                                </div>
                            </div> </form><!-- forms end -->
                            
                    	</div>
                        
                    </div>
                   
						
				</section>
				<!-- /Main Content -->
				
				
				
				
				<!-- Sidebar -->
				<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
                    
					<!-- Categories -->
					<div class="row sidebar-box green">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="sidebar-box-content"><?php if( osc_users_enabled() ) { ?>
            <?php if( osc_is_web_user_logged_in() ) { ?>
            <div class="sidebar-box-heading">
								<i class="icons icon-cog"></i>
								<h4><?php _e('My account', 'bigio'); ?></h4>
							</div>
                                <?php echo osc_private_user_menu( get_user_menu() ); ?>
                                 <?php } else { ?>
                                 <div class="">
                            	<a href="<?php echo osc_user_login_url(); ?>">
				<div class="right-side-banner banner-item">
					<h5 align="center"><?php _e("Log in", 'bigio');?></h5>
				</div>
				</a>
							</div>
                
                <?php if(osc_user_registration_enabled()) { ?>
                    <div class="">
                            	<a href="<?php echo osc_register_account_url(); ?>">
				<div class="right-side-banner banner-item">
					<h5 align="center"><?php _e("Register for a free account", 'bigio'); ?></h5>
				</div></a>
							</div>
                <?php }; ?>
            <?php } ?>
            <?php } ?>                  
							</div>
							
							
						</div>
							
					</div>
					<!-- /Categories -->
                   
				</aside>
				<!-- /Sidebar -->
        <!-- end our theme content -->
        
        <?php osc_current_web_theme_path('footer-custom.php'); ?>
    </body>
</html>