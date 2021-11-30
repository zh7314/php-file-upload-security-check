<?php

namespace Zx\PhpFileUploadSecurityCheck;

use Zx\PhpFileUploadSecurityCheck\MimeTypes;
use SplFileObject;
use Exception;

class SecurityCheck
{

    //不用string 兼容更多的PHP版本
    protected static $filePath = '';

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

    /**
     * 获取文件基本信息
     * @return array
     * @throws \Exception
     */
    public static function getFileInfo()
    {
        if (empty(self::$filePath)) {
            throw new \Exception('待检测文件路径不能为空');
        }
        //判断文件是否存在，
        if (!file_exists(self::$filePath)) {
            throw new \Exception('待检测文件未找到');
        }
        //获取 mime.type
        $fileMimeType = mime_content_type(self::$filePath);
        $file = new  SplFileObject(self::$filePath, 'r');

        return [$fileMimeType, $file];
    }

    /**
     * 检查上传图片是否是图片文件
     * @throws \Exception
     */
    public static function checkImageFile()
    {
        [$fileMimeType, $file] = self::getFileInfo();
        $mimeTypes = MimeTypes::getImage();

        $isExist = array_key_exists($fileMimeType, $mimeTypes);
        if (!$isExist) {
            throw new \Exception('非允许mime types类型');
        }
        if (empty($mimeTypes[$fileMimeType])) {
            throw new \Exception('基础数据丢失');
        }
        //通过基础的mime type验证之后
        $extension = $file->getExtension();

        try {
            list($width, $height, $type, $attr) = getimagesize($file->getRealPath(), $extension);
            if ($width <= 0 || $height <= 0) {
                return false;
            } else {
                return true;
            }

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * 检查文件MimeType和文件后缀是否一致
     * @return bool
     * @throws \Exception
     */
    public static function checkMimeTypeVsExtension()
    {
        [$fileMimeType, $file] = self::getFileInfo();

        $extension = $file->getExtension();
        $mimeTypes = MimeTypes::getData();

        $isExist = array_key_exists($fileMimeType, $mimeTypes);
        if (!$isExist) {
            throw new \Exception('非允许mime types类型');
        }
        if (empty($mimeTypes[$fileMimeType])) {
            throw new \Exception('基础数据丢失');
        }

        if (in_array($extension, $mimeTypes[$fileMimeType])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 怀疑上传文件是否是php脚本文件
     * @throws \Exception
     */
    public static function checkPHPFile()
    {
        [$fileMimeType, $file] = self::getFileInfo();

    }
}
