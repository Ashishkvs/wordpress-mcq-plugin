<h1 class="text-center">Delete Quiz</h1>
<?php 

if(isset($_GET['mcqid'])){
    delete_mcq_question($_GET['mcqid']);
}
?>

<a href="admin.php?page=mcq-quiz-plugin">Go Back</a>