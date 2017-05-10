<?php
namespace RemoteFileManager\File;

interface FileFactoryInterface
{
    /**
     * @param array $list
     *
     * @return array[] File
     */
    public function createFileList(array $list);

    /**
     * @param string $path
     * @param string $name
     *
     * @return File
     */
    public function createFile($path, $name);

    /**
     * @param string $fullPath
     *
     * @return File
     */
    public function creteFileFromFullPath($fullPath);
}