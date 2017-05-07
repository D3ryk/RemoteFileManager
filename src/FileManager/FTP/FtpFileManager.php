<?php
namespace RemoteFileManager\FileManager\FTP;

use RemoteFileManager\File\File;
use RemoteFileManager\FileManager\FileManager;
use RemoteFileManager\FileManager\FileManagerException;

class FtpFileManager extends FileManager
{

    public function listFiles(File $directory)
    {
        $list = ftp_nlist($this->getConnection()->getConnectionResource(), $directory->getFullName());
        if (!$this->isResultOfFtpOperationSuccess($list)) {
            $list = array();
        }
        array_unshift($list, $directory->getFullName());
        return $this->getFileFactory()->createFileList($list);
    }

    public function deleteFile(File $file)
    {
        return ftp_delete($this->getConnection()->getConnectionResource(), $file->getFullName());
    }

    public function renameFile(File $oldFile, File $newFile)
    {
        return ftp_rename($this->getConnection()->getConnectionResource(), $oldFile->getFullName(), $newFile->getFileName());
    }

    public function getWorkingDir()
    {
        $pwd = ftp_pwd($this->getConnection()->getConnectionResource());;
        if (!$this->isResultOfFtpOperationSuccess($pwd)) {
            return false;
        }
        return $this->getFileFactory()->creteFileFromFullPath($pwd);
    }

    public function getModificationTime(File $file)
    {
        $modTime = ftp_mdtm($this->getConnection()->getConnectionResource(), $file->getFullName());
        if ($modTime == -1) {
            throw FileManagerException::errorWhilePickingFileModificationTime();
        }
        return $modTime;
    }

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