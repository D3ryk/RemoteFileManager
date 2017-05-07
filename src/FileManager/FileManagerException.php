<?php
namespace RemoteFileManager\FileManager;

class FileManagerException extends \Exception
{
    public static function errorWhilePickingFileModificationTime()
    {
        return new self("Error while picking file modification time");
    }
}