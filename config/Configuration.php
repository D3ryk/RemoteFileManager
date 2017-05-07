<?php
namespace RemoteFileManager\Config;

class Configuration
{
    const FTP = "FTP";

    private static $config = array(
        self::FTP => array(
            "host" => "",
            "login" => "",
            "password" => ""
        )
    );

    public static function getConfigValueForFTP($key)
    {
        return self::$config[self::FTP][$key];
    }
}