<?php
// ajouter une page admin
add_action('admin_menu','plugin_admin_add_page');
/** ajoute une page plugin */
function plugin_admin_add_page(){
	add_options_page('Custom Plugin Page',/*title*/
    'Custom plugin menu',/* link in menu */
    'manage_options',/* autorisation*/
    'plugin',/* uri link in admin */
    'plugin_options_page'/*callback */
	);
}
function plugin_options_page(){
	echo "<div><h2>My custom plugin</h2>";
	echo "Options related to the custom plugin.";
	echo "<form action='options.php' method='post'>";
	settings_fields('plugin_options');
	do_settings_sections('plugin');
	echo "<input type='Submit' value='Save Changes' />";
	echo "</form>";
	echo "</div>";
}

//ajouter les configs de l'admin
add_action('admin_init',"plugin_admin_init");
function plugin_admin_init(){
	register_setting('plugin_options',
    'plugin_options',
    'plugin_options_validate');
	add_settings_section('plugin_main',
    'Main Settings',
    "plugin_section_text",
    'plugin');
	add_settings_field('plugin_text_string',
    'Plugin Text Input',
    'plugin_setting_string',
    'plugin',
    'plugin_main'
	);
	add_settings_field('plugin_option_2',/*id */
    'Plugin option 2',/*titre*/
    'render_plugin_option_2',/* callback */
    'plugin',/* id de la page de settings*/
    'plugin_main'/* id de la section*/
	);
}
//callback
function plugin_section_text(){
	echo"<p>Main description of this section here</p>";
}
function plugin_setting_string(){
	$options = get_option('plugin_options');
	echo "<input name='plugin_options[text_string]' id='plugin_options[text_string]'
    value='{$options['text_string']}'
    type='text' size='40'/>";

}
function render_plugin_option_2(){
	$options = get_option('plugin_options');
	echo "<input name='plugin_options[option_2]'
     value='{$options["option_2"]}' 
     type='text' size='40' id='plugin_options[option_2' />";
}
//validation callback
function plugin_options_validate($input){
	$newinput = array();
	foreach($input as $key => $value){
		$newinput[$key] = esc_attr($input[$key]);
	}
	return $newinput;
}
