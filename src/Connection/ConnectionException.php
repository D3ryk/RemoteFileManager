<?php
namespace RemoteFileManager\Connection;

class ConnectionException extends \Exception
{
    /**
     * @return ConnectionException
     */
    public static function connectionNotEstablished()
    {
        return new self("Connection not established");
    }

    /**
     * @return ConnectionException
     */
    public static function failToAuthenticateConnection()
    {
        return new self("Fail to authenticate connection");
    }
}