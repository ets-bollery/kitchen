<?php
class Theme_Options_Page_Advanced extends Theme_Options_Page_With_Tabs {
	public $slug = 'advanced';

	function __construct(){
		$this->name = sprintf(__('%s Advanced Settings','striking_admin'),THEME_NAME);
		parent::__construct();
	}

	function tabs(){
		$options = array(
			array(
				"slug" => 'general',
				"name" => __("General",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Use Timthumb",'striking_admin'),
						"id" => "timthumb",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Clear Cache",'striking_admin'),
						"id" => "clear_cache",
						"default" => false,
						"process" => "_option_clear_cache_process",
						"type" => "toggle"
					),
					array(
						'name' => __("Use Complex CSS Class",'striking_admin'),
						'desc'=>__('It will add pre text (<code>theme_</code>) to the classes to avoid class name conflict: <code>button, code, pre, tabs, mini_tabs, pane, panes, tab, accordion, info, success, error, error_msg, notice, note, note_title, note_content</code>. <br>For example: <code>button</code> become <code>theme_button</code>.','striking_front'),
						"id" => "complex_class",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Disable Colorbox",'striking_admin'),
						"desc" => __("If you enable this option, the lightbox will not show. You should use your custom scripts.",'striking_admin'),
						"id" => "no_colorbox",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Restrict Colorbox Dimension",'striking_admin'),
						"desc" => __("If you enable this option, the lightbox dimension will be restricted to fit the browse screen size.",'striking_admin'),
						"id" => "restrict_colorbox",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Shortcode Support in Comment",'striking_admin'),
						"id" => "shortcode_comment",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Show Striking on Admin bar",'striking_admin'),
						"id" => "admin_bar_menu",
						"default" => true,
						"type" => "toggle"
					),
					array(
						"name" => __("Show featured image on feeds",'striking_admin'),
						"id" => "show_post_thumbnail_on_feed",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Reset Theme Options",'striking_admin'),
						"id" => "rest",
						"default" => array(),
						"desc" => __('If you want reset your theme options to defualt, please checked the items below.','striking_admin'),
						"options" => array(
							"general" => __('General','striking_admin'),
							"background" => __('Background','striking_admin'),
							"color" => __('Color','striking_admin'),
							"font" => __('Font','striking_admin'),
							"slideshow" => __('SlideShow','striking_admin'),
							"sidebar" => __('Sidebar','striking_admin'),
							"image" => __('Image','striking_admin'),
							"media" => __('Media','striking_admin'),
							"homepage" => __('Homepage','striking_admin'),
							"blog" => __('Blog','striking_admin'),
							"portfolio" => __('Portfolio','striking_admin'),
							"footer" => __('Footer','striking_admin'),
						),
						"process" =>"_option_reset_options_process",
						"type" => "checkboxes",
					),
				),
			),
			array(
				"slug" => 'search',
				"name" => __("Search",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Exclude From Search",'striking_admin'),
						"id" => "exclude_from_search",
						"default" => array(),
						"target" => 'public_post_types',
						"type" => "checkboxes",
					),
				),
			),
			array(
				"slug" => 'metabox',
				"name" => __("Meta Box display Settings",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Page General Options",'striking_admin'),
						"id" => "page_general",
						"default" => array('post','page','portfolio'),
						"target" => 'post_types',
						"type" => "checkboxes",
					),
				),
			),
			array(
				"slug" => 'optimizer',
				"name" => __("JavaScript & CSS Optimizer",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Combine Js",'striking_admin'),
						"id" => "combine_js",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Combine CSS",'striking_admin'),
						"id" => "combine_css",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("Move Js To Bottom",'striking_admin'),
						"id" => "move_bottom",
						"default" => false,
						"type" => "toggle"
					),
				),
			),
			array(
				"slug" => 'fix',
				"name" => __("Updating fix",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Portfolio Item Module 'Enable Read More' option fix",'striking_admin'),
						"id" => "updating_portfolio_more",
						"desc" =>  __("Fix 'Enable Read More' option on Portfolio Item Module issue after updating < version 3.0.1 to the new one. Do not try this if it's a new installation. You only need to enable this once.",'striking_admin'),
						"default" => false,
						"process" => "_option_updating_portfolio_more_process",
						"type" => "toggle"
					),
					array(
						"name" => __("Page General Module 'Disable Breadcrumbs' option fix",'striking_admin'),
						"id" => "updating_disable_breadcrumbs",
						"desc" =>  __("Fix 'Disable Breadcrumbs' option on Page General Module issue after updating < version 3.0.1 to the new one. Do not try this if it's a new installation. You only need to enable this once.",'striking_admin'),
						"default" => false,
						"process" => "_option_updating_disable_breadcrumbs_process",
						"type" => "toggle"
					),
				),
			),
			array(
				"slug" => 'import_export',
				"name" => __("Import & Export",'striking_admin'),
				"options" => array(
					array(
						"name" => sprintf(__("Import %s Options Data",'striking_admin'),THEME_NAME),
						"id" => "import",
						"desc" => __('To import the values of your theme options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Save Changes" button below.','striking_admin'),
						"function" => "_option_import_function",
						"process" => "_option_import_process",
						"type" => "custom"
					),
					array(
						"name" => sprintf(__("Export %s Options Data",'striking_admin'),THEME_NAME),
						"id" => "export",
						"desc" => __("Export your saved Theme Options data by highlighting this text and doing a copy/paste into a blank .txt file.",'striking_admin'),
						"function" => "_option_export_function",
						"process" => "_option_export_process",
						"type" => "custom"
					),
				),
			),
			array(
				"slug" => 'woocommerce',
				"name" => __("E-commerce Integration",'striking_admin'),
				"options" => array(
					array(
						"name" => __("WooCommerce",'striking_admin'),
						"id" => "woocommerce",
						"desc"=>__("Please scroll to the top of the page to enable 'Use Complex CSS Class' option if you enable this.",'striking_front'),
						"process" =>"_option_woocommerce_process",
						"default" => false,
						"type" => "toggle"
					),
					array(
						"name" => __("WooCommerce Page Layout",'striking_admin'),
						"desc" => "",
						"id" => "woocommerce_layout",
						"default" => 'right',
						"options" => array(
							"full" => __('Full Width','striking_admin'),
							"right" => __('Right Sidebar','striking_admin'),
							"left" => __('Left Sidebar','striking_admin'),
							"right" => __("Right Float",'striking_admin'),
						),
						"type" => "select",
					),
					array(
						"name" => __("WooCommerce Shop Sidebar",'striking_admin'),
						"desc" => sprintf(__("Select the custom sidebar that you'd like to be displayed on Shop page.<br />Note: you will need to <a href=\"%s\">create a custom sidebar</a> first.",'striking_admin'),admin_url( 'admin.php?page=theme_sidebar')),
						"id" => "woocommerce_shop_sidebar",
						"prompt" => __("Choose one..",'striking_admin'),
						"default" => '',
						"options" => theme_get_sidebar_options(),
						"type" => "select",
					),
					array(
						"name" => __("WooCommerce Product Sidebar",'striking_admin'),
						"desc" => __("Select the custom sidebar that you'd like to be displayed on Product page.",'striking_admin'),
						"id" => "woocommerce_product_sidebar",
						"prompt" => __("Choose one..",'striking_admin'),
						"default" => '',
						"options" => theme_get_sidebar_options(),
						"type" => "select",
					),
					array(
						"name" => __("WooCommerce Product Category Sidebar",'striking_admin'),
						"desc" => __("Select the custom sidebar that you'd like to be displayed on Product Category page.",'striking_front'),
						"id" => "woocommerce_cat_sidebar",
						"prompt" => __("Choose one..",'striking_admin'),
						"default" => '',
						"options" => theme_get_sidebar_options(),
						"type" => "select",
					),
					array(
						"name" => __("WooCommerce Product Tag Sidebar",'striking_admin'),
						"desc" => __("Select the custom sidebar that you'd like to be displayed on Product Tag page.",'striking_front'),
						"id" => "woocommerce_tag_sidebar",
						"prompt" => __("Choose one..",'striking_admin'),
						"default" => '',
						"options" => theme_get_sidebar_options(),
						"type" => "select",
					),
				),
			),
			array(
				"slug" => 'header_text',
				"name" => __("Featured Header Text",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Category Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "category_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Category Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Category Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the category name.',
						"id" => "category_text",
						"default" => __('Category Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Tag Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "tag_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Tag Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Tag Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the tag name.',
						"id" => "tag_text",
						"default" => __('Tag Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Daily Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "daily_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Daily Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Daily Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the day number.',
						"id" => "daily_text",
						"default" => __('Daily Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Monthly Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "monthly_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Monthly Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Monthly Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the month number.',
						"id" => "monthly_text",
						"default" => __('Monthly Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Weekly Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "weekly_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Weekly Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Weekly Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the year number.',
						"id" => "weekly_text",
						"default" => __('Weekly Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Yearly Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "yearly_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Yearly Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Yearly Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the year number.',
						"id" => "yearly_text",
						"default" => __('Yearly Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Author Archive Title",'striking_admin'),
						"desc" => '',
						"id" => "author_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Author Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Author Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the author name.',
						"id" => "author_text",
						"default" => __('Author Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Blog Archives Title",'striking_admin'),
						"desc" => '',
						"id" => "blog_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Blog Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Blog Archives</code>',
						"id" => "blog_text",
						"default" => __('Blog Archives','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Taxonomy Archives Title",'striking_admin'),
						"desc" => '',
						"id" => "taxonomy_title",
						"default" => __('Archives','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Taxonomy Archive Text",'striking_admin'),
						"desc" => 'Default: <code>Archive for: ‘%s’</code><br> <code>%s</code> will be replaced with the taxonomy name.',
						"id" => "taxonomy_text",
						"default" => __('Archive for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("404 Page Title",'striking_admin'),
						"desc" => '',
						"id" => "404_title",
						"default" => __('404 - Not Found','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("404 Page Text",'striking_admin'),
						"id" => "404_text",
						"default" => __("Looks like the page you're looking for isn't here anymore. Try using the search box or sitemap below.",'striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
					array(
						"name" => __("Search Page Title",'striking_admin'),
						"desc" => '',
						"id" => "search_title",
						"default" => __('Search','striking_front'),
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Search Page Text",'striking_admin'),
						"desc" => 'Default: <code>Search Results for: ‘%s’</code><br> <code>%s</code> will be replaced with the search text.',
						"id" => "search_text",
						"default" => __('Search Results for: ‘%s’','striking_front'),
						'rows' => '2',
						"type" => "textarea"
					),
				),
			),
		);
		if(function_exists('is_post_type_archive')){
			$archives = get_post_types(array(
			  'public'   => true,
			  '_builtin' => false,
			  'show_ui'=> true,
			),'objects');
			if ($archives) {
				if(array_key_exists('portfolio',$archives)){
					unset($archives['portfolio']);
				}
				if(!empty($archives)){
					$tab = array(
						"name" => "Custom Post Type Archive Featured Header Text",
						"options" => array(),
					);
					foreach ($archives  as $archive ) {
						if($archive->name != 'portfolio'){
							$tab['options'][] = array(
								"name" => sprintf(__("%s Archives Title",'striking_admin'),$archive->name),
								"desc" => '',
								"id" => "archive_".$archive->name."_title",
								"default" => __('Archives','striking_front'),
								"size" => 50,
								"type" => "text"
							);
							$tab['options'][] = array(
								"name" => sprintf(__("%s Archives Text",'striking_admin'),$archive->name),
								"desc" => 'Default: <code>Archives for: ‘%s’</code><br> <code>%s</code> will be replaced with the post type name.',
								"id" => "archive_".$archive->name."_text",
								"default" => __('Archives for: ‘%s’','striking_front'),
								'rows' => '2',
								"type" => "textarea"
							);
						}
					}
					$options[] = $tab;
				}
			}
		}
		$taxonomies=get_taxonomies(array(
			'public'   => true,
			'_builtin' => false,
			'show_ui'=> true,
		),'objects'); 
		if ($taxonomies && !empty($taxonomies)) {
			$tab = array(
				"name" => "Custom Taxonomy Featured Header Text",
				"options" => array(),
			);
			foreach ($taxonomies  as $taxonomy ) {
				$tab['options'][] = array(
					"name" => sprintf(__("%s Archives Title",'striking_admin'),$taxonomy->name),
					"desc" => '',
					"id" => "taxonomy_".$taxonomy->name."_title",
					"default" => __('Archives','striking_front'),
					"size" => 50,
					"type" => "text"
				);
				$tab['options'][] = array(
					"name" => sprintf(__("%s Archives Text",'striking_admin'),$taxonomy->name),
					"desc" => 'Default: <code>Archives for: ‘%s’</code><br> <code>%s</code> will be replaced with the taxonomy name.',
					"id" => "taxonomy_".$taxonomy->name."_text",
					"default" => __('Archives for: ‘%s’','striking_front'),
					'rows' => '2',
					"type" => "textarea"
				);
			}
			$options[] = $tab;
		}
		$options = array_merge($options , array(
			array(
				"slug" => 'grayscale',
				"name" => __("Grayscale Image Hover effect",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Animation Speed",'striking_admin'),
						"desc" => __("Define the duration of the animations.",'striking_admin'),
						"id" => "grayscale_animSpeed",
						"min" => "200",
						"max" => "3000",
						"step" => "100",
						'unit' => 'miliseconds',
						"default" => "1000",
						"type" => "range"
					),
					array(
						"name" => __("Fade-out Speed",'striking_admin'),
						"desc" => __("Define the speed of the Fade-out.",'striking_admin'),
						"id" => "grayscale_outSpeed",
						"min" => "200",
						"max" => "3000",
						"step" => "100",
						'unit' => 'miliseconds',
						"default" => "1000",
						"type" => "range"
					),
				),
			),
		));
		$options = array_merge($options , array(
			array(
				"slug" => 'update',
				"name" => __("Update Theme",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Item Purchase Code",'striking_admin'),
						"id" => "item_purchase_code",
						'desc' => 'It will use for verifying the purchase before update. (how to <a href="http://kaptinlin.com/support/page/get_code.html" target="_blank">get it</a>)',
						"default" => '',
						"size" => 50,
						"type" => "text"
					),
					array(
						"name" => __("Enable Notification",'striking_admin'),
						"id" => "update_notification",
						"default" => true,
						"type" => "toggle"
					),
					array(
						"name" => __("Update",'striking_admin'),
						"id" => "updating_theme",
						"desc" =>  __("Updating Theme to the latest version.",'striking_admin'),
						"default" => false,
						"function" => "_option_update_theme_function",
						"type" => "custom"
					),
					/*
					array(
						"name" => __("Restore",'striking_admin'),
						"id" => "updating_theme",
						"desc" =>  __("Restore Theme to the state before updating.",'striking_admin'),
						"default" => false,
						"type" => "toggle"
					),*/
				),
			),
		));

		return $options;
	}
	
	function _option_update_theme_function($value, $default) {
		require_once (THEME_ADMIN_FUNCTIONS . '/upgrade.php');

		$has_update =  upgradeHelper::check();
		$url = 'update-core.php?action='.THEME_SLUG.'_theme_update';
		$url = wp_nonce_url($url, 'upgrade-'.THEME_SLUG);
		$url = network_admin_url($url);
		$theme = THEME_SLUG;
		$package = upgradeHelper::getPackage();
		$updateInfo = upgradeHelper::getUpdateInfo();
		if($has_update){
			wp_print_scripts('jquery-download');
			global $wp_version;
			$referer = home_url();
			if(theme_get_option('advanced','item_purchase_code')==''){
				$is_purchase_code_empty = 'true';
			}else{
				$is_purchase_code_empty = 'false';
			}
			echo <<<HTML
	<span id="update"></span>
	<a class="button-primary" id="upgrade_button" href="{$url}">Upgrade to version {$has_update}</a>
	<a class="button" href="#" id="nightly_build_download">Download nightly build</a>
	<a href="{$updateInfo}" target="_blank">View Changes</a>
	<script type="text/javascript">
		document.getElementById('upgrade_button').onclick = function(){
			if({$is_purchase_code_empty}){
				alert('Please enter your purchase code, then click "Save Changes" button.');
				return false;
			}else{
				return confirm("Are you sure you want to upgrade your {$theme} to version {$has_update}?\\nMake sure backup your files if you had made change on the theme files.");
			}
		};

		jQuery(document).ready(function(){
			jQuery('#nightly_build_download').click(function(){
				jQuery.download('{$package}','wp_version={$wp_version}&referer={$referer}','post');
				return false;
			})

		});
	</script>
HTML;
		} else {
			$url = admin_url( 'admin.php?page=theme_advanced&check=true#update');
			echo  <<<HTML
You are using the latest version. 
	<a class="button" href="{$url}">Check for updates</a>
	<span id="update"></span>
HTML;
		}
	}
	function _option_clear_cache_process($option,$data) {
		if($data == true){
			if(WP_Filesystem(array('method'=>'direct'))){
				$whitelist = array(
					'index.html',
					'skin.css',
					'skin_\d+.css',
					'images\/index.html',
					'images',
					'images\d+',
					'backup',
				);
				global $wp_filesystem;
				$files = $wp_filesystem->dirlist(THEME_CACHE_DIR, true, false);
				$pattern = "/^".implode('|',$whitelist)."$/i";

				foreach($files as $filename => $fileinfo){
					if(!preg_match($pattern, $filename)){
						$wp_filesystem->delete(trailingslashit(THEME_CACHE_DIR).$filename, true);
					}
				}
				$files = $wp_filesystem->dirlist(THEME_CACHE_IMAGES_DIR, true, false);
				if(!empty($files)){
					foreach($files as $filename => $fileinfo){
						if($filename != 'index.html'){
							$wp_filesystem->delete(trailingslashit(THEME_CACHE_IMAGES_DIR).$filename, true);
						}
					}
				}
			}
			$posts = get_posts( array( 
				'post_type'   => 'attachment', 
				'numberposts' => -1
			));
			foreach ( $posts as $post ) {
				$metadata = wp_get_attachment_metadata($post->ID);
				if(is_array($metadata)){
					unset($metadata['custom_sizes']);
				}
				wp_update_attachment_metadata($post->ID, $metadata);
			}
		}
		return false;
	}
	
	function _option_updating_portfolio_more_process($option,$data){
		if($data == true){
			$entries = get_posts('post_type=portfolio&meta_key=_more&meta_value=-1');
			foreach($entries as $entry) {
				update_post_meta($entry->ID, '_more', 'false');
			}
			
			$entries = get_posts('post_type=portfolio&meta_key=_more&meta_value=true');
			foreach($entries as $entry) {
				update_post_meta($entry->ID, '_more', '');
			}
		}
		return false;
	}
	
	function _option_updating_disable_breadcrumbs_process($option,$data){
		if($data == true){
			$entries = get_posts('meta_key=_disable_breadcrumb&meta_value=-1');
			foreach($entries as $entry) {
				update_post_meta($entry->ID, '_disable_breadcrumb', '');
			}
		}
		return false;
	}

	function _option_reset_options_process($option,$data) {
		if(is_array($data)){
			foreach($data as $page){
				delete_option(THEME_SLUG . '_' . $page);
			}
		}
		return false;
	}

	function _option_import_function($value, $default) {
		$rows = isset($value['rows']) ? $value['rows'] : '5';
		echo '<textarea id="'.$value['id'].'" rows="' . $rows . '" name="' . $value['id'] . '" type="' . $value['type'] . '" class="code">';
		echo $default;
		echo '</textarea><br />';
		echo '</td></tr>';
	}

	function _option_export_function($value, $default) {
		global $theme_options;
		$rows = isset($value['rows']) ? $value['rows'] : '5';
		echo '<textarea id="'.$value['id'].'" rows="' . $rows . '" name="' . $value['id'] . '" type="' . $value['type'] . '" class="code">';
		echo base64_encode(serialize($theme_options));
		echo '</textarea><br />';
		echo '</td></tr>';
	}

	function _option_export_process($option,$data) {
		return '';
	}

	function _option_import_process($option,$data) {
		if($data != ''){
			
			$options_array = unserialize( base64_decode( $data ) );
			if(is_array($options_array)){
				foreach($options_array as $name => $options){
					update_option(THEME_SLUG . '_' . $name, $options);
				}
			}
		}
		return '';
	}

	function _option_woocommerce_process($option,$data) {
		if(theme_get_option('advanced','woocommerce') == false && $data == true){
			global $theme_options;
			if(isset($theme_options['advanced']['page_general']) && !in_array('product', $theme_options['advanced']['page_general'])){
				if(isset($_POST['page_general']) && is_array($_POST['page_general']) && !in_array('product', $_POST['page_general'])){
					$_POST['page_general'][] = 'product';
				}
			}
		}
		return $data;
	}
}
