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
							<h4><?php _e('Page not found', 'bigio'); ?></h4>
							</div>
                           
                       
                            <div class="categories-heading" align="center">
                                <!-- header ad 728x60-->

<!-- /header ad 728x60-->
                            </div>
							
						</div>
						<!-- /Heading -->
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <h1 align="center"><?php _e('Page not found', 'bigio'); ?></h1>
                           
                        </div>
                        
                       
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
<span class="badge pull-right">(<?php echo osc_category_total_items() ; ?>)</span></a> </li> <?php } ?>
									  
								</ul>
                               
							</div>                                
							
						</div>
							
					</div>
                    
					<!-- /Categories -->
				
				</aside>
				<!-- /Sidebar -->
                <? // php osc_current_web_theme_path('inc.main.php') ; ?>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>