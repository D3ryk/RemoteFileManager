<?php
namespace RemoteFileManager\File;

class File
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $path
     * @param string $name
     */
    public function __construct($path, $name)
    {
        $this->path = $path;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->path . (substr($this->path, -1) == DIRECTORY_SEPARATOR ? "" : DIRECTORY_SEPARATOR) . $this->name;
    }
}