<?php

function pangea_add_elementor_widget_categories($elements_manager) {
	$elements_manager->add_category(
		'tcrs-widgets', [
			'title' => __('Pangea','pangea'),
			'icon' => 'eicon-theme-builder',
		]
	);
}

add_action('elementor/elements/categories_registered','pangea_add_elementor_widget_categories');