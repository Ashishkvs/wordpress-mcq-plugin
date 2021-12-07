<?php
/**
 * Plugin Name:       MCQ-QUIZ
 * Plugin URI:        https://imagegrafia.com/mcq-quiz/plugins
 * Description:       Set Question with MCQ and time
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ashish Yadhuvanshi
 * Author URI:        https://imagegrafia.com/ashishyadhuvanshi
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       MCQ-QUIZ-PLUGINS
 * Domain Path:       /languages
 */

/**
 * Activate the plugin.
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
/**
 * all the db related things script kept in below files
 */
require_once('mcq-quiz-sql.php');

function mcq_quiz_activate() { 
    create_mcq_quiz_table();
    insert_mcq_quiz_question_dump_data();
    create_mcq_quiz_exam_table();
    insert_mcq_quiz_exam_dump_data();
}
register_activation_hook( __FILE__, 'mcq_quiz_activate' );

/**
 * Deactivation hook.
 */
function mcq_quiz_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    // unregister_post_type( 'book' );
    // Clear the permalinks to remove our post type's rules from the database.
    // flush_rewrite_rules();
    drop_mcq_table();
}
register_deactivation_hook( __FILE__, 'mcq_quiz_deactivate' );

// add_action( 'plugins_loaded', 'activate_quiz_maker' );

/**
 * ADMI PAGE Plugin menu setting and respective page
 */
add_action('admin_menu', 'mcq_quiz_data_menu');

function mcq_quiz_data_menu() {
  add_menu_page('MCQ QUIZ', 'MCQ', 8, __FILE__, 'mcq_quiz_list');
}

function mcq_quiz_list() {
  // echo "Welcome";
  include_once('mcq-quiz-list.php');
}
//ADD SHORT_CODE
add_shortcode('mcq_quiz_shortcode', 'mcq_quiz_list');

//TODO use in template file template
// do_shortcode('[mcq_quiz_shortcode]')
  
?>