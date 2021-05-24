<?php
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "exam_and_pass_form");

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$firstName=$_GET['firstName'];
$lastName=$_GET['lastName'];
$middleName=$_GET['middleName'];
$faculty=$_GET['faculty'];
$group=$_GET['group'];
$subject=$_GET['subject'];
$exam_date=$_GET['calendar'];
$exam_time=$_GET['calendarTime'];

$mysqli->query("INSERT INTO `table_user`(`name`, `surname`, `middlename`, `group`, `subject`, `faculty`, `exam_date`, `exam_time`) 
VALUES (\"$firstName\",\"$lastName\",\"$middleName\",\"$group\",\"$subject\",\"$faculty\",\"$exam_date\",\"$exam_time\")");
$res = $mysqli->query("SELECT * FROM `table_user` WHERE `middlename` = '$middleName'");
$row = $res->fetch_assoc();
printf("%s %s %s %s\n", $row["name"], $row["middlename"], $row["surname"], 'is add');
?>