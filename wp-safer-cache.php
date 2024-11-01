<?php
/*
Plugin Name: WP Safer Cache
Plugin URI: http://blog.futtta.be/2013/04/10/wp-safer-cache-stopgap-for-wordpress-cache-plugins-vulnerability/
Description: Little helper plugin to protect blogs with non-up-to-date versions WP Super Cache and W3 Total Cache from unsane comments
Author: Frank Goossens (futtta)
Version: 0.1.5
Author URI: http://blog.futtta.be/
*/

add_filter( 'preprocess_comment','wp_safer_cache' );
add_filter( 'comment_text','wp_safer_cache' ); 
add_filter( 'comment_excerpt','wp_safer_cache' ); 
add_filter( 'comment_text_rss','wp_safer_cache' ); 

function wp_safer_cache($comment_data) {
	if (is_array($comment_data)) {
		$cmmt_in=$comment_data['comment_content'];
	} else {
		$cmmt_in=$comment_data;
	}
	
	if (preg_match( '/<!-+\s*mclude|mfunc|dynamic-cached-content/i', $cmmt_in )) { 
		$cmmt_out = preg_replace('#(<!-+\s*(mclude|mfunc|dynamic-cached-content).*<!-+\s*/\s*(mfunc|mclude|dynamic-cached-content)\s*-+>)#ism','<!-- unsane comment zapped by wp safer cache-->', $cmmt_in);
		if ($cmmt_out === $cmmt_in) {
			$cmmt_out=preg_replace_callback(
				'#<!-+\s*(mclude|mfunc|dynamic-cached-content)#ism',
				create_function(
					'$matches',
					'return htmlentities($matches[0]);'
				),
				$cmmt_in);
			}
				
		if (is_array($comment_data)) {
			$comment_data['comment_content'] = $cmmt_out;
		} else {
			$comment_data = $cmmt_out;
		}
	}

	return $comment_data;
}

function wsc_admin_notice(){
    echo '<div class="updated">WP Safer Cache is no longer needed, provided you succesfully upgraded WP Super Cache or W3 Total Cache. Feel free to deactivate and remove WP Safer Cache. If you are interested, you can find <a href="http://blog.futtta.be/2013/04/18/wp-caching-plugin-vulnerability-debrief/">a debrief about the vulnerability here</a></div>';
    }

add_action('admin_notices', 'wsc_admin_notice');

?>
