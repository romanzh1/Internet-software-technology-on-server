
<?php
    $mysqli = mysqli_init();
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    $mysqli->real_connect("localhost", "root", "", "exam_and_pass_form");
    
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $id = $_POST['id'];
    $res = $mysqli->query("DELETE FROM `table_user` WHERE `id` = $id");


    header("location:tableForDelete.php");
?>

