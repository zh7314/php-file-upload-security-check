## php-file-upload-security-check

#### 介绍
php文件上传安全检测工具类

####支持composer
```
composer require zx/php-file-upload-security-check
```

基础使用，检查

```
use Zx\PhpFileUploadSecurityCheck\SecurityCheck;

//设置文件路径
$filePath = '2.png';
SecurityCheck::setFilePath($filePath);

//检查文件mime types和文件后缀是否一致
$res = SecurityCheck::checkMimeTypeVsExtension();

//检查上传的图片文件是否一致
SecurityCheck::checkImageFile();

//检查文件是否是PHP脚本
$r = SecurityCheck::checkPHPFile();


```
