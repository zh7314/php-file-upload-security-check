<?php

include_once './../src/SecurityCheck.php';
include_once './../src/MimeTypes.php';

use Zx\PhpFileUploadSecurityCheck\SecurityCheck;

$filePath = '111';
SecurityCheck::setFilePath($filePath);

SecurityCheck::check();
