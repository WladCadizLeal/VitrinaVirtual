<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'vitrina'
) or die(mysqli_erro($mysqli));

?>
