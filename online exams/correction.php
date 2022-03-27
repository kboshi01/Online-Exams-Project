<?php require_once('permissions/login_require.php') ?>
<?php include 'include/header.php' ?>
<?php include 'db.php'; ?>
<?php
if (isset($_GET['id'])) {
  // code...
  $q = "SELECT * FROM exams_submit WHERE username = '%s' AND exam_name = '%s';";
  $q = sprintf($q, $_GET['id'],$_GET['exam_name']);
  $result = $conn->query($q);
  $all = $result->fetch_all();
}

 ?>

  <div class="jumbotron text-center">
      <h1>Exam Correction</h1>
<hr>
<table>
  <tr>
    <td> <strong style="padding:10px;">Questions</strong> </td>
    <td> <strong style="padding:10px;">Answers</strong> </td>
    <td> <strong style="padding:10px;">Correction</strong> </td>
  </tr>
  <?php foreach ($all as $value): ?>
    <tr>
      <td style="padding:10px;"><?php echo $value[1];?></td>
      <td style="padding:10px;"><?php echo $value[2];?></td>
      <td style="padding:10px;"><?php echo $value[3];?></td>
    </tr>

  <?php endforeach; ?>

</table>
<?php include 'include/footer.php' ?>
