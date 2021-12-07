
<main id="site-content" role="main" >
    <h1>Quiz System</h1>

    <form method="post" style="width:30%; ">
        <label >Category</label> <input type="text" name="category" required
            placeholder="Enter Question CATEGORY">
        <label >Question</label> <input type="text" name="question" required
            placeholder="Enter Quiz question here">
        <label >Option1</label> <input type="text" name="option1" required placeholder="Enter Option 1 here">
        <label >Option2</label> <input type="text" name="option2" required placeholder="Enter Option 2 here">
        <label >Option3</label> <input type="text" name="option3" required placeholder="Enter Option 3 here">
        <label >Option4</label> <input type="text" name="option4" required placeholder="Enter Option 4 here">
        <label >Answer</label>
        <select name="answer" required>
            <option value="">--Select Answer--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <label >Mark</label> <input type="number" name="mark" required placeholder="Enter Mark here">

        <input type="submit" value="Add quiz" name="admin_quiz_form">
    </form>

</main><!-- #site-content -->
<?php
//QUIZ FORM

if(isset($_POST['admin_quiz_form'])){
    global $wpdb;
    global $table_prefix;
    $data = array(
        'category' => $_POST['category'],
        'question' => $_POST['question'],
        'option1'=> $_POST['option1'],
        'option2'=> $_POST['option2'],
        'option3'=> $_POST['option3'],
        'option4'=> $_POST['option4'],
        'answer'=> $_POST['answer'],
        'mark'=> $_POST['mark'],
        //    'created_at'=> current_time( 'mysql' ),
    );
    $table = $table_prefix.'mcq_quiz_question';
        $result = $wpdb -> insert($table, $data, $format=NULL);
        if($result == true) {
            echo "<script> alert('Question added successfully')</script>";
        } else {
            echo "<script> alert('Error Question Added')</script>";
    }
    //echo "<script> window.location = '#';</script> ";
}
?>
    
<!-- //Stop form resubmisson -->
<script>
    if(window.history.replaceState) {
        window.history.replaceState(null,null,window.location.href);
    }

</script>