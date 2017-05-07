<?php
namespace RemoteFileManager\Connection;

interface ConnectionInterface
{
    public function connect();
    public function disconnect();
    public function isConnectionEstablished();
    public function getConnectionResource();
}