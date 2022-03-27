<?php require_once('permissions/login_require.php') ?>
<?php include 'include/header.php' ?>
<?php include 'db.php'; ?>
<?php
if (isset($_GET['id'])) {
  $q = "SELECT * FROM exams WHERE exam_name = '%s';";
  $q = sprintf($q, $_GET['id']);
  $result = $conn->query($q);
  $all = $result->fetch_all();
}

if (isset($_POST['submit'])) {
  $all_questions = array();
  $all_answers = array();
  $all_correction = array();


  foreach ($_POST as $key => $value) {
    $question_slices = explode('__',$key);
    if (isset($question_slices[1])) {
    $slice_key = $question_slices[0];
    $slice_id = $question_slices[1];
    if ($slice_key == 'question') {
      array_push($all_questions,$key);
    }elseif ($slice_key == 'answer') {
      array_push($all_answers,$key);
    }elseif($slice_key == 'correct_answer'){
      array_push($all_correction,$key);

    }
  }
}

foreach ($all_questions as $Q_key => $Q_value) {
  $question_slices = explode('__',$Q_value);
  $q_id = explode('__',$Q_value)[1];

  if (isset($question_slices[1])) {
    foreach ($all_answers as $A_key => $A_value) {
      $answer_slices = explode('__',$A_value);

      if ($answer_slices[1] == $question_slices[1] ) {
        $question = $_POST[$Q_value];
        $answer = $_POST[$A_value];
        $exam_name = $_POST['exam_name'];
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];


        if ($_POST['answer__'.$q_id] == $_POST['correct_answer__'.$q_id]) {
          $correct_answer = "true";
        }else {
          $correct_answer = "false";
        }


        $q = "INSERT INTO exams_submit (question,answer,correct_answer,exam_name,username, name) VALUES ('%s','%s','%s','%s','%s','%s')";
        $q = sprintf($q,$question, $answer,$correct_answer,$exam_name,$username,$name);
        $result = $conn->query($q);

      }

    }


  }
}

}
 ?>

  <div class="jumbotron text-center">
      <h1>Testing</h1>
<hr>

<form class="" action="" method="post">
  <div class="">
    <input type="hidden" name="exam_name" value="<?php echo $_GET['id'] ?>">
    <?php foreach ($all as $value): ?>
      <h3><?php echo $value[1]; ?></h3>
      <input type="hidden" name="question__<?php echo $value[0]?>" value="<?php echo $value[1]; ?>">
      <p><input type="radio" name="answer__<?php echo $value[0]?>" value="<?php echo $value[2] ?>"><?php echo $value[2] ?></p>
      <p><input type="radio" name="answer__<?php echo $value[0]?>" value="<?php echo $value[3] ?>"><?php echo $value[3] ?></p>
      <p><input type="radio" name="answer__<?php echo $value[0]?>" value="<?php echo $value[4] ?>"><?php echo $value[4] ?></p>
      <input type="hidden" name="correct_answer__<?php echo $value[0]?>" value="<?php echo $value[5]; ?>">
    <?php endforeach; ?>
    <?php if ($_SESSION['username'] != 'admin'): ?>
      <input type="submit" name="submit" value="submit">
    <?php endif; ?>
  </div>
</form>

<?php include 'include/footer.php' ?>
