<?php
namespace RemoteFileManager\FileManager;

use RemoteFileManager\File\File;

interface FileManagerInterface
{
    public function listFiles(File $directory);
    public function deleteFile(File $file);
    public function renameFile(File $oldFile, File $newFile);
    public function getWorkingDir();
    public function getModificationTime(File $file);
}