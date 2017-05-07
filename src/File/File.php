<?php
namespace RemoteFileManager\File;

class File
{
    private $path;
    private $name;

    public function __construct($path, $name)
    {
        $this->path = $path;
        $this->name = $name;
    }

    public function getFileName()
    {
        return $this->name;
    }

    public function getFilePath()
    {
        return $this->path;
    }

    public function getFullName()
    {
        return $this->path . (substr($this->path, -1) == DIRECTORY_SEPARATOR ? "" : DIRECTORY_SEPARATOR) . $this->name;
    }
}