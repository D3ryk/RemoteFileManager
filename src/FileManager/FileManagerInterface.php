<?php
namespace RemoteFileManager\FileManager;

use RemoteFileManager\File\File;

interface FileManagerInterface
{
    /**
     * @param File $directory
     *
     * @return mixed
     */
    public function listFiles(File $directory);

    /**
     * @param File $file
     *
     * @return mixed
     */
    public function deleteFile(File $file);

    /**
     * @param File $oldFile
     * @param File $newFile
     *
     * @return mixed
     */
    public function renameFile(File $oldFile, File $newFile);

    /**
     * @return mixed
     */
    public function getWorkingDir();

    /**
     * @param File $file
     *
     * @return mixed
     */
    public function getModificationTime(File $file);
}