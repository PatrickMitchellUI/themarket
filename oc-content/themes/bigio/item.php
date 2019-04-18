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

    osc_enqueue_script('fancybox');
    osc_enqueue_style('fancybox', osc_assets_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('jquery-validate');

?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        
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
    
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("a[rel=image_group]").fancybox({
                    openEffect : 'none',
                    closeEffect : 'none',
                    nextEffect : 'fade',
                    prevEffect : 'fade',
                    loop : false,
                    helpers : {
                            title : {
                                    type : 'inside'
                            }
                    }
                });
            });
        </script>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <!-- start new content -->
        <!-- Main Content -->
				<section class="main-content col-lg-9 col-md-9 col-sm-9">
                    <div id="product-single">
						<div class="product-single">
							
							<div class="row">
								
								<div class="col-lg-5 col-md-5 col-sm-5 product-single-info">
									
									<h2><?php echo osc_item_title(); ?></h2>
									<div class="">
										<?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><span class="price"><?php echo osc_item_formated_price(); ?></span> <?php } ?>
									</div><br>
									<table>
										<tr>
											<td><strong><i class="icons icon-folder-empty"></i><?php echo osc_item_category(); ?></strong></td>
										</tr>
										<tr>
											<td><strong><i class="icons icon-calendar"></i><?php if ( osc_item_pub_date() != '' ) echo __('', '') . ' ' . osc_format_date( osc_item_pub_date() ); ?></strong></td>
										</tr>
										<tr>
											<td><strong><?php if ( osc_item_country() != "" ) { ?><?php _e("Country", 'bigio'); ?></strong>: <?php echo osc_item_country(); ?><?php } ?></td>
										</tr>
                                        <tr>
											<td><strong><?php if ( osc_item_region() != "" ) { ?><?php _e("Region", 'bigio'); ?></strong>: <?php echo osc_item_region(); ?><?php } ?></td>
										</tr>
                                         <tr>
											<td><strong><?php if ( osc_item_city() != "" ) { ?><?php _e("City", 'bigio'); ?></strong>: <?php echo osc_item_city(); ?><?php } ?></td>
										</tr>
                                         <tr>
											<td><strong><?php if ( osc_item_city_area() != "" ) { ?><?php _e("Suburb", 'bigio'); ?></strong>: <?php echo osc_item_city_area(); ?><?php } ?></td>
										</tr>
                                        <tr>
											<td><strong><?php if ( osc_item_address() != "" ) { ?><?php _e("Address", 'bigio'); ?></strong>: <?php echo osc_item_address(); ?><?php } ?></td>
										</tr>
									</table>
									
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7 product-single-image">
									
									<div id="product-slider">
										<ul class="slides">

       							<li><?php if( osc_images_enabled_at_items() ) { ?>
        <?php
        if( osc_count_item_resources() > 0 ) {
            $i = 0;
        ?>
                        <a href="<?php echo osc_resource_url(); ?>" class="fullscreen-button" data-large="<?php echo osc_resource_url(); ?>" title="<?php _e('Image', 'bigio'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
                <img src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" data-large="<?php echo osc_resource_url(); ?>" title="<?php echo osc_item_title(); ?>" />
            </a>
                        <?php } ?>
												
											<?php } ?></li> 
                
                <?php if(osc_count_item_resources()) { ?>
                    <?php } else { ?>
                      <li>  <img class="fullscreen-button" src="<?php echo osc_current_web_theme_url('images/no_photo.png') ; ?>" data-large="<?php echo osc_current_web_theme_url('images/no_photo.png') ; ?>" title="No picture" /></li>
                    <?php } ?>
										</ul>
									</div><?php
        if( osc_count_item_resources() > 0 ) {
            $i = 0;
        ?>
									<div id="product-carousel">
									<ul class="slides">
										<?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?><li>     
                <a href="<?php echo osc_resource_url(); ?>" class="fancybox" rel="product-images" title="<?php _e('Image', 'bigio'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>"></a>
                    <img src="<?php echo osc_resource_thumbnail_url(); ?>" data-large="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                
                                               
											
										</li><?php } ?>
									</ul>
									<div class="product-arrows">
										<div class="left-arrow">
											<i class="icons icon-left-dir"></i>
										</div>
										<div class="right-arrow">
											<i class="icons icon-right-dir"></i>
										</div>
									</div>
								</div><?php } ?>
								</div>
								
							</div>
							
						</div>
						
						<div class="row">
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="tabs">
									<div class="page-content tab-content">
										
										<div id="tab1">
                                        <strong><?php _e('Description', 'bigio'); ?>:</strong>
											<p><?php echo osc_item_description(); ?></p>
                                            <div id="custom_fields">
                        <?php if( osc_count_item_meta() >= 1 ) { ?>
                            <div class="meta_list">
                                <?php while ( osc_has_item_meta() ) { ?>
                                    <?php if(osc_item_meta_value()!='') { ?>
                                        <div class="meta">
                                            <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php osc_run_hook('item_detail', osc_item() ); ?>
											
   <br>
					<div class="row button-row">
						
						<div class="col-lg-9 col-md-9 col-sm-9">
						
                         <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
    <a class="button red" href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bigio'); ?></a>                                 
											<?php } else { ?> 
                                           <a href="javascript:;" class=" button grey" onClick="Show_Div(Div_1)"><i class="icons icon-warning"></i><?php _e('Useful information', 'bigio'); ?></a><?php }; ?> <?php if( osc_comments_enabled() ) { ?><?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?> <a href="#comments1" class=" button grey" onClick="Show_Div(Div_2)"><i class="icons icon-comment-7"></i><?php _e('Comments', 'bigio'); ?> (<?php echo osc_count_item_comments(); ?>)</a><?php } ?><?php } ?>
    <br>
    <div id="Div_1" style="display: none;">
        <li><?php _e('Avoid scams by acting locally or paying with PayPal', 'bigio'); ?></li>
                        <li><?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'bigio'); ?></li>
                        <li><?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'bigio'); ?></li>
                        <li><?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'bigio'); ?></li>
    </div>
                   </div>
						<div class="col-lg-3 col-md-3 col-sm-3 pull-right">
                      <select class="chosen-select" name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
                      <option><?php _e('Mark as...', 'bigio'); ?></option>
                      <option value="<?php echo osc_item_link_spam(); ?>"> <?php _e('Mark as spam', 'bigio'); ?></option>
                      <option value="<?php echo osc_item_link_bad_category(); ?>"> <?php _e('Mark as misclassified', 'bigio'); ?></option>
                      <option value="<?php echo osc_item_link_repeated(); ?>"> <?php _e('Mark as duplicated', 'bigio'); ?></option>
                      <option value="<?php echo osc_item_link_expired(); ?>"> <?php _e('Mark as expired', 'bigio'); ?></option>
                      <option value="<?php echo osc_item_link_offensive(); ?>"> <?php _e('Mark as offensive', 'bigio'); ?></option></select>
						</div>
					
					</div>
													
												</div>
												
											</div>
										</div>
										
									</div>
									
								</div>
								
							</div><div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
							<div class="acordion" id="Div_2" style="display: none;">
								
								<ul>
									
									<li>
										<a id="comments1"></a>
											<div class="accordion-header">
											<h4><i class="icons icon-comment-7"></i> <?php _e('Comments', 'bigio'); ?> (<?php echo osc_count_item_comments(); ?>)</h4>
											
										</div>
										
										<div class="accordion-content page-content">
											 <?php if( osc_comments_enabled() ) { ?>
                    <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
                    <ul class="comments">
                    <?php CommentForm::js_validation(); ?>
                        <?php if( osc_count_item_comments() >= 1 ) { ?>
                                                        <?php while ( osc_has_item_comments() ) { ?>
												<li><ul><li>
													<p><?php echo osc_comment_title(); ?> <?php _e("by", 'bigio'); ?> <strong><?php echo osc_comment_author_name(); ?>:</strong></p>
													<span class="date"><?php echo osc_comment_pub_date(); ?></span>
													<p><?php echo nl2br( osc_comment_body() ); ?> </p>
                                        <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                                        <p>
                                            <a class="red" rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'bigio'); ?>"><?php _e('Delete', 'bigio'); ?></a>
                                        </p>
                                        <?php } ?>
    
												</li></ul></li><?php } ?>
                                               
											</ul> <?php } ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="pagination pull-left">
                                    <?php echo osc_comments_pagination(); ?>
                                </div>
                       </div>
											
											<br/>
											<div class="row">
												
												<div class="col-lg-12 col-md-6 col-sm-8">
                                                <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                           
                                <h4><?php _e('Leave your comment (spam and offensive messages will be removed)', 'bigio'); ?></h4>
                                <input type="hidden" name="action" value="add_comment" />
                                <input type="hidden" name="page" value="item" />
                                <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                <?php if(osc_is_web_user_logged_in()) { ?>
                                    <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                    <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                                <?php } else { ?>
                                    <label for="authorName"><?php _e('Your name', 'bigio'); ?>:</label> <?php CommentForm::author_input_text(); ?><br />
                                    <label for="authorEmail"><?php _e('Your e-mail', 'bigio'); ?>:</label> <?php CommentForm::email_input_text(); ?><br />
                                <?php }; ?>
                                <label for="title"><?php _e('Title', 'bigio'); ?>:</label><?php CommentForm::title_input_text(); ?><br />
                                <label for="body"><?php _e('Comment', 'bigio'); ?>:</label><?php CommentForm::body_input_textarea(); ?><br />
                               
                                <input type="submit" class="blue" value="<?php _e('Send', 'bigio'); ?>">
                            
                        </form>
                   
												</div>
												
											</div>
										</div>  <?php } ?>
                <?php } ?>
									</li>
									
								</ul>
							</div>
							
                        </div>
                        
                    </div>
						                    <?php if (function_exists('related_ads_start')) {related_ads_start();} ?> 

                 <!-- adsense start -->
                    <?php if( osc_get_preference('homepage-728x90', 'bigio') != '') { ?>
<!-- homepage ad 728x60-->
<div class="" align="center">
    <?php echo osc_get_preference('homepage-728x90', 'bigio'); ?>
</div>
<!-- /homepage ad 728x60-->
<?php } ?>
                    <!-- adsense end -->
					
				</section>
				<!-- /Main Content -->
				
				<!-- Sidebar -->
				<aside class="sidebar right-sidebar col-lg-3 col-md-3 col-sm-3">
					<div class="row sidebar-box blue">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="sidebar-box-heading">
                            	<i class="icons icon-contacts"></i>
                                <a id="sidebar"></a>
								<h4><?php _e("Contact Dealer", 'bigio'); ?></h4>
							</div>
							<div class="sidebar-box-content">
                                <div class="page-content contact-form">
                    <?php if( osc_item_is_expired () ) { ?>
                        <p>
                            <?php _e("The listing is expired. You can't contact the publisher.", 'bigio'); ?>
                        </p>
                    <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
                        <p>
                            <?php _e("It's your own listing, you can't contact the publisher.", 'bigio'); ?>
                        </p>
                        <?php echo osc_private_user_menu( get_user_menu() ); ?>
                    <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                        <p>
                            <?php _e("You must log in or register a new account in order to contact the advertiser", 'bigio'); ?>
                        </p>
                        <p class="contact_button">
                            <strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'bigio'); ?></a></strong>
                            <strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'bigio'); ?></a></strong>
                        </p>
                    <?php } else { ?>
                        <?php if( osc_item_user_id() != null ) { ?>
                        
                            <p class="name"><?php _e('Name', 'bigio') ?>: <i class="icons icon-user"></i><strong><a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></strong></p>
                        <?php } else { ?>
                            <p class="name"><?php _e('Name', 'bigio') ?>: <?php echo osc_item_contact_name(); ?></p>
                        <?php } ?>
                        <?php if( osc_item_show_email() ) { ?>
                            <p class="email"><?php _e('E-mail', 'bigio'); ?>: <?php echo osc_item_contact_email(); ?></p>
                        <?php } ?>
                        <?php if ( osc_user_phone() != '' ) { ?>
                            <p class="phone"><?php _e("Tel", 'bigio'); ?>.: <?php echo osc_user_phone(); ?></p>
                        <?php } ?>
                        <ul id="error_list"></ul>
                        <?php ContactForm::js_validation(); ?>
                       <div align="center"> <a href="javascript:;" class=" button grey" onClick="Show_Div(Div_3)"><i class="icons icon-email"></i><?php _e('How To Contact', 'bigio'); ?></a></div>
                        <div class="acordion" id="Div_3" style="display: none;">
                        <form <?php if( osc_item_attachment() ) { ?>enctype="multipart/form-data"<?php } ?> action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                            <?php osc_prepare_user_info(); ?>
                                <label for="yourName"><?php _e('See the "Link To Social" section below listing
                                (we are working on a better way to do this) <3', 'bigio'); ?><div id="custom_fields">
                        <?php if( osc_count_item_meta() >= 1 ) { ?>
                            <div class="meta_list">
                                <?php while ( osc_has_item_meta() ) { ?>
                                    <?php if(osc_item_meta_value()!='') { ?>
                                        <div class="meta">
                                            <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div></label>
                                <input type="hidden" name="action" value="contact_post" />
                                <input type="hidden" name="page" value="item" />
                                <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
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
                                <?php osc_show_recaptcha(); ?><br>
                        </form></div>
                    <?php } ?>
                                            </div>
							</div>
						</div>
						
					</div>
                    <?php if (function_exists('sellers_latest_ads_start')) {sellers_latest_ads_start();} ?> 
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
               
                <?php } ?>		</aside>
				<!-- /Sidebar -->
                <!-- end new content -->
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
