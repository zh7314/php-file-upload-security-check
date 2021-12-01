<?php

include_once './../src/SecurityCheck.php';
include_once './../src/MimeTypes.php';

use Zx\PhpFileUploadSecurityCheck\SecurityCheck;

//$filePath = 'Makefile.pdf';
//$filePath = 'Makefile.pdf1';
//$filePath = '2.png';
//$filePath = 'z11.png';
$filePath = 'pp.png';
//$filePath = '1.png';

//$filePath = 'H13ca837b3d674dd4bd4a5a4131ea30dbd.jpg';
//$filePath = 'image20211113143933GSCLQR.php';


//php木马文件
//$filePath = 'muma.jpg';

SecurityCheck::setFilePath($filePath);

//$res = SecurityCheck::checkMimeTypeVsExtension();
//if ($res) {
//    echo 'ok';
//} else {
//    echo 'no';
//}

//print_r(mime_content_type($filePath));
//$res = SecurityCheck::checkImageFile();
//if ($res) {
//    echo 'ok';
//} else {
//    echo 'no';
//}

$r = SecurityCheck::checkPHPFile();
if ($r) {
    echo 'you';
} else {
    echo 'no';
}


/*$str = '<?php ?> <? ?> <script /script> <% %> <?PHP ?> <SCRIPT /SCRIPT>';*/
//$data =  hex2bin(SecurityCheck::strToHex($str));
//file_put_contents('z11.png',$data);
//print_r(mime_content_type('pp.png'));

