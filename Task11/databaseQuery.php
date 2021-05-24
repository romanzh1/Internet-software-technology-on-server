<?php
header("Cache-Control: no-cache, must-revalidate");
// Прошедшая дата
header("Expires: Mon, 1 Sep 2008 07:30:00 GMT");
// Инициализация массива названий
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli->real_connect("localhost", "root", "", "car brands");

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM `car brand` ORDER BY id ASC");

$brand[]="";

for ($row_no = 0; $row_no < $res->num_rows; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();

    $brand[]=$row['name brand'];
}

//получение параметра q из URL
$q = $_GET["q"];
//поиск соответствий из массива, если длина q > 0
if (strlen($q) > 0)
{
    $hint = "";
    for($i = 0; $i<count($brand); $i++)
    {
        if (strtolower($q) == strtolower(substr($brand[$i],0,strlen($q))))
        {
            if ($hint == "")
            {
                $hint=$brand[$i];
            }
            else
            {
                $hint=$hint." , ".$brand[$i];
            }   
        }
    }
}
// Возврат строки "нет вариантов" если соответствий не найдено
// либо найденное соответствие
if ($hint == "")
{
    $response = "no suggestion";
}
else
{
    $response = $hint;
}
//вывод результата
echo $response;
?>