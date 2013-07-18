<?php   
    /* 
    Plugin Name: WP Headmaster
    Plugin URI: https://www.creare.co.uk/services/wp-headmaster
    Description: A simple plugin for adding, enqueuing and organising common items into the Head tag without hard-coding.
    Author: James Bavington
    Version: 0.1
    Author URI: http://www.creare.co.uk/
    */   


	/*  Copyright 2013  BAVINGTON  (email : james@creare.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

if ( is_admin() ){ 
	add_action('admin_menu', 'headmaster_admin_actions');   
	add_action('admin_init', 'headmaster_theme_options_init' );
    add_action('admin_init', 'wp_headmaster_css' );   
}

function headmaster_admin_actions() { 
    $page = add_options_page("Headmaster", "WP Headmaster", "administrator", "Headmaster", "headmaster_admin"); 
 
    add_action( 'admin_print_styles-' . $page, 'wp_headmaster_enqueue_admin_styles' );
}

function headmaster_admin() {  
    include('wp-headmaster-settings.php');  
}
  
function wp_headmaster_css() {
    wp_register_style( 'wpHeadmasteradminstyles', plugins_url('wp-headmaster.css', __FILE__ ),'','', 'screen' );
}

function wp_headmaster_enqueue_admin_styles() {
    wp_enqueue_style( 'wpHeadmasteradminstyles' );
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    add_action('admin_head','admin_js_styles');
}

function admin_js_styles() { 
    include('wp-headmaster-js.php');  
 }

function headmaster_theme_options_init(){
    register_setting( 'headmaster_myoption_group', 'ga_profile' );
    register_setting( 'headmaster_myoption_group', 'inline_styles' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_favicon' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_meta_author' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_meta_author_auto' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_touch_icon' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_jquery_choice' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_jquery_google_version' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_respondjs' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_css3js' );
    register_setting( 'headmaster_myoption_group', 'wp_headmaster_google_font' );
} 

 $deployga = get_option('ga_profile');

 if ($deployga !="") { 
 	add_action('wp_head', 'add_analytic', '999'); 
 }

 $inline_style_check = get_option('inline_styles');

 if ($inline_style_check !="") { 
 	add_action('wp_head', 'add_styles', '998'); 
 }

 $favicon_check = get_option('wp_headmaster_favicon');

 if ($favicon_check !="") { 
    add_action('wp_head', 'add_favicon', '997'); 
 }

 $touchicon_check = get_option('wp_headmaster_touch_icon');

 if ($touchicon_check !="") { 
    add_action('wp_head', 'add_touchicon', '996'); 
 }

 $jquery_check = get_option('wp_headmaster_jquery_choice');

 if ($jquery_check =="1") { 
    add_action('wp_head', 'add_jquery', ''); 
 }
 elseif ($jquery_check =="2") { 
    $jquery_google_version = get_option('wp_headmaster_jquery_google_version');
    add_action('wp_head', 'add_google_jquery', '');
}

$respondjscheck = get_option('wp_headmaster_respondjs');
$css3jscheck = get_option('wp_headmaster_css3js');

if ($respondjscheck =="1") { 
    add_action('wp_head', 'add_respond_js', ''); 
 }

if ($css3jscheck =="1") {
    add_action('wp_head', 'add_respond_css3js','');
}

$googlefontcheck = get_option('wp_headmaster_google_font');
if ($googlefontcheck !=="") { 
    add_action('wp_head', 'add_google_font', ''); 
 }

 $author_check = get_option('wp_headmaster_meta_author');
 $author_check_last_update = get_option('wp_headmaster_meta_author_auto');

 if ($author_check !="" && $author_check_last_update !="1" ) { 
    add_action('wp_head', 'add_meta_author', '1'); 
 }

elseif ($author_check !="" && $author_check_last_update =="1") { 
    add_action('wp_head', 'add_meta_author_last_updated', '1'); 
 }

function add_analytic() { ?>
<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', "<?php echo get_option('ga_profile'); ?>"]);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
</script>
<?php } 

function add_styles() { 
    echo '<script type="text/javascript">'."\n";
    echo get_option('inline_styles') ."\n"; 
    echo '</script>'."\n";
} 

function add_favicon() { 
    echo '<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="'. get_option('wp_headmaster_favicon') .'" sizes="16x16 32x32" />';
    echo "\n";
} 

function add_touchicon() { 
    echo '<link rel="apple-touch-icon" href="'. get_option('wp_headmaster_touch_icon') .'" />';
    echo "\n";
} 

function add_jquery() { 
    wp_enqueue_script( 'jquery' );
}

function add_google_jquery() { 
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/" . get_option('wp_headmaster_jquery_google_version') . "/jquery.min.js",'',get_option('wp_headmaster_jquery_google_version'), false);
    wp_enqueue_script('jquery');
}

function add_respond_js() { 
    wp_register_script( 'respond-js', plugins_url( 'js/respond.min.js' , __FILE__ ), '','1.1.0',false );
    wp_enqueue_script('respond-js');
}

function add_respond_css3js() { 
    wp_register_script( 'css3-js', plugins_url( 'js/css3-mediaqueries.js' , __FILE__ ), '',null,false );
    wp_enqueue_script('css3-js');
}

function add_google_font() { 
    wp_register_style('googlefont', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://fonts.googleapis.com/css?family=" . get_option('wp_headmaster_google_font'),'',null,'all');
    wp_enqueue_style('googlefont');
}

function add_meta_author() { 
    echo '<meta name="author" content="'. get_option('wp_headmaster_meta_author') .'" />';
} 

function add_meta_author_last_updated() { 
    echo '<meta name="author" content="'. get_the_modified_author() .'" />';
} 

