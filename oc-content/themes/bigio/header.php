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
 <?php if( osc_get_preference('facebook-sidebar-js', 'bigio') != '') {?>
 <?php echo osc_get_preference('facebook-sidebar-js', 'bigio'); ?>
 <?php } ?>
<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					
					<!-- Top Header -->
					<div id="top-header">
						
						<div class="row">
							<div class="col-lg-1 col-md-1 col-sm-1"></div>
							<nav id="top-navigation" class="col-lg-5 col-md-5 col-sm-5">
								<ul class="pull-left">
									<li><a href="<?php echo osc_base_url(); ?>"><i class="icons icon-home"></i></a><li><a href="<?php echo osc_contact_url(); ?>"><i class="icons icon-location-7"></i><?php _e('Contact us', 'bigio'); ?></a></li><?php if( osc_get_preference('facebook-top', 'bigio') != '') {?>
                     <li>
                    <a href="<?php echo osc_get_preference('facebook-top', 'bigio'); ?>"><i class="icons icon-facebook"></i></a>
                    </li>
                    <?php } ?>	<?php if( osc_get_preference('twitter-top', 'bigio') != '') {?>
                     <li>
                    <a href="<?php echo osc_get_preference('twitter-top', 'bigio'); ?>"><i class="icons icon-twitter"></i></a>
                    </li>
                    <?php } ?>	<?php if( osc_get_preference('google-top', 'bigio') != '') {?>
                     <li>
                    <a href="<?php echo osc_get_preference('google-top', 'bigio'); ?>"><i class="icons icon-google"></i></a>
                    </li>
                    <?php } ?>	
								</ul>
							</nav>
							
							<nav class="col-lg-5 col-md-5 col-sm-5">
								<ul class="pull-right">
                                <?php if(osc_users_enabled()) { ?>
                <?php if( osc_is_web_user_logged_in() ) { ?>
                   
                        <li><i class="icons icon-user-3"></i><a href="<?php echo osc_user_dashboard_url(); ?>"><?php echo sprintf(__('Hi %s', 'bigio'), osc_logged_user_name() . '!'); ?></a></li>
                        <li><i class="icons icon-cog"></i><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'bigio'); ?></a></li>
                        <li><i class="icons icon-off"></i><a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'bigio'); ?></a></li>
                    
                <?php } else { ?> <?php if(osc_user_registration_enabled()) { ?>
									<li><a href="<?php echo osc_user_login_url(); ?>"><i class="icons icon-login"></i><?php _e('Login', 'bigio'); ?></a> 
										<?php }; ?>
									</li>
                                   <!-- register -->  
                            									<li><a href="<?php echo osc_register_account_url(); ?>"><i class="icons icon-lock"></i><?php _e('Register for a free account', 'bigio'); ?></a>
                                    <?php } ?> <!-- end register --></li>
            <?php } ?>
            <?php if ( osc_count_web_enabled_locales() > 1) { ?>
                <?php osc_goto_first_locale(); ?>
                                    <li><i class="icons icon-flag"></i><a href="#"><?php _e("Language", 'bigio'); ?> <i class="icons icon-down-dir"></i></a>
                                    	
                                        <ul class="box-dropdown parent-arrow">
											<li>
                                            	<div class="box-wrapper no-padding parent-border">
                                                    <table class="language-table">
                                                    	<?php $i = 0;  ?>
                        <?php while ( osc_has_web_enabled_locales() ) { ?><tr>
                                                            <td class="country"><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a>
                           </td>
                                                        </tr><?php $i++; ?>
                        <?php } ?>
                                                    </table>
                                                </div>
											</li>
										</ul>
                                    	 
                                    </li>
                                  <?php } ?>
                                    
								</ul>
							</nav>
                            							<div class="col-lg-1 col-md-1 col-sm-1"></div>
							
						</div>
						
					</div>
					<!-- /Top Header -->
					
				</div>
				
			</div>
<!-- start container our theme -->
		<div class="container">
        <div class="wrapper wrapper-flash" align="center"><?php osc_show_flash_message(); ?></div>
<!-- /start header our theme -->
<header class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					
					<!-- Main Header -->
					<div id="main-header">
						
						<div class="row">
							
							<div id="logo" class="col-lg-4 col-md-4 col-sm-4">
<a id="logo" href="<?php echo osc_base_url(); ?>">
    <?php echo logo_header(); ?>
    </a>							</div>
							
							<nav id="middle-navigation" class="col-lg-8 col-md-8 col-sm-8">
								<ul class="pull-left">
                                        <?php osc_current_web_theme_path('inc.search.php'); ?>
                                        
							  </ul> <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?><ul class="pull-right"><a class="button regular orange" href="<?php echo osc_item_post_url_in_category(); ?>"><?php _e('Publish a listing', 'bigio'); ?></a></ul>
<?php } ?>
							</nav>
							
						</div>
						
					</div>
					<!-- /Main Header -->
					
					
					
					
				</div>
				
			</header>
<!-- /end header our theme -->

<!-- start content our theme -->
			<div class="row content">
            <div class="col-lg-12 col-md-12 col-sm-12" align="center"><?php     osc_show_widgets('header'); ?></div>
				<?php

    $breadcrumb = osc_breadcrumb('<i class="icons icon-right-dir"></i>', false);
    if( $breadcrumb != '') { ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                	<div class="breadcrumbs">
                    	<p><?php echo $breadcrumb; ?></p>
                    </div>
                </div>
                <?php
    }
?>