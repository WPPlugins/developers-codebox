<?php 
/*
Plugin Name: Developer's CodeBox
Plugin URI: http://www.johnkolbert.com/portfolio/wp-plugins/codebox
Description: Sometimes you just want to see what your new bits of code do!
Author: John Kolbert
Version: 1.1
Author URI: http://www.johnkolbert.com/

Copyright 2009 John Kolbert

Permission is hereby granted, free of charge, to any person obtaining a copy of 
this software and associated documentation files (the "Software"), to deal in 
the Software without restriction, including without limitation the rights to use, 
copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the 
Software, and to permit persons to whom the Software is furnished to do so, 
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all 
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION 
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

if(!class_exists('codeBox')){
class codeBox {
	var $plugin_url;
	
	function codeBox(){ //class constructor
		$this->plugin_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
	}

	/**
	 * add_pages function.
	 * 
	 * Adds top level CodeBox menu
	 * @access public
	 * @return void
	 */
	function add_pages(){
	
		add_menu_page('Developer\'s CodeBox', 'CodeBox', 8, __FILE__, array(&$this, 'codeBoxPage')); //add top level menu page
	}
	
	/**
	 * codeBoxPage function.
	 * 
	 * CodeBox page content and guts
	 * @access public
	 * @return void
	 */
	function codeBoxPage(){
		$input = stripslashes($_POST['newcontent']);
	    $nonce = wp_create_nonce('codeboxnonce');			
?>
		<div class="wrap">
			<div id="icon-tools" class="icon32"></div><h2>The Developer's CodeBox: Test Your Code Here <span style="float: right; font-size: 12px; padding-right: 15px;">a development tool by <a href="http://www.johnkolbert.com/">John Kolbert</a></span></h2>
			
		<form target="formresults" method="post" action="<?php echo $this->plugin_url . '/codeframe.php?nonce='.$nonce; ?>" id="codeboxform" name="codeboxform">
			
			<div class="postbox-container" style="width:65%;">
				<div class="metabox-holder">	
					<div class="meta-box-sortables">
			
						<div id="codearea" class="postbox">
							
							<h3 class="hndle"><span>Enter Code Here:</span></h3>
				
								<div class="inside">
			

									<form target="formresults" method="post" action="<?php echo $this->plugin_url; ?>/codeframe.php?nonce=<?php echo $nonce; ?>" id="codeboxform" name="codeboxform">
										<input type="hidden" name="codeboxnonce" value="<?php echo $nonce; ?>" />
					
										<textarea name="codeboxtext" id="codeboxtext" tabindex="1" rows="15" style="width: 100%;"></textarea>
				
								</div> <!-- #inside -->
						</div> <!-- #postbox -->
						
						<div id="codeevalarea" class="postbox">
							<h3 class="hndle"><span>Your Code Output:</span></h3>
				
								<div class="inside">
							
									<iframe name="formresults" src="<?php echo $this->plugin_url; ?>/codeframe.php?src=org&nonce=<?php echo $nonce; ?>" width="100%"></iframe>
							
								</div> <!-- #inside -->
						</div> <!-- #postbox -->
					</div> <!-- #metabox sortables -->
				</div> <!-- #metabox holder -->
				
			</div> <!-- #postbox container -->
			
			<div class="postbox-container" style="width:30%;">
					<div class="metabox-holder">	
						<div class="meta-box-sortables">
					
							<div id="submitarea" class="postbox">
								<h3 class="hndle"><span>Submit:</span></h3>
								<div class="inside">
									<center>
									<input style="margin-top: 10px; " class="button-primary" type="submit" value="Submit Code" /> 
									<a href="javascript:location.reload(true)" class="button-secondary">Reset</a>
									</center>
								</div>
							
							</div>	
				
							<div id="codeboxtips" class="postbox">
								<h3 class="hndle"><span>CodeBox Tips:</span></h3>
								<div class="inside">
								<h4 style="margin-bottom: -10px;">This is NOT a sandbox!</h4>
								<p style="font-size: 11px;">Code run here <em>is</em> live. If you test a function to alter your database, it will actually alter your database. Only use this on a development server. You've been warned.</p>
									<li style="font-size: 11px;">use valid HTML, CSS, Javascript and PHP</li>
									<li style="font-size: 11px;">Always wrap your PHP in proper tags:<br /> <em>&lt;?php ... ?&gt;</em></li>
									<li style="font-size: 11px;">You can use WordPress native functions (eg: <em>get_bloginfo('template_url');</em>)</li>

				

								</div>
							</div>

							<div id="moreplugin" class="postbox">
								<h3 class="hndle"><span>Support this plugin:</span></h3>
								<div class="inside">
									<ul><li><a href="http://www.johnkolbert.com/donate/?plugin=developers-codebox" title="Donate" target="_blank">Donate to support development</a></li>
									<li><a href="http://www.wordpress.org/extend/plugins/codebox/" title="Rate">Rate this plugin on WP.org</a></li>					
								</ul>
								</div>
								
							</div>
							
							<div id="author" class="postbox">
								<h3 class="hndle"><span>Plugin Author:</span></h3>
								<div class="inside">
									<p style="text-align: center; font-size: 1.1em;">Plugin created by <a href="http://www.johnkolbert.com/" title="John Kolbert">John Kolbert</a><br />
									<span style="font-size: 0.8em;">Can't get your code working? <a href="http://www.mammothapps.com/contact/" title="Hire Me">Hire me.</a><br />
									<a href="http://www.twitter.com/johnkolbert" title="Follow Me!">Follow me on Twitter!</a><br /></span>
								
								</div>
								
							</div>
							
						</div>
				</div>
			</div>
		</form>
	</div>
		<?php
	}
	
	function codebox_scripts(){
		wp_enqueue_script('cb_edit_area', $this->plugin_url . '/edit_area/edit_area_full.js');
	}
	
	function codebox_styles(){
		wp_enqueue_style('dashboard');	
	}
	
	/**
	 * header function.
	 * 
	 * adds codepress JS to WP enqueue
	 * @access public
	 * @return void
	 */
	function codebox_header(){
?>		<script language="javascript" type="text/javascript">
			editAreaLoader.init({
			id : "codeboxtext"		// textarea id
			,syntax: "php"			// syntax to be uses for highgliting
			,start_highlight: true	// to display with highlight mode on start-up
			,font_size: 11
			});
		</script>
<?php
	}


} //end class dec
} //end class_exists check

if (class_exists("codeBox")) {
	$codeBox = new codeBox();
}
//Actions and Filters	
if (isset($codeBox)) {

	add_action('admin_menu', array(&$codeBox, 'add_pages')); //add options pages
	if($_GET['page'] == "developers-codebox/codebox.php"){
		add_action('admin_print_scripts', array(&$codeBox, 'codebox_scripts')); //add script to admin header
		add_action('admin_head', array(&$codeBox, 'codebox_header'));
		add_action('admin_print_styles', array(&$codeBox,'codebox_styles'));	
	}
}