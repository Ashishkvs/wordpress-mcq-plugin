<section>
    <h1>Solutions</h1>
<?php 
// global $quiz_category;
// echo "solution quiz category $quiz_category";

$quiz_category = $_GET['q'];
if($quiz_category){
    $quiz_search_results= get_mcq_quiz_question($quiz_category);
    $count=0;
    foreach( $quiz_search_results as $result ) { 
        $count++;
        //echo $result->question;
                
        echo <<<QUIZ
            <div style="width:auto; padding:10px; margin:5px;">
                <p>Question $count : <span class="float-right" style="float:right;"> 2 points </span></p>
                <div class="quiz-question">
                    <p> $result->question</p>
                    <span >$result->option1</span><br>
                    <span >$result->option2</span><br>
                    <span >$result->option3</span><br>
                    <span >$result->option4</span><br>
                    <span style="color:green;"><b> Answer: $result->answer</span></b><br>
                    <p>Explanation :</p>
                    <p>$result->extra</p>
                </div>
            </div>
        QUIZ;
    }
}

?>
</section>