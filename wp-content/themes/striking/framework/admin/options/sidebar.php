<?php
class Theme_Options_Page_Sidebar extends Theme_Options_Page_With_Tabs {
	public $slug = 'sidebar';

	function __construct(){
		$this->name = sprintf(__('%s Sidebar Settings','striking_admin'),THEME_NAME);
		parent::__construct();
	}

	function tabs(){
		$options = array(
			array(
				"name" => __("Sidebar",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Generate Sidebar",'striking_admin'),
						"desc" => __("Enter the name of sidebar you'd like to create.",'striking_admin'),
						"id" => "sidebars",
						"function" => "_option_sidebars_function",
						"default" => "",
						"type" => "custom"
					),
				),
			),
			array(
				"name" => __("Default Custom Sidebar Settings",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Single Page",'striking_admin'),
						"id" => "single_page",
						"default" => '',
						"options"=> theme_get_sidebar_options(),
						"prompt" => __("None",'striking_admin'),
						"type" => "select",
					),
					array(
						"name" => __("Single Post Page",'striking_admin'),
						"id" => "single_post",
						"default" => '',
						"options"=> theme_get_sidebar_options(),
						"prompt" => __("None",'striking_admin'),
						"type" => "select",
					),
					array(
						"name" => __("Single Portfolio Page",'striking_admin'),
						"id" => "single_portfolio",
						"default" => '',
						"options"=> theme_get_sidebar_options(),
						"prompt" => __("None",'striking_admin'),
						"type" => "select",
					),
				),
			),
		);
		return $options;
	}

	function _option_sidebars_function($value, $default) {
		if(!empty($default)){
			$sidebars = explode(',',$default);
		}else{
			$sidebars = array();
		}
		
		echo <<<HTML
<script type="text/javascript">
jQuery(document).ready( function($) {
	$("#add_sidebar").validator({effect:'option'}).closest('form').submit(function(e) {
		if (!e.isDefaultPrevented() && $("#add_sidebar").val()) {
			if($('#sidebars').val()){
				$('#sidebars').val($('#sidebars').val()+','+$("#add_sidebar").val());
			}else{
				$('#sidebars').val($("#add_sidebar").val());
			}
		}
	});
	$(".sidebar-item input:button").click(function(){
		$(this).closest(".sidebar-item").fadeOut("normal",function(){
  			$(this).remove();
  			$('#sidebars').val('');
			$(".sidebar-item-value").each(function(){
				if($('#sidebars').val()){
					$('#sidebars').val($('#sidebars').val()+','+$(this).val());
				}else{
					$('#sidebars').val($(this).val());
				}
			});
 		});
		
	});
	
});
</script>
<style type="text/css">
.sidebar-title {
	margin:20px 0 5px;
	font-weight:bold;
}
.sidebar-item {
	padding-left:10px;
}
.sidebar-item span {
	margin-right:10px;
}

</style>
HTML;
		
		echo '<input type="text" id="add_sidebar" name="add_sidebar" pattern="([a-zA-Z\x7f-\xff][ a-zA-Z0-9_\x7f-\xff]*){0,1}" data-message="'.__('Please input a valid name which starts with a letter, followed by letters, numbers, spaces, or underscores.','striking_front').'" maxlength="20" /><span class="validator-error"></span>';
		if(!empty($sidebars)){
			echo '<div class="sidebar-title">'.__('Below are the Sidebars you have created','striking_admin').'</div>';
			foreach($sidebars as $sidebar){
				echo '<div class="sidebar-item"><span>'.$sidebar.'</span><input type="hidden" class="sidebar-item-value" value="'.$sidebar.'"/><input type="button" class="button" value="'.__('Delete','striking_admin').'"/></div>';
			}
		}
		echo '<input type="hidden" value="' . $default . '" name="' . $value['id'] . '" id="sidebars"/>';
	}
}
