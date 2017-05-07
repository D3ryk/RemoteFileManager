<?php
namespace RemoteFileManager\FileManager;

use RemoteFileManager\Connection\ConnectionInterface;
use RemoteFileManager\File\FileFactoryInterface;

abstract class FileManager implements FileManagerInterface
{
    protected $connection;
    protected $fileFactory;

    public function __construct(ConnectionInterface $connection, FileFactoryInterface $fileFactory)
    {
        $this->connection = $connection;
        $this->fileFactory = $fileFactory;
        $this->establishConnection();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getFileFactory()
    {
        return $this->fileFactory;
    }

    private function establishConnection()
    {
        $this->connection->connect();
    }
}