<?php if( !osc_get_preference('footer_link', 'bigio') ) { ?>

<?php } ?>
<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'bigio') ? '' : 'separate-top'); ?>"><?php _e('Theme settings', 'bigio'); ?></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bigio/admin/settings.php'); ?>" method="post">
    <input type="hidden" name="action_specific" value="settings" />
    <fieldset>
        <div class="form-horizontal">
            
            <div class="form-row">
                <div class="form-label"><?php _e('Footer link', 'bigio'); ?></div>
                <div class="form-controls">
                    <div class="form-label-checkbox"><input type="checkbox" name="footer_link" value="1" <?php echo (osc_get_preference('footer_link', 'bigio') ? 'checked' : ''); ?> > <?php _e("I want to help OSClass by linking to <a href=\"http://osclass.org/\" target=\"_blank\">osclass.org</a> from my site with the following text:", 'bigio'); ?></div>
                    <span class="help-box"><?php _e('This website is proudly using the <a title="OSClass web" href="http://osclass.org/">classifieds scripts</a> software <strong>OSClass</strong>', 'bigio'); ?></span>
                </div>
            </div>
        </div>
    </fieldset>
<br />

    
    <fieldset>
        <div class="form-horizontal">
        <div class="form-row">
        <h2 class="render-title"><?php _e('Contact', 'bigio'); ?>:</h2>
                <div class="form-label"><?php _e('Address', 'bigio'); ?>:</div>
                <div class="form-controls">
                    <textarea placeholder="Type here your address. Ex.: Italy, Roma. Street: Bigio 29." style="height: 80px; width: 500px;"name="address-contact"><?php echo osc_esc_html( osc_get_preference('address-contact', 'bigio') ); ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Email', 'bigio'); ?>:</div>
                <div class="form-controls">
                    <textarea placeholder="Type here your emails. Ex.: support@mywebsite.com" style="height: 80px; width: 500px;"name="email-contact"><?php echo osc_esc_html( osc_get_preference('email-contact', 'bigio') ); ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Google Map: <br />Height: 600 Witdh: 500<br /> Get your code: <br /><a href="http://www.map-embed.com/" target="_blank">www.map-embed.com</a></div>
                <div class="form-controls">
                    <textarea placeholder="Put here google maps code... it can be full <iframe>here is code...</iframe> or just javascript code if you get it from: map-embed.com" style="height: 80px; width: 500px;"name="map-contact"><?php echo osc_esc_html( osc_get_preference('map-contact', 'bigio') ); ?></textarea>
                </div>
            </div>
            <br />
            <div class="form-row">
        <h2 class="render-title"><?php _e('Social networks', 'bigio'); ?>:</h2>
                <div class="form-label"><?php _e('Facebook link in top bar', 'bigio'); ?>:</div>
                <div class="form-controls">
                    <textarea placeholder="Ex.: http://facebook.com/facebook" style="height: 20px; width: 500px;"name="facebook-top"><?php echo osc_esc_html( osc_get_preference('facebook-top', 'bigio') ); ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Twitter link in top bar', 'bigio'); ?>:</div>
                <div class="form-controls">
                    <textarea placeholder="Ex.: http://twiter.com/twitter" style="height: 20px; width: 500px;"name="twitter-top"><?php echo osc_esc_html( osc_get_preference('twitter-top', 'bigio') ); ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Google link in top bar</div>
                <div class="form-controls">
                    <textarea placeholder="Ex.: https://plus.google.com/+yourname" style="height: 20px; width: 500px;"name="google-top"><?php echo osc_esc_html( osc_get_preference('google-top', 'bigio') ); ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Fcebook in sidebar Width:250 Height:350<br />
                <a target="_blank" href="https://developers.facebook.com/docs/plugins/page-plugin">Get code</a> | <a target="_blank" href="http://i.imgbox.com/R9jhtfFu.jpg">Help</a></div>
                <div class="form-controls">
                    <textarea placeholder="Paste javascript code from facebook... please see help link." style="height: 100px; width: 250px;"name="facebook-sidebar-js"><?php echo osc_esc_html( osc_get_preference('facebook-sidebar-js', 'bigio') ); ?></textarea> <textarea placeholder="Paste HTML code from facebook... please see help link." style="height: 100px; width: 250px;"name="facebook-sidebar"><?php echo osc_esc_html( osc_get_preference('facebook-sidebar', 'bigio') ); ?></textarea>
                </div>
            </div>
            <br />
            <div class="form-row">
            <h2 class="render-title"><?php _e('Ads management', 'bigio'); ?>:</h2> <p><?php _e('In this section you can configure your site to display ads and start generating revenue.', 'bigio'); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', 'bigio'); ?></p><br />
                    
                <div class="form-label"><?php _e('Header 728x90', 'bigio'); ?></div>
                <div class="form-controls">
                    <textarea placeholder="This ad will be shown at the top of your website, in homepage only. Note that the size of the ad has to be 728x90 pixels." style="height: 115px; width: 500px;"name="header-728x90"><?php echo osc_esc_html( osc_get_preference('header-728x90', 'bigio') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top of your website, in homepage only. Note that the size of the ad has to be 728x90 pixels.', 'bigio'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage 728x90', 'bigio'); ?></div>
                <div class="form-controls">
                    <textarea placeholder="This ad will be shown only on the item listing, bottom, after item description. Note that the size of the ad has to be 728x90 pixels." style="height: 115px; width: 500px;" name="homepage-728x90"><?php echo osc_esc_html( osc_get_preference('homepage-728x90', 'bigio') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown only on the item listing, bottom, after item description. Note that the size of the ad has to be 728x90 pixels.', 'bigio'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results 728x90 (top of the page results)', 'bigio'); ?></div>
                <div class="form-controls">
                    <textarea placeholder="This ad will be shown on top of the search results of your site. Note that the size of the ad has to be 728x90 pixels." style="height: 115px; width: 500px;" name="bsearch-results-top-728x90"><?php echo osc_esc_html( osc_get_preference('bsearch-results-top-728x90', 'bigio') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on top of the search results of your site. Note that the size of the ad has to be 728x90 pixels.', 'bigio'); ?></div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-label"><?php _e('Sidebar 250x250', 'bigio'); ?></div>
                <div class="form-controls">
                    <textarea placeholder="This ad will be shown at the right sidebar of your website, on the product detail page. Note that the size of the ad has to be 250x250 pixels." style="height: 115px; width: 500px;" name="sidebar-300x250"><?php echo osc_esc_html( osc_get_preference('sidebar-300x250', 'bigio') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the right sidebar of your website, on the product detail page. Note that the size of the ad has to be 250x250 pixels.', 'bigio'); ?></div>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'bigio'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>