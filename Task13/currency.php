<?php
$html = file_get_contents('http://cbr.ru/currency_base/daily/?date_req=1.04.2019');
if (preg_match("/<td>840<\/td>\s*<td>USD<\/td>\s*<td>1<\/td>\s*<td>Доллар США<\/td>\s*<td>(\d+,\d+)<\/td>/mi", $html, $matches)) {
    echo " 1 доллар США(USD) = $matches[1] <br/>";
    } else {
    echo "Вхождение не найдено.";
    }

if (preg_match("/<td>978<\/td>\s*<td>EUR<\/td>\s*<td>1<\/td>\s*<td>Евро<\/td>\s*<td>(\d+,\d+)<\/td>/mi", $html, $matches)) {
echo " 1 евро (EUR) = $matches[1] <br/>";
} else {
echo "Вхождение не найдено.";
}

if (preg_match("/<td>392<\/td>\s*<td>JPY<\/td>\s*<td>100<\/td>\s*<td>Японских иен<\/td>\s*<td>(\d+,\d+)<\/td>/mi", $html, $matches)) {
    echo " 100 Японских иен (JPY) = $matches[1] <br/>";
    } else {
    echo "Вхождение не найдено.";
    }

if (preg_match("/<td>826<\/td>\s*<td>GBP<\/td>\s*<td>1<\/td>\s*<td>Фунт стерлингов Соединенного королевства<\/td>\s*<td>(\d+,\d+)<\/td>/mi", $html, $matches)) {
    echo " 1 Фунт стерлингов Соединенного королевства (GBR) = $matches[1]";
    } else {
    echo "Вхождение не найдено.";
    }
?>