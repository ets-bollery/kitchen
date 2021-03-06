<?php
return array(
	"title" => __("Icon Text", "striking_admin"),
	"shortcode" => 'icon',
	"type" => 'enclosing',
	"options" => array(
		array(
			"name" => __("Style",'striking_admin'),
			"id" => "style",
			"default" => '',
			"options" => array(
				"globe" => 'globe',
				"home" => 'home',
				"email" => 'email',
				"user" => 'user',
				"multiuser" => 'multiuser',
				"id" => 'id',
				"addressbook" => 'addressbook',
				"phone" => 'phone',
				"cellphone" => 'cellphone',
				"fax" => 'fax',
				"link" => 'link',
				"chain" => 'chain',
				"calendar" => 'calendar',
				"tag" => 'tag',
				"download" => 'download',
			),
			"type" => "select",
		),
		array(
			"name" => __("Color (optional)",'striking_admin'),
			"id" => "color",
			"default" => "",
			"prompt" => __("Choose one..",'striking_admin'),
			"options" => array(
				"black" => 'Black',
				"gray" => 'Gray',
				"red" => 'Red',
				"yellow" => 'Yellow',
				"blue" => 'Blue',
				"pink" => 'Pink',
				"green" => 'Green',
				"rosy" => 'Rosy',
				"orange" => 'Orange',
				"magenta" => 'Magenta',
			),
			"type" => "select",
		),
		array(
			"name" => __("Text",'striking_admin'),
			"id" => "content",
			"default" => "",
			"type" => "textarea"
		),
	),
	"custom" => '',
);