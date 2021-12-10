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
                    <p class="strong"> $result->question</p>
                     <p id="_1answer_$result->id"><b>(1)</b>  $result->option1</p>
                     <p id="_2answer_$result->id"><b>(2)</b>  $result->option2</p>
                     <p id="_3answer_$result->id"><b>(3)</b>  $result->option3</p>
                     <p id="_4answer_$result->id"><b>(4)</b>  $result->option4</p>
                    <p style="color:green;"><b> Answer: $result->answer</p></b>
                    <p>Explanation :</p>
                    <p>$result->extra</p>
                </div>
            </div>
        QUIZ;
    }
}

?>
</section>

<script>
    
    var item = window.sessionStorage.getItem('QUIZ_ANSWER');
    var answers = item ? JSON.parse(item) : {}
    // console.log('ANSWESR',JSON.stringify(answers));
    for(let key in answers) {
        console.log(key);
       console.log(answers[key]);
       document.getElementById('_'+answers[key]+key).style.backgroundColor = "#F2F2FF";
    }

</script>
