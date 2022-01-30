<?php
/**
 * Plugin Name:       MCQ-QUIZ
 * Plugin URI:        https://imagegrafia.com/mcq-quiz/plugins
 * Description:       Set Question with MCQ and time <code>mcq_quiz_shortcode</code> <code>[mcq_quiz_shortcode_exam cat="CAT_NAME"]</code> <code>mcq_quiz_shortcode_view_answer</code> <code>mcq_quiz_shortcode_leaderboard</code>
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ashish Yadhuvanshi
 * Author URI:        https://imagegrafia.com/ashishyadhuvanshi
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://imagegrafia.com/my-plugin/
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
require_once('admin/mcq-quiz-sql.php');

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
  add_submenu_page('mcq-quiz-plugin','Delete Quiz', 'Delete Quiz', 'manage_options', 'mcq-delete-quiz','mcq_delete_quiz');
  // add_submenu_page('mcq-quiz-plugin','Leaderboard', 'Leaderboard', 'manage_options', 'mcq-quiz-leaderboard','mcq_quiz_leaderboard');
  // add_submenu_page('mcq-quiz-plugin','View Answer', 'View Answer', 'manage_options', 'mcq-quiz-view-answer','mcq_quiz_view_answer');
  // add_submenu_page('mcq-quiz-plugin','Quiz Dasboard', 'Quiz Dasboard', 'manage_options', 'mcq-quiz-dashboard','mcq_quiz_dashboard');

}
function mcq_quiz_add() {
  // echo "Add quizes page";
  include_once('admin/admin-crud.php');
}
function mcq_delete_quiz() {
  include_once('admin/mcq-delete.php');
}
function mcq_quiz_leaderboard() {
  // echo "leaderboard page";
  include_once('leaderboard.php');
}
function mcq_quiz_dashboard($atts) {
  // $atts =shortcode_atts(array(
  //   'cat'=>'DAILY_QUIZ'
  // ), $atts);
  // echo "Welcome".$atts['cat'];
  // global $quiz_category;
  // $quiz_category = $atts['cat'];
 include_once('quiz-dashboard.php');

}

function crud_quiz_question() {
  include_once('mcq-quiz-list.php');
}
function mcq_quiz_view_answer() {
  include_once('mcq-quiz-view-answer.php');
  // include_once('leaderboard.php');
  // include_once('mcq-quiz-view-answer.php');
}

function mcq_quiz_list() {
  include_once('admin/admin-mcq-quiz-list.php');
}
function mcq_quiz_exam($atts) {
  $atts =shortcode_atts(array(
    'cat'=>'DAILY_QUIZ'
  ), $atts);
  // echo "Welcome".$atts['cat'];
  global $quiz_category;
  $quiz_category = $atts['cat'];
  include_once('mcq-quiz-exam.php');
}

//ADD SHORT_CODE
add_shortcode('mcq_quiz_shortcode', 'mcq_quiz_list');
add_shortcode('mcq_quiz_shortcode_exam', 'mcq_quiz_exam');
add_shortcode('mcq_quiz_shortcode_leaderboard', 'mcq_quiz_leaderboard');
add_shortcode('mcq_quiz_shortcode_view_answer', 'mcq_quiz_view_answer');
add_shortcode('mcq_quiz_shortcode_dashboard', 'mcq_quiz_dashboard');
//TODO use in template file template
// do_shortcode('[mcq_quiz_shortcode]')
function mcq_quiz_plugins_style(){
  $ver = filemtime(plugin_dir_path(__FILE__).'style.css');
  wp_enqueue_style('mcqQuizPluginsStyle1', plugins_url('style.css', __FILE__), '', $ver);
  wp_enqueue_style('mcqQuizPluginsStyle2', '//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css');
}

function mcq_quiz_plugins_scripts(){
  $ver = '1.10.22';
  wp_enqueue_script('jquery-datatables-js','//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js', array('jquery'), $ver, true);
}


add_action('wp_enqueue_scripts','mcq_quiz_plugins_style');
add_action('wp_enqueue_scripts','mcq_quiz_plugins_scripts',18);


?>