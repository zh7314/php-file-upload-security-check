<?php

namespace Zx\PhpFileUploadSecurityCheck;

use Zx\PhpFileUploadSecurityCheck\MimeTypes;

class SecurityCheck
{

    protected static string $filePath = '';

    public function __construct()
    {
        return null;
    }

    public static function setFilePath(string $filePath = '')
    {
        if (empty($filePath)) {
            throw new \Exception('待检测文件路径不能为空');
        }
        self::$filePath = $filePath;
    }

    public static function check()
    {
        if (empty(self::$filePath)) {
            throw new \Exception('待检测文件路径不能为空');
        }

        $data = MimeTypes::getData();

        print_r($data['application/octet-stream']);
    }

}
