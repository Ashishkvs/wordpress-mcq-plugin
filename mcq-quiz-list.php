<?php
function get_mcq_quiz_question($quiz_category) {
    // create table
    global $wpdb;
    global $table_prefix;
    $table = $table_prefix.'mcq_quiz_question';
    // $quiz_category = 'DAILY_QUIZ';
    $sql="SELECT * FROM $table where category LIKE '$quiz_category'";
    $results = $wpdb->get_results($sql);
    // print_r($results);
    return $results;
}

?>
<div class="quiz-form">

</div>
<h1>Get All Questions here</h1>
<table class="table" border="2">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>

      <th scope="col">Category</th>
      <th scope="col">Question</th>
      <th scope="col">Option1</th>
      <th scope="col">Option2</th>
      <th scope="col">Option3</th>
      <th scope="col">Option4</th>
      <th scope="col">Answer</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    global $quiz_category;
         $results= get_mcq_quiz_question($quiz_category);
        //  echo "<hr>";
        //  print_r($results);
        $count =0;
        foreach($results as $result) { 
            $count++;
            // print_r($result);
            echo <<<QUESTION
                <tr>
                    <th scope="row">$count</th>
                    <td> $result->category </td>
                    <td>  $result->question  </td>
                    <td> $result->option1 </td>
                    <td> $result->option2 </td>
                    <td> $result->option3 </td>
                    <td> $result->option4 </td>
                    <td> $result->answer </td>

                </tr>
            QUESTION;
        }
    ?>
   
</tbody>
</table>