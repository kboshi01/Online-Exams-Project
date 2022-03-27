<?php require_once('permissions/login_require.php') ?>
<?php include 'include/header.php' ?>
<?php include 'db.php'; ?>
<?php
$q = "SELECT DISTINCT exam_name FROM exams;";
$result = $conn->query($q);
$all = $result->fetch_all();

 ?>

  <div class="jumbotron text-center">
      <h1>Exam</h1>

<table>
  <tr>
    <td>Exams</td>
  </tr>
  <?php foreach ($all as $value): ?>
    <tr>
      <td><a href="exam.php?id=<?php echo $value[0];?>"><?php echo $value[0];?></a> </td>
    </tr>

  <?php endforeach; ?>

</table>



<?php include 'include/footer.php' ?>
