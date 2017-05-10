<?php
namespace RemoteFileManager\FileManager\FTP;

use RemoteFileManager\File\File;
use RemoteFileManager\FileManager\FileManager;
use RemoteFileManager\FileManager\FileManagerException;

class FtpFileManager extends FileManager
{

    /**
     * @param File $directory
     *
     * @return array[] File
     */
    public function listFiles(File $directory)
    {
        $list = ftp_nlist($this->getConnection()->getConnectionResource(), $directory->getFullName());
        if (!$this->isResultOfFtpOperationSuccess($list)) {
            $list = array();
        }
        array_unshift($list, $directory->getFullName());
        return $this->getFileFactory()->createFileList($list);
    }

    /**
     * @param File $file
     *
     * @return bool
     */
    public function deleteFile(File $file)
    {
        return ftp_delete($this->getConnection()->getConnectionResource(), $file->getFullName());
    }

    /**
     * @param File $oldFile
     * @param File $newFile
     *
     * @return bool
     */
    public function renameFile(File $oldFile, File $newFile)
    {
        return ftp_rename($this->getConnection()->getConnectionResource(), $oldFile->getFullName(), $newFile->getFileName());
    }

    /**
     * @return bool|File
     */
    public function getWorkingDir()
    {
        $pwd = ftp_pwd($this->getConnection()->getConnectionResource());;
        if (!$this->isResultOfFtpOperationSuccess($pwd)) {
            return false;
        }
        return $this->getFileFactory()->creteFileFromFullPath($pwd);
    }

    /**
     * @param File $file
     *
     * @return int
     * @throws FileManagerException
     */
    public function getModificationTime(File $file)
    {
        $modTime = ftp_mdtm($this->getConnection()->getConnectionResource(), $file->getFullName());
        if ($modTime == -1) {
            throw FileManagerException::errorWhilePickingFileModificationTime();
        }
        return $modTime;
    }

    /**
     * @param bool $passiveMode
     */
    public function setPassiveMode($passiveMode)
    {
        ftp_pasv($this->getConnection()->getConnectionResource(), $passiveMode);
    }

    private function isResultOfFtpOperationSuccess($result)
    {
        if ($result === false) {
            return false;
        }
        return true;
    }
}