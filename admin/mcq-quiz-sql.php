<?php
function create_mcq_quiz_table() {
// create table
global $wpdb;
global $table_prefix;
$table = $table_prefix.'mcq_quiz_question';
$sql = "CREATE TABLE IF NOT EXISTS $table (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `category` varchar(200) NOT NULL,
    `question` text NOT NULL,
    `option1` varchar(255) NOT NULL,
    `option2` varchar(255) NOT NULL,
    `option3` varchar(255) NOT NULL,
    `option4` varchar(255) NOT NULL,
    `answer` varchar(255) NOT NULL,
    `mark` int(3) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `created_by` varchar(100) NOT NULL,
    `extra` text NOT NULL
  )";

  $wpdb ->query($sql);
}

function drop_mcq_table() {
  global $wpdb;
  global $table_prefix;
  $table1 = $table_prefix.'mcq_quiz_question';
  $table2 = $table_prefix.'mcq_quiz_exam';
  $sql = "DROP TABLE $table1, $table2";
  $wpdb ->query($sql);
}

function insert_mcq_quiz_question_dump_data() {
  global $wpdb;
  global $table_prefix;
  $table = $table_prefix.'mcq_quiz_question';
  $sql ="INSERT INTO $table (`id`, `category`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `mark`, `created_at`, `created_by`, `extra`) VALUES
  (17, 'dasd', 'asdasd', 'asdasd', 'asdasd', 'dasdsd', 'asdasd', '2', 0, '2021-12-07 11:19:14', '', ''),
  (18, 'dasd', 'asdasd', 'asdasd', 'asdasd', 'dasdsd', 'asdasd', '2', 0, '2021-12-07 11:31:26', '', ''),
  (19, 'DAILY-QUIZ', 'What is IAS Exam', 'Civil Servcies', 'Personal Services', 'Government Services', 'All of them', '4', 0, '2021-12-07 11:31:49', '', ''),
  (20, 'DAILY-QUIZ', 'With respect to “Committee on Governance Assurances” in Indian Parliament, consider the following statements.  The Committee is constituted by both the Lok Sabha & the Rajya Sabha. It was created to oversee the fulfilment of assurances given by the executive to Parliament. Speaker is the chairman of the committee in Lok Sabha. Which of the above statements is/are correct?', '1', '2', '3', '4', '3', 10, '2021-12-07 12:49:13', '', ''),
  (21, 'DAILY-QUIZ', 'With respect to “Green – Ag project” of India, consider the following statements.\r\n\r\nThe overall objective of the project is to catalyze transformative change of India’s agricultural sector to support achievement of national and global environmental benefits.\r\nThe project is assisted by Global Environment Facility (GEF).\r\nThe project has been launched for all 18 biosphere reserves of India.\r\nWhich of the above statements is/are correct?', 'Civil Servcies', 'Personal Services', 'Government Services', 'All of them', '4', 0, '2021-12-07 11:31:49', '', ''),
  (22, 'DAILY-QUIZ', 'Consider the following statements regarding Armed Forces (Special Powers) Act, 1958.\r\n\r\nOne of the special powers under this Act is: Power to use force, including opening fire, even to the extent of causing death if prohibitory orders banning assembly of five or more persons or carrying arms and weapons etc. are in force in the disturbed area\r\nThe Act provides that only Central Government can declare an area as ‘disturbed area’ where AFSPA can be applied.\r\nAs per the Constitution, it shall be the duty of the Union to protect every State against external aggression and internal disturbance.\r\nWhich of the above statements is/are correct?', '1', '2', '3', '4', '3', 10, '2021-12-07 12:49:13', '', '');
  ";
   $wpdb ->query($sql);
}

function create_mcq_quiz_exam_table() {
  // create table
  global $wpdb;
  global $table_prefix;
  $table = $table_prefix.'mcq_quiz_exam';
  $sql = "CREATE TABLE IF NOT EXISTS $table (
      `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      `name` varchar(150) NOT NULL,
      `email` varchar(150) NOT NULL,
      `answer_key` text NOT NULL,
      `quiz_category` varchar(200) NOT NULL,
      `created_at` datetime NOT NULL DEFAULT current_timestamp()
    )";
    $wpdb ->query($sql);
  }
  function insert_mcq_quiz_exam_dump_data() {
    global $wpdb;
    global $table_prefix;
    $table = $table_prefix.'mcq_quiz_exam';
    $sql ="INSERT INTO $table (`id`, `name`, `email`, `answer_key`, `quiz_category`, `created_at`) VALUES
    (16, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"1\",\"answer_21\":\"2\",\"answer_22\":\"3\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:33:00'),
    (17, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"1\",\"answer_21\":\"2\",\"answer_22\":\"3\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:33:11'),
    (18, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"1\",\"answer_21\":\"2\",\"answer_22\":\"3\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:33:36'),
    (19, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"2\",\"answer_20\":\"4\",\"answer_21\":\"4\",\"answer_22\":\"4\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:38:22'),
    (20, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"2\",\"answer_20\":\"4\",\"answer_21\":\"4\",\"answer_22\":\"4\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:38:34'),
    (21, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"2\",\"answer_20\":\"4\",\"answer_21\":\"4\",\"answer_22\":\"4\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:39:27'),
    (22, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"1\",\"answer_20\":\"2\",\"answer_22\":\"3\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:39:39'),
    (23, 'Ashish', 'ashishkvs@gmail.com', '{\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 15:40:53'),
    (24, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_17\":\"1\",\"answer_18\":\"1\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 17:25:45'),
    (25, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_17\":\"2\",\"answer_18\":\"1\",\"quiz_daily_form\":\"Submit Answer\"}', 'Submit Answer', '2021-12-07 17:28:35'),
    (26, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_19\":\"2\",\"answer_21\":\"3\",\"answer_22\":\"3\",\"quiz_daily_form\":\"Submit Answer\"}', 'DAILY-QUIZ', '2021-12-07 17:30:27'),
    (27, 'Ashish', 'ashishkvs@gmail.com', '{\"answer_17\":\"4\",\"answer_18\":\"4\",\"quiz_daily_form\":\"Submit Answer\"}', 'dasd', '2021-12-07 17:30:44');
    ";
    
    $wpdb ->query($sql);
  }

  //Fetching QUIZ QUESITION based on CTAEGORY NAME query
  function get_mcq_quiz_question($quiz_category) {
    // create table
    global $wpdb;
    global $table_prefix;
    $table = $table_prefix.'mcq_quiz_question';
    // $quiz_category = 'DAILY_QUIZ';
    $sql="SELECT * FROM $table where category LIKE '$quiz_category' ORDER BY created_at DESC";
    $results = $wpdb->get_results($sql);
    // print_r($results);
    return $results;
}
function get_all_mcq_quiz_question() {
  // create table
  global $wpdb;
  global $table_prefix;
  $table = $table_prefix.'mcq_quiz_question';
  // $quiz_category = 'DAILY_QUIZ';
  $sql="SELECT * FROM $table ORDER BY created_at DESC";
  $results = $wpdb->get_results($sql);
  // print_r($results);
  return $results;
}

//Fetching QUIZ QUESITION based on CATEGORY NAME query
function get_mcq_quiz_exam_leaderboard($quiz_category) {
  // create table
  global $wpdb;
  global $table_prefix;
  $table = $table_prefix.'mcq_quiz_exam';
  $sql="SELECT * FROM $table where quiz_category LIKE '$quiz_category' ORDER BY created_at DESC";
  $results = $wpdb->get_results($sql);
  return $results;
}
  ?>