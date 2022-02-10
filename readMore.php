<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Read More Link
 * Plugin URI:        https://github.com/fhranchez
 * Description:       A wordpress plugin with a read more link at the end of an excerpt
 * Version:           1.0.0
 * Author:            Fhranchez
 * Author URI:        https://github.com/fhranchez/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       readMore
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
}

class ReadMore {
	public function __construct() {
		add_action('wp_enqueue_scripts',[$this,'enqueueScripts']);
		add_filter('excerpt_more',[$this,'excerptMod']);
	}

	public function enqueueScripts() {
		wp_enqueue_style('public-css',plugin_dir_url(__FILE__) . 'public/css/index.css');
	}
	public function excerptMod($excerpt) {
		// $newExcerpt = str_ireplace('[...]', 'Read More', $excerpt);

		$post = get_post();

		$link = get_permalink($post);
		echo plugin_dir_url(__FILE__);
		return '<a class="post-link post-permalink" href="' . $link . '">More..</a>';
	}
}

$readMoreInstance = new ReadMore();
