<?php
namespace RemoteFileManager\File\FTP;

use RemoteFileManager\File\File;
use RemoteFileManager\File\FileFactoryInterface;

class FtpFileFactory implements FileFactoryInterface
{

    public function createFileList(array $list)
    {
        $fileList = array();
        if (!count($list) > 1) {
            return $fileList;
        }

        $filePath = array_shift($list);

        foreach ($list as $fileName) {
            $fileList[] = new File($filePath, $fileName);
        }

        return $fileList;
    }

    public function createFile($path, $name)
    {
        return new File($path, $name);
    }

    public function creteFileFromFullPath($fullPath)
    {
        $pathInfo = pathinfo($fullPath);
        return new File($pathInfo["dirname"], $pathInfo["basename"]);
    }

}