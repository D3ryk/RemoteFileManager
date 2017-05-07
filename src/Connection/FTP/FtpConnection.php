<?php
namespace RemoteFileManager\Connection\FTP;

use RemoteFileManager\Connection\ConnectionException;
use RemoteFileManager\Connection\ConnectionInterface;

class FtpConnection implements ConnectionInterface
{
    const DEFAULT_FTP_PORT = 21;

    private $host;
    private $login;
    private $password;
    private $port;
    private $resource;

    public function __construct($host, $login, $password, $port = self::DEFAULT_FTP_PORT)
    {
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->port = $port;
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    public function connect()
    {
        $this->resource = ftp_connect($this->host, $this->port);
        if ($this->isConnectionEstablished()) {
            $this->authenticateFtpConnection();
        }
    }

    public function disconnect()
    {
        if ($this->isConnectionEstablished()) {
            ftp_close($this->resource);
        }
    }

    public function getConnectionResource()
    {
        if (!$this->isConnectionEstablished()) {
            throw ConnectionException::connectionNotEstablished();
        }

        return $this->resource;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function isConnectionEstablished()
    {
        if (is_null($this->resource)) {
            return false;
        }
        return true;
    }

    private function authenticateFtpConnection()
    {
        if(!ftp_login($this->resource, $this->login, $this->password)) {
            throw ConnectionException::failToAuthenticateConnection();
        }
    }
}