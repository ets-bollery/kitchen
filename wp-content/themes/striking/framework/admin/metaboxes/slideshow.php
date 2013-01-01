<?php
class Theme_Metabox_Slideshow extends Theme_Metabox_With_Tabs {
	public $slug = 'slideshow';
	public function config(){
		return array(
			'title' => sprintf(__('%s Slider Options','striking_admin'),THEME_NAME),
			'post_types' => array('slideshow'),
			'callback' => '',
			'context' => 'normal',
			'priority' => 'high',
		);
	}

	public function __construct(){
		parent::__construct();
		foreach($this->config['post_types'] as $post_type){
			if (theme_is_post_type($post_type)){
				add_action('admin_init', array(&$this, '_enqueue_script'));
			}
		}
	}

	public function _enqueue_script(){
		wp_enqueue_script('theme-metabox-anything-slider', THEME_ADMIN_ASSETS_URI . '/js/metabox_anything_slider.js', array('jquery'));
	}

	public function tabs(){
		return array(
			array(
				"name" => __("SlideShow Item General Setup",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Description (optional)",'striking_admin'),
						"desc" => __("The description of the slider item.",'striking_admin'),
						"id" => "_description",
						"default" => "",
						"rows" => "2",
						"type" => "textarea"
					),
					array(
						"name" => __("URL (optional)",'striking_admin'),
						"desc" => __("The url that the slider item linked to.",'striking_admin'),
						"id" => "_link_to",
						"default" => "",
						"type" => "superlink"		
					),
					array(
						"name" => __("Link Target",'striking_admin'),
						"id" => "_link_target",
						"default" => '_self',
						"options" => array(
							"_blank" => __('Load in a new window','striking_admin'),
							"_self" => __('Load in the same frame as it was clicked','striking_admin'),
							"_parent" => __('Load in the parent frameset','striking_admin'),
							"_top" => __('Load in the full body of the window','striking_admin'),
						),
						"type" => "select",
					),
				),
			),
			array(
				"name" => __("Anything-Slider Setup",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Type",'striking_admin'),
						"id" => "_anything_type",
						"default" => 'image',
						"options" => array(
							"image" => __('Image with caption','striking_admin'),
							"sidebar" => __('Sidebar','striking_admin'),
							"html" => __('Html','striking_admin'),
						),
						"type" => "select",
					),
					array(
						"name" => __("Background Color",'striking_admin'),
						"desc" => __("If you specify a color below, this will override the global configuration. Set transparent to disable this.",'striking_admin'),
						"id" => "_anything_bg",
						"default" => "",
						"type" => "color"
					),
					array(
						"name" => __("Image Caption Position",'striking_admin'),
						"id" => "_image_caption_position",
						"group" => 'image',
						"default" => 'disable',
						"options" => array(
							"top" => __('Top','striking_admin'),
							"bottom" => __('Bottom','striking_admin'),
							"left" => __('Left','striking_admin'),
							"right" => __('Right','striking_admin'),
							"disable" => __('Disable','striking_admin'),
						),
						"type" => "select",
					),
					array(
						"name" => __("Sidebar Position",'striking_admin'),
						"id" => "_sidebar_position",
						"group" => 'sidebar',
						"default" => 'left',
						"options" => array(
							"left" => __('Left','striking_admin'),
							"right" => __('Right','striking_admin'),
						),
						"type" => "select",
					),
					array(
						"name" => __("Click Stop autoPlay",'striking_admin'),
						"desc" => __("if this is on, anything slider will stop if you click on the item until manual change the slide.",'striking_admin'),
						"id" => "_anything_click_stop",
						"default" => "0",
						"type" => "toggle"
					),
					array(
						"name" => __("Stop autoPlay",'striking_admin'),
						"desc" => __("if this is on, anything slider will stop until manual change the slide.",'striking_admin'),
						"id" => "_anything_stop",
						"default" => "0",
						"type" => "toggle"
					),
				),
			),
			array(
				"name" => __("3D image Rotator",'striking_admin'),
				"options" => array(
					array(
						"name" => __("Transition Pieces",'striking_admin'),
						"desc" => __("Number of pieces to which the image is sliced. If set to 0, it will use the general setting.",'striking_admin'),
						"id" => "_3d_pieces",
						"min" => "0",
						"max" => "30",
						"step" => "1",
						"default" => "0",
						"type" => "range"
					),
					array(
						"name" => __("Transition Time",'striking_admin'),
						"desc" => __("Number of seconds for each element to be turned. If set to 0, it will use the general setting.",'striking_admin'),
						"id" => "_3d_time",
						"min" => "0",
						"max" => "3",
						"step" => "0.1",
						"unit" => 'seconds',
						"default" => "0",
						"type" => "range"
					),
					array(
						"name" => __("Transition Delay",'striking_admin'),
						"desc" => __("Number of seconds from one element starting to turn to the next element starting. If set to 0, it will use the general setting.",'striking_admin'),
						"id" => "_3d_delay",
						"min" => "0",
						"max" => "1",
						"step" => "0.1",
						"unit" => 'seconds',
						"default" => "0",
						"type" => "range"
					),
					array(
						"name" => __("Transition Type",'striking_admin'),
						"desc" => __("Select which effect to use when transition.",'striking_admin'),
						"id" => "_3d_transition",
						"default" => 'default',
						"options" => array(
							"default" => 'default',
							"linear" => 'linear',
							"easeInSine" => 'easeInSine',
							"easeOutSine" => 'easeOutSine',
							"easeInOutSine" => 'easeInOutSine',
							"easeInCubic" => 'easeInCubic',
							"easeOutCubic" => 'easeOutCubic',
							"easeInOutCubic" => 'easeInOutCubic',
							"easeOutInCubic" => 'easeOutInCubic',
							"easeInQuint" => 'easeInQuint',
							"easeOutQuint" => 'easeOutQuint',
							"easeInOutQuint" => 'easeInOutQuint',
							"easeOutInQuint" => 'easeOutInQuint',
							"easeInCirc" => 'easeInCirc',
							"easeOutCirc" => 'easeOutCirc',
							"easeInOutCirc" => 'easeInOutCirc',
							"easeOutInCirc" => 'easeOutInCirc',
							"easeInBack" => 'easeInBack',
							"easeOutBack" => 'easeOutBack',
							"easeInOutBack" => 'easeInOutBack',
							"easeOutInBack" => 'easeOutInBack',
							"easeInQuad" => 'easeInQuad',
							"easeOutQuad" => 'easeOutQuad',
							"easeInOutQuad" => 'easeInOutQuad',
							"easeOutInQuad" => 'easeOutInQuad',
							"easeInQuart" => 'easeInQuart',
							"easeOutQuart" => 'easeOutQuart',
							"easeInOutQuart" => 'easeInOutQuart',
							"easeOutInQuart" => 'easeOutInQuart',
							"easeInExpo" => 'easeInExpo',
							"easeOutExpo" => 'easeOutExpo',
							"easeInOutExpo" => 'easeInOutExpo',
							"easeOutInExpo" => 'easeOutInExpo',
							"easeInElastic" => 'easeInElastic',
							"easeOutElastic" => 'easeOutElastic',
							"easeInOutElastic" => 'easeInOutElastic',
							"easeOutInElastic" => 'easeOutInElastic',
							"easeInBounce" => 'easeInBounce',
							"easeOutBounce" => 'easeOutBounce',
							"easeInOutBounce" => 'easeInOutBounce',
							"easeOutInBounce" => 'easeOutInBounce',
						),
						"type" => "select",
					),
					array(
						"name" => __("Transition Depth Offset",'striking_admin'),
						"desc" => __("The offset during transition on the z-axis. If set to 0, it will use the general setting.",'striking_admin'),
						"id" => "_3d_depthOffset",
						"min" => "0",
						"max" => "1000",
						"step" => "100",
						"default" => "0",
						"type" => "range"
					),
					array(
						"name" => __("Transition Cube Distance",'striking_admin'),
						"desc" => __("The distance between the cubes during transition. If set to 0, it will use the general setting.",'striking_admin'),
						"id" => "_3d_cubeDistance",
						"min" => "0",
						"max" => "50",
						"step" => "5",
						"unit" => 'seconds',
						"default" => "0",
						"type" => "range"
					),
				),
			)
		);
	}
}
