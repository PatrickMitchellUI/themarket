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

		define('BIGIO_THEME_VERSION', '1.0');

    osc_enqueue_script('php-date');

    if( !OC_ADMIN ) {
        if( !function_exists('add_close_button_action') ) {
            function add_close_button_action(){
                echo '<script type="text/javascript">';
                    echo '$(".flashmessage .ico-close").click(function(){';
                        echo '$(this).parent().hide();';
                    echo '});';
                echo '</script>';
            }
            osc_add_hook('footer', 'add_close_button_action');
        }
    }

    function theme_modern_actions_admin() {
        if( Params::getParam('file') == 'oc-content/themes/bigio/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'bigio');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $footerLink  = Params::getParam('footer_link');
                $defaultLogo = Params::getParam('default_logo');
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'bigio');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'bigio');
                osc_set_preference('default_logo', ($defaultLogo ? '1' : '0'), 'bigio');

                osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'bigio');
				osc_set_preference('facebook-top',         trim(Params::getParam('facebook-top', false, false, false)),                  'bigio');
				osc_set_preference('facebook-sidebar',         trim(Params::getParam('facebook-sidebar', false, false, false)),                  'bigio');
				osc_set_preference('facebook-sidebar-js',         trim(Params::getParam('facebook-sidebar-js', false, false, false)),                  'bigio');
				osc_set_preference('twitter-top',         trim(Params::getParam('twitter-top', false, false, false)),                  'bigio');
				osc_set_preference('google-top',         trim(Params::getParam('google-top', false, false, false)),                  'bigio');
				osc_set_preference('address-contact',         trim(Params::getParam('address-contact', false, false, false)),                  'bigio');
				osc_set_preference('email-contact',         trim(Params::getParam('email-contact', false, false, false)),                  'bigio');
				osc_set_preference('map-contact',         trim(Params::getParam('map-contact', false, false, false)),                  'bigio');
                osc_set_preference('homepage-728x90',       trim(Params::getParam('homepage-728x90', false, false, false)),                'bigio');
                osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'bigio');
                osc_set_preference('bsearch-results-top-728x90',     trim(Params::getParam('bsearch-results-top-728x90', false, false, false)),          'bigio');
                osc_set_preference('bsearch-results-middle-728x90',  trim(Params::getParam('bsearch-results-middle-728x90', false, false, false)),       'bigio');

                osc_add_flash_ok_message(__('Theme settings updated correctly', 'bigio'), 'admin');
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/bigio/admin/settings.php')); exit;
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                        osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'bigio'), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again", 'bigio'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'bigio'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/bigio/admin/header.php')); exit;
            break;
            case('remove'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    @unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" );
                    osc_add_flash_ok_message(__('The logo image has been removed', 'bigio'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'bigio'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/bigio/admin/header.php')); exit;
            break;
        }
    }

    if( !function_exists('logo_header') ) {
        function logo_header() {
            $html = '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/logo.jpg') . '" />';
            if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                return $html;
            } else if( osc_get_preference('default_logo', 'bigio') && (file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/default-logo.jpg")) ) {
                return '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/default-logo.jpg') . '" />';
            } else {
                return osc_page_title();
            }
        }
    }

    // install update options
    if( !function_exists('modern_theme_install') ) {
        function modern_theme_install() {
            osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'bigio'), 'bigio');
            osc_set_preference('version', '5.0.0', 'bigio');
            osc_set_preference('footer_link', true, 'bigio');
            osc_set_preference('donation', '0', 'bigio');
            osc_set_preference('default_logo', '1', 'bigio');
            osc_reset_preferences();
        }
    }

    if(!function_exists('check_install_modern_theme')) {
        function check_install_modern_theme() {
            $current_version = osc_get_preference('version', 'bigio');
            //check if current version is installed or need an update
            if( !$current_version ) {
                modern_theme_install();
            }
        }
    }

    require_once WebThemes::newInstance()->getCurrentThemePath() . 'inc.functions.php';

    check_install_modern_theme();

    /* ads  SEARCH */
    function bsearch_ads_listing_top_fn() {
        if(osc_get_preference('bsearch-results-top-728x90', 'bigio')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="ads_728">' . PHP_EOL;
            echo osc_get_preference('bsearch-results-top-728x90', 'bigio');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('search_ads_listing_top', 'bsearch_ads_listing_top_fn');

    function bsearch_ads_listing_medium_fn() {
        if(osc_get_preference('bsearch-results-middle-728x90', 'bigio')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="ads_728">' . PHP_EOL;
            echo osc_get_preference('bsearch-results-middle-728x90', 'bigio');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('bsearch_ads_listing_medium', 'bsearch_ads_listing_medium_fn');
	
	/* user menu */
	 if( !function_exists('get_user_menu') ) {
        function get_user_menu() {
            $options   = array();
            $options[] = array(
                'name' => __('Public Profile', 'bigio'),
                 'url' => osc_user_public_profile_url(),
               'class' => 'opt_publicprofile'
            );
            $options[] = array(
                'name'  => __('Listings', 'bigio'),
                'url'   => osc_user_list_items_url(),
                'class' => 'opt_items'
            );
            $options[] = array(
                'name' => __('Alerts', 'bigio'),
                'url' => osc_user_alerts_url(),
                'class' => 'opt_alerts'
            );
            $options[] = array(
                'name'  => __('Account', 'bigio'),
                'url'   => osc_user_profile_url(),
                'class' => 'opt_account'
            );
            $options[] = array(
                'name'  => __('Change email', 'bigio'),
                'url'   => osc_change_user_email_url(),
                'class' => 'opt_change_email'
            );
            $options[] = array(
                'name'  => __('Change username', 'bigio'),
                'url'   => osc_change_user_username_url(),
                'class' => 'opt_change_username'
            );
            $options[] = array(
                'name'  => __('Change password', 'bigio'),
                'url'   => osc_change_user_password_url(),
                'class' => 'opt_change_password'
            );

            return $options;
        }
    }

    

    if( !function_exists('user_info_js') ) {
        function user_info_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();

            if( $location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items')) ) {
                $user = User::newInstance()->findByPrimaryKey( Session::newInstance()->_get('userId') );
                View::newInstance()->_exportVariableToView('user', $user);
                ?>
<script type="text/javascript">
    moderntheme.user = {};
    moderntheme.user.id = '<?php echo osc_user_id(); ?>';
    moderntheme.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
<?php }
        }
        osc_add_hook('header', 'user_info_js');
    }
	
	function moderntheme_add_google_fonts(){
	echo "<link href='http://fonts.googleapis.com/css?family=".moderntheme_google_fonts()."' rel='stylesheet' type='text/css'>";
	echo "<style>body, .gm-style,h1, h2, h3, h4, h5, h6, .listings h2 a, .listing-attr .currency-value, input[type=text], input[type=password], textarea, select, div.fancy-select div.trigger, .main-search label {
	font-family: '".str_replace('+',' ',moderntheme_google_fonts())."', sans-serif;
}
</style>";
	}	
	/* end user menu */

    /* remove theme */
    function modern_delete_theme() {
        osc_remove_preference('keyword_placeholder', 'bigio');
        osc_remove_preference('footer_link', 'bigio');
        osc_remove_preference('default_logo', 'bigio');
        osc_remove_preference('donation', 'bigio');

        osc_remove_preference('facebook-top', 'bigio');
		osc_remove_preference('facebook-sidebar', 'bigio');
		osc_remove_preference('facebook-sidebar-js', 'bigio');
		osc_remove_preference('google-top', 'bigio');
		osc_remove_preference('twitter-top', 'bigio');
		osc_remove_preference('address-contact', 'bigio');
		osc_remove_preference('email-contact', 'bigio');
		osc_remove_preference('map-contacts', 'bigio');
		osc_remove_preference('header-728x90', 'bigio');
        osc_remove_preference('homepage-728x90', 'bigio');
        osc_remove_preference('sidebar-300x250', 'bigio');
        osc_remove_preference('bsearch-results-top-728x90', 'bigio');
        osc_remove_preference('bsearch-results-middle-728x90', 'bigio'); 
    }
    osc_add_hook('theme_delete_modern', 'modern_delete_theme');
	
	/* categories customized */
	if( !function_exists('get_categoriesHierarchy') ) {
        function get_categoriesHierarchy( ) {
            $location = Rewrite::newInstance()->get_location() ;
            $section  = Rewrite::newInstance()->get_section() ;
            
            if ( $location != 'search' ) {
                return false ;
            }
            
            $category_id = osc_search_category_id() ;
            
            if(count($category_id) > 1) {
                return false;
            }
            
            $category_id = (int) $category_id[0] ;
            
            $categoriesHierarchy = Category::newInstance()->hierarchy($category_id) ;
            
            foreach($categoriesHierarchy as &$category) {
                $category['url'] = get_category_url($category) ;
            }
            
            return $categoriesHierarchy ;
         }
     }
     
     if( !function_exists('get_subcategories') ) {
         function get_subcategories( ) {
             $location = Rewrite::newInstance()->get_location() ;
             $section  = Rewrite::newInstance()->get_section() ;
            
             if ( $location != 'search' ) {
                 return false ;
             }
            
             $category_id = osc_search_category_id() ;
            
             if(count($category_id) > 1) {
                 return false ;
             }
            
             $category_id = (int) $category_id[0] ;
            
             $subCategories = Category::newInstance()->findSubcategories($category_id) ;
            
             foreach($subCategories as &$category) {
                 $category['url'] = get_category_url($category) ;
             }
            
             return $subCategories ;
         }
     }

     if ( !function_exists('get_category_url') ) {
         function get_category_url( $category ) {
             $path = '';
             if ( osc_rewrite_enabled() ) {
                if ($category != '') {
                    $category = Category::newInstance()->hierarchy($category['pk_i_id']) ;
                    $sanitized_category = "" ;
                    for ($i = count($category); $i > 0; $i--) {
                        $sanitized_category .= $category[$i - 1]['s_slug'] . '/' ;
                    }
                    $path = osc_base_url() . $sanitized_category ;
                }
            } else {
                $path = sprintf( osc_base_url(true) . '?page=search&sCategory=%d', $category['pk_i_id'] ) ;
            }
            
            return $path;
         }
     }
     
     if ( !function_exists('get_category_num_items') ) {
         function get_category_num_items( $category ) {
            $category_stats = CategoryStats::newInstance()->countItemsFromCategory($category['pk_i_id']) ;
            
            if( empty($category_stats) ) {
                return 0 ;
            }
            
            return $category_stats;
         }
     }
	/* end categories customized */
?>