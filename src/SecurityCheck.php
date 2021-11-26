<?php

namespace Zx\PhpFileUploadSecurityCheck;

use Zx\PhpFileUploadSecurityCheck\MimeTypes;
use SplFileObject;

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

    public static function check(bool $allowMimeType = true)
    {
        if (empty(self::$filePath)) {
            throw new \Exception('待检测文件路径不能为空');
        }
//        print_r(self::$filePath);
        //判断文件是否存在，
        if (!file_exists(self::$filePath)) {
            throw new \Exception('待检测文件未找到');
        }
        //获取
        $fileMimeType = mime_content_type(self::$filePath);

        $file = new  SplFileObject(self::$filePath, 'r');
        $extension = $file->getExtension();

        //检测mime type和文件后缀是否一致
        if ($allowMimeType) {
            $result = self::checkMimeTypeVsExtension($fileMimeType, $extension);
            if (!$result) {
                throw new \Exception('文件头信息和文件后缀不一致');
            }
        }
        //检查文件后缀

        die;
    }

    protected static function checkMimeTypeVsExtension(string $fileMimeType, string $extension)
    {
        if (empty($fileMimeType)) {
            throw new \Exception('文件头信息不能为空');
        }
        if (empty($extension)) {
            throw new \Exception('文件后缀不能为空');
        }
        $mimeTypes = MimeTypes::getData();

        $isExist = array_key_exists($fileMimeType, $mimeTypes);

        if (!$isExist) {
            throw new \Exception('非允许mime types类型');
        }
        $allType = $mimeTypes[$fileMimeType];
        if (empty($allType)) {
            throw new \Exception('基础数据丢失');
        }

        if (!in_array($extension, $allType)) {
            return false;
        } else {
            return true;
        }
    }
}
