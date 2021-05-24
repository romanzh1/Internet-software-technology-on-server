
<?php
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "exam_and_pass_form");

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM `table_user` ORDER BY id ASC");
$row = $res->fetch_assoc();

$strIdStudent = "";
$strNameStudent = "";
$strSurnameStudent = "";
$strMiddleNameStudent = "";
$strFacultyStudent = "";
$strGroupStudent = "";
$strSubjectStudent = "";
$strExamDateStudent = "";
$strExamTimeStudent = "";

echo <<< qq1
<html>
	<head>
		<title>Страница формы администратора</title>
		<link rel="STYLESHEET" type="text/css" href="Rules for deletePage.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Задание 10" />
	</head>
	<body>
			<div class="block2">
                <table id = "table">
                <caption>ПРОВЕРЬТЕ И ПОДТВЕРДИТЕ ЗАПИСЬ НА ЗАЧЕТ</caption>
                    <tr>
                        <th>Студент</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отчество</th>
                        <th>Группа</th>
                        <th>Предмет</th>
                        <th>Факультет</th>
                        <th>Дата сдачи</th>
                        <th>Время сдачи</th>
                        <th></th>
                    </tr>
qq1;


for ($row_no = 0; $row_no < $res->num_rows; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();

    $id=$row['id'];
    $name=$row['name'];
    $surname=$row['surname'];
    $middleName=$row['middlename'];
    $faculty=$row['faculty'];
    $group=$row['group'];
    $subject=$row['subject'];
    $examDate=$row['exam_date'];
    $examTime=$row['exam_time'];

    echo <<< qq
        <tr>
            <td>$id</td>
            <td>$name</td>
            <td>$surname</td>
            <td>$middleName</td>
            <td>$faculty</td>
            <td>$group</td>
            <td>$subject</td>
            <td>$examDate</td>
            <td>$examTime</td>
            <td>
            <form name="first_f" method="post" action="deleteStudent.php">
                    <input type="hidden" name="id" value="$id">
                    <input type="submit" value="удалить">
                </form>
            </td>
        </tr>
    qq;
}


echo <<< qq2
                </table>
                 
             </div>
	</body>
</html>
qq2;
?>
