<?php
/*
Plugin Name: TinyCode
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/tinycode/
Description: Some shortcodes to highlight parts of the text.
Author: Oliver Schaal
Version: 1.2.1

    This is a WordPress plugin (http://wordpress.org) and widget
    (http://automattic.com/code/widgets/).
*/


if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

global $wp_version;
define('TINYCODE_URLPATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ).'/' );
define('WPV28', version_compare($wp_version, '2.8', '>='));

if (!class_exists("TinyCode")) {
    class TinyCode {

        /* __construct */
        function __construct() {
            register_deactivation_hook(__FILE__, array(&$this, 'deactivatePlugin'));
            if (WPV28) {
                add_action('wp_enqueue_scripts', array(&$this, 'enqueueStyle'));
            } else {
                add_action('wp_head', array(&$this, 'addHeader'));
            }
            add_shortcode('important', array(&$this, 'getImportant'));
            add_shortcode('blockquote', array(&$this, 'getBlockquote'));
            add_shortcode('notice', array(&$this, 'getNotice'));
            add_shortcode('dropcap', array(&$this, 'getDropCap'));
            add_shortcode('inset', array(&$this, 'getInset'));
            add_shortcode('clear', array(&$this, 'getClear'));
        }
        /* __construct */

        /* deactivatePlugin */
        function deactivatePlugin()
        {
            // delete_option('tinyCode');
        }
        /* deactivatePlugin */

        /* getImportant */
        function getImportant($arg, $content) {
            $option = shortcode_atts( array(
                                             'title' => '',
                                             'color' => '',
                ), $arg );
            if ($option['title'] == '') {
                $title = '';
            } elseif ($option['color'] == '') {
                $title = '<span class="important-title">'.$option['title'].'</span>';
            } else {
                $title = '<span class="important-title-'.$option['color'].'">'
                .$option['title'].'</span>';
            }
            if ($option['color'] == '') {
                return '<div class="important">'.$title.$content.'</div>';
            } else {
                return '<div class="important-'.$option['color'].'">'
                .$title.do_shortcode($content).'</div>';
            }
        }
        /* getImportant */

        /* getBlockquote */
        function getBlockquote($arg, $content) {
            $option = shortcode_atts( array('color' => ''), $arg );
            if ($option['color'] == '') {
                return '<div class="quote">'.$content.'</div>';
            } else {
                return '<div class="quote-'.$option['color'].'">'
                .do_shortcode($content).'</div>';
            }
        }
        /* getBlockquote */

        /* getNotice */
        function getNotice($arg, $content) {
            $option = shortcode_atts( array('type' => ''), $arg );
            if ($option['type'] == '') {
                return $content;
            } else {
                return '<span class="'.$option['type'].'">'
                .do_shortcode($content).'</span>';
            }
        }
        /* getNotice */

        /* getDropCap */
        function getDropCap($arg, $content) {
            $option = shortcode_atts( array('color' => ''), $arg );
            $cap = substr($content,0,1);
            if ($option['color'] == '') {
                return '<div class="dropcap"><span class="dropcap">'.$cap.'</span>'.$content.'</div>';
            } else {
                return '<div class="dropcap"><span class="dropcap-'.$option['color'].'">'.$cap
                .'</span>'.do_shortcode($content).'</div>';
            }
        }
        /* getDropCap */

        /* getInset */
        function getInset($arg, $content) {
            $option = shortcode_atts( array('lr' => ''), $arg );
            if ($option['lr'] == '') {
                return $content;
            } else {
                return '<span class="inset-'.$option['lr'].'">'.$content.'</span>';
            }
        }
        /* getInset */

        /* getClear */
        function getClear( $atts) {
            return '<span class="clear"></span>';
        }
        /* getClear */

        /* addHeader */
        function addHeader() {
            $path = plugins_url()."/tinycode";

            $script = "\n<!-- TinyCode Plugin -->\n";
            $script .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$path/tinycode.css\" media=\"screen\" />\n";
            $script .= "<!-- TinyCode Plugin -->\n";

            echo $script;
        }
        /* addHeader */

        /* enqueueStyle */
        function enqueueStyle(){
            wp_enqueue_style('tinycode', plugins_url('/tinycode/tinycode.css'), false, '1.0.0', 'screen');
        }
        /* enqueueStyle */

    }
}

if (class_exists("TinyCode")) {
    $tinyCode = new TinyCode();
}


/* Add the button to TinyMCE */
include_once (dirname (__FILE__) . '/tinymce/tinymce.php');
if (class_exists("TinyCodeMCE")) {
    $tinymce_button = new TinyCodeMCE ();
}
?>