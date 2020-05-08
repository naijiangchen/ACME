<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加数据</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php
//引入类库
include "./Classes/PHPExcel/IOFactory.php";

//elsx文件路径
$inputFileName = "./test.xlsx";

date_default_timezone_set('PRC');
// 读取excel文件
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {

}

// 确定要读取的sheet，什么是sheet，看excel的右下角，真的不懂去百度吧
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

// 获取excel文件的数据，$row=1代表从第二行开始获取数据
for ($row = 1; $row <= $highestRow; $row++){
// Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
//这里得到的rowData都是一行的数据，得到数据后自行处理，我们这里只打出来看看效果
    echo '<pre>';
    echo $rowData;
//   echo $rowData[1];
//    echo $rowData[2];
//   echo $rowData[3];

 //   var_dump($rowData);
    echo "<br>";

 }
?>
</body>
</html>
