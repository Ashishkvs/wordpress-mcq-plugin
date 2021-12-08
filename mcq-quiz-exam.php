<?php 
$quiz_search_results= get_mcq_quiz_question($quiz_category);
$count=0;
if($quiz_search_results){
    echo '<div id="ten-countdown" style=" display:inline-block; float:right;margin:15px; background-color:red; color:white; padding:10px;"></div><hr>';
    echo '<form method="post">';

    foreach( $quiz_search_results as $result ) { 
        $count++;
        //echo $result->question;
        
echo <<<QUIZ
<div style="width:auto; padding:10px; margin:5px;">
<p>Question $count : <span class="float-right" style="float:right;"> 2 points </span></p>
<div class="quiz-question">
<p> $result->question</p>
<input type="radio" class="" value="1" name="answer_$result->id" ><span >$result->option1</span><br>
<input type="radio" class="" value="2" name="answer_$result->id" ><span >$result->option2</span><br>
<input type="radio" class="" value="3" name="answer_$result->id" ><span >$result->option3</span><br>
<input type="radio" class="" value="4" name="answer_$result->id" ><span >$result->option4</span><br>
</div>
</div>
QUIZ;
}

echo '<input type="submit" class="btn" style="float:right;" name="mcq_daily_quiz_form" value="Submit Answer">';
echo "</form>";
}

// todo testing     
// echo "function ::"+ fetchLeaderBoard('DAILY_QUIZ');
?>
</section>
<?php 
//submit quiz answer
if(isset($_POST['mcq_daily_quiz_form'])){
	global $quiz_category;
    global $wpdb;
    global $table_prefix;
    $table = $table_prefix.'mcq_quiz_exam';
	$data = array(
		'name' => 'Ashish',
		'email' => 'ashishkvs@gmail.com',
		'answer_key'=> json_encode($_POST),
		'quiz_category'=> $quiz_category,
	);
	$table_name = 'wp_quiz_exam_answer';
	$result = $wpdb -> insert($table, $data, $format=NULL);
	if($result == true) {
		echo "<script> alert('Answer submitted Successfully')</script>";
	} else {
		echo "<script> alert('Error Submission Answer')</script>";
	}
	
	//echo "<script> window.location = '#';</script> ";
}


?>

<script>

function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time is up!";
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

countdown( "ten-countdown", 60, 0 );

</script>

<!-- //Stop form resubmisson -->
<script>
    if(window.history.replaceState) {
        window.history.replaceState(null,null,window.location.href);
    }

</script>