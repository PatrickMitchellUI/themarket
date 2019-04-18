<div class="col-lg-12 col-md-12 col-sm-12" align="center"><?php
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

    osc_show_widgets('footer');
    $sQuery = osc_esc_js(osc_get_preference('keyword_placeholder', 'bigio'));
?></div>
<!-- / End Content Our Theme -->
<!-- /start footer our theme -->
<footer id="footer" class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					
					<div id="lower-footer">
					
						<div class="row">
							
							<div class="col-lg-8 col-md-8 col-sm-8">
								<p class="copyright">&copy; <a href="<?php echo osc_base_url(); ?>"><?php echo osc_page_title(); ?></a> - <a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'bigio'); ?></a>
        <?php osc_reset_static_pages(); ?>
        <?php while( osc_has_static_pages() ) { ?>
            - <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
        <?php } ?>
        <?php
            if( osc_get_preference('footer_link', 'bigio') ) {
                echo ' - ' . __('This website is proudly using the <a title="Osclass web" href="http://osclass.org/">classifieds scripts</a> software <strong>Osclass</strong>', 'bigio');
            }
        ?></p>
							</div>
							
							<div class="col-lg-4 col-md-4 col-sm-4">
								<ul class="partners-list">
                                Partners: <a href="http://osclasspremium.themehelp.us/">Themes</a>
								</ul>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</footer>
<!-- /end footer our theme -->


<!-- /end container our theme -->

<script type="text/javascript">
    var sQuery = '<?php echo $sQuery; ?>';
    function doSearch() {
        if($('input[name=sPattern]').val() == sQuery || ( $('input[name=sPattern]').val() != '' && $('input[name=sPattern]').val().length < 3 ) ) {
            $('input[name=sPattern]').css('background', '#FFC6C6');
            $('#search-example').text('<?php echo osc_esc_js( __('Your search must be at least three characters long','bigio') ); ?>')
            return false;
        }
        return true;
    }
</script>
<?php osc_run_hook('footer'); ?>