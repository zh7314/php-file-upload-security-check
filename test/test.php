<?php

include_once './../src/SecurityCheck.php';
include_once './../src/MimeTypes.php';

use Zx\PhpFileUploadSecurityCheck\SecurityCheck;

//$filePath = 'Makefile.pdf';
//$filePath = 'Makefile.pdf1';
//$filePath = '2.png';

//php木马文件
$filePath = 'phpmuma.jpg';


SecurityCheck::setFilePath($filePath);

//$res = SecurityCheck::checkMimeTypeVsExtension();
//if ($res) {
//    echo 'ok';
//} else {
//    echo 'no';
//}


//var_dump(gd_info());

SecurityCheck::checkImageFile();
//PHP_EOL

PHP_
