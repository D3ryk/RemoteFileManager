<?php
namespace RemoteFileManager\Connection;

class ConnectionException extends \Exception
{
    public static function connectionNotEstablished()
    {
        return new self("Connection not established");
    }

    public static function failToAuthenticateConnection()
    {
        return new self("Fail to authenticate connection");
    }
}