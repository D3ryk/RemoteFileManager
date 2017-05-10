<?php
namespace RemoteFileManager\FileManager;

use RemoteFileManager\Connection\ConnectionInterface;
use RemoteFileManager\File\FileFactoryInterface;

abstract class FileManager implements FileManagerInterface
{
    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var FileFactoryInterface
     */
    protected $fileFactory;

    /**
     * @param ConnectionInterface $connection
     * @param FileFactoryInterface $fileFactory
     */
    public function __construct(ConnectionInterface $connection, FileFactoryInterface $fileFactory)
    {
        $this->connection = $connection;
        $this->fileFactory = $fileFactory;
        $this->establishConnection();
    }

    /**
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return FileFactoryInterface
     */
    public function getFileFactory()
    {
        return $this->fileFactory;
    }

    private function establishConnection()
    {
        $this->connection->connect();
    }
}