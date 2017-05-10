<?php
namespace RemoteFileManager\Config;

class Configuration
{
    const FTP = "FTP";

    /**
     * @var array
     */
    private static $config = array(
        self::FTP => array(
            "host" => "",
            "login" => "",
            "password" => ""
        )
    );

    /**
     * @param string $key
     *
     * @return array
     * @throws ConfigurationValueNotFound
     */
    public static function getConfigValueForFTP($key)
    {
        if (isset(self::$config[self::FTP][$key])) {
            return self::$config[self::FTP][$key];
        }
        throw ConfigurationValueNotFound::configurationValueNotFound($key);
    }
}