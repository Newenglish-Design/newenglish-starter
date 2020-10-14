<?php 

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a sample block
		acf_register_block(array(
			'name'				=> 'sample-block',
			'title'				=> __('Sample Block'),
			'description'		=> __('A custom sample block block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'sample' ),
		));
	}
}
