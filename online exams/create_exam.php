<?php require_once('permissions/login_require.php') ?>
<?php include 'include/header.php' ?>
<?php include 'db.php'; ?>
<?php
if (isset($_POST['submit'])) {
  $all_questions = array();
  $all_answers = array();
  $all_correction = array();

  foreach ($_POST as $key => $value) {
    $slices = explode("__", $key);
    if ($slices[0] == 'question') {
      array_push($all_questions,$key);
    }
    if ($slices[0] == 'answer1' || $slices[0] == 'answer2' || $slices[0] == 'answer3' ) {
      array_push($all_answers,$key);
    }

    if ($slices[0] == 'correct_answer') {
      // code...
      array_push($all_correction,$key);
    }


  }

  // loop over all question to find its answers options
  foreach ($all_questions as $question_key) {
    // question_options istore all answers of this qution
    $question_options = array();
    // split to get question id
    $question_slices = explode("__", $question_key);
    // loop over all answers to match question id and answers id
    foreach ($all_answers as $answer_key) {
      // split an explode to get the random id
      $answer_slices = explode("__", $answer_key);
      // check if question id equal answer id
      if ($question_slices[1] == $answer_slices[1]) {
        // if equal it's means this answer realated to this question
        array_push($question_options,$answer_key);
      }
    }
    $question_slices = explode("__", $question_key);
    foreach ($all_correction as $corr_key) {
      $correction_slices = explode("__", $corr_key);
      if ($correction_slices[1] == $question_slices[1]) {
        $correct_answer = $_POST[$corr_key];
      }else {
        // code...
        $correct_answer = "no correction";
      }

    }
    // define query variables
    $exam_name = $_POST['exam_name'];
    $question = $_POST[$question_key];
    $answer1 = $_POST[$question_options[0]];
    $answer2 = $_POST[$question_options[1]];
    $answer3 = $_POST[$question_options[2]];
    $q = "INSERT INTO exams (questions, answer1, answer2 , answer3 ,correct_answer, exam_name) VALUES ('%s','%s','%s','%s','%s','%s')";
    $q = sprintf($q,$question, $answer1, $answer2 , $answer3 ,$correct_answer, $exam_name);
    $result = $conn->query($q);

  }






}
 ?>

  <div class="jumbotron text-center">
      <h1>Create exam</h1>
      <hr>
        <form id="create_exam" class="" action="" method="post">
          <!-- exam preview -->
        </form>
      <hr>
        <input form="create_exam" type="submit" name="submit" value="save">
      <hr>

      <hr>

        <div id="exam">
          <input dir="auto" type="text" name="question" placeholder="Question" value="">
          <input dir="auto" type="text" name="answer1" placeholder="answer1">
          <input dir="auto" type="text" name="answer2" placeholder="answer2">
          <input dir="auto" type="text" name="answer3" placeholder="answer3">
        </div>
        <br>

        <input type="text" name="take_exam_name" value="" placeholder="Insert exam name">
        <button id="create" >Create</button>
        <hr>


  </div>

<?php include 'include/footer.php' ?>
