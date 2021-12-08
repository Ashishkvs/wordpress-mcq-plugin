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


/**
 * Restrict direct access via root
 * http://localhost/pcsshala/wp-content/plugins/mcq-quiz/mcq-quiz.php
 */
if(!defined('ABSPATH')){
  die("Cannot access !!!");
}
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
    
    // drop_mcq_table();
}
register_deactivation_hook( __FILE__, 'mcq_quiz_deactivate' );

// add_action( 'plugins_loaded', 'activate_quiz_maker' );

/**
 * ADMI PAGE Plugin menu setting and respective page
 */
add_action('admin_menu', 'mcq_quiz_data_menu');

function mcq_quiz_data_menu() {
  add_menu_page('MCQ QUIZ', 'MCQ QUIZ', 'manage_options', 'mcq-quiz-plugin' ,'mcq_quiz_list','',15);
  add_submenu_page('mcq-quiz-plugin','Add Quizzes', 'Add Quizzes', 'manage_options', 'mcq-add-quizes','mcq_quiz_add');
}
function mcq_quiz_add() {
  // echo "Add quizes page";
  include_once('admin/admin-crud.php');
}


function crud_quiz_question() {
  include_once('mcq-quiz-list.php');
}

function mcq_quiz_list($atts) {
  // $atts = array_change_key_case($atts, CASE_LOWER);
  $atts =shortcode_atts(array(
    'cat'=>'DAILY_QUIZ'
  ), $atts);
  echo "Welcome".$atts['cat'];
  global $quiz_category;
  $quiz_category = $atts['cat'];
  include_once('mcq-quiz-list.php');
}
function mcq_quiz_exam($atts) {
  $atts =shortcode_atts(array(
    'cat'=>'DAILY_QUIZ'
  ), $atts);
  echo "Welcome".$atts['cat'];
  global $quiz_category;
  $quiz_category = $atts['cat'];
  include_once('mcq-quiz-exam.php');
}
//ADD SHORT_CODE
add_shortcode('mcq_quiz_shortcode', 'mcq_quiz_list');
add_shortcode('mcq_quiz_shortcode_exam', 'mcq_quiz_exam');
//TODO use in template file template
// do_shortcode('[mcq_quiz_shortcode]')
  
?>