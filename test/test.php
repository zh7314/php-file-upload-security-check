<?php

include_once './../src/SecurityCheck.php';
include_once './../src/MimeTypes.php';

use Zx\PhpFileUploadSecurityCheck\SecurityCheck;

//$filePath = 'Makefile.pdf';
//$filePath = 'Makefile.pdf1';
$filePath = '2.png';

//php木马文件
//$filePath = 'muma.jpg';

SecurityCheck::setFilePath($filePath);

//$res = SecurityCheck::checkMimeTypeVsExtension();
//if ($res) {
//    echo 'ok';
//} else {
//    echo 'no';
//}

//SecurityCheck::checkImageFile();

//$r = SecurityCheck::checkPHPFile();
//if ($r) {
//    echo 'you';
//} else {
//    echo 'no';
//}


/*$str = '<?php ?> <? ?> <script /script> <% %> <?PHP ?> <SCRIPT /SCRIPT>';*/
//$data =  hex2bin(SecurityCheck::strToHex($str));
//file_put_contents('z11.png',$data);
//print_r(mime_content_type('pp.png'));

