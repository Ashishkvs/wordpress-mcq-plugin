
<section>
<h1>Leaderboard</h1>
<table class="table" border="2" id="leaderboard">
    <thead class="thead-dark">
        <tr>
            <th scope="col">SNO.#</th>
            <th scope="col">Name</th>
            <th scope="col">Score</th>
            <th scope="col">Test Date</th>

        </tr>
    </thead>
    <tbody>
        <?php 
            // global $quiz_category;
        // $quiz_category = 'CIVIL-QUIZ';
            $quiz_category = $_GET['q'];
            $results= get_mcq_quiz_exam_leaderboard($quiz_category);
            $questions = get_mcq_quiz_question($quiz_category);
            $serial_number =0;
            foreach($results as $result) { 
                $serial_number++;
                $score= getScore($result->answer_key, $questions);
                // print_r($result);
                echo <<<LEADERBOARD
                    <tr>
                        <th scope="row">$serial_number</th>
                        <td> $result->name </td>
                        <td> $score  </td>
                        <td> $result->created_at </td>
                    </tr>
                LEADERBOARD;
            }
        ?>
    </tbody>
</table>

<?php
    function getScore($answers, $questions) {
        
        $total_marks =0;
        $total_score =0;
        $total_negative =0;
        $score_count =0;
        $exam_answers = json_decode($answers, TRUE);
        // print_r($exam_answers);
    //    print_r($questions);
    
       foreach($questions as  $ques ) {
           $key = 'answer_'.$ques->id;
           $total_marks += $ques->mark;
           $ques_answer = $ques->answer;
            // echo "user_answer $user_answer";
           if(isset($exam_answers[$key]) && $exam_answers[$key] == $ques_answer) {
               $total_score +=$ques->mark;
           }else if(isset($exam_answers[$key]) && $exam_answers[$key] != $ques_answer) {
                //TURN ON NEGATIVE MARK    
            //$total_score -=$ques->mark;
           }
       
       }
       $percent = ($total_score/$total_marks)*100;
    //    <b>($percent %)</b>
        return "$total_score / $total_marks ";
    }

?>
<section>
<script>
(function($){})(jQuery);
$(document).ready(function () {
    $('#leaderboard').DataTable();
});
</script>