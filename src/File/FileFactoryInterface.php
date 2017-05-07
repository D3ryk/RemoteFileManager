<?php
namespace RemoteFileManager\File;

interface FileFactoryInterface
{
    public function createFileList(array $list);
    public function createFile($path, $name);
    public function creteFileFromFullPath($fullPath);
}