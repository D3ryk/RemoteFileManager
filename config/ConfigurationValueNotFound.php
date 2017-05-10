<?php
namespace RemoteFileManager\Config;

class ConfigurationValueNotFound extends \Exception
{
    /**
     * @param string $key
     *
     * @return ConfigurationValueNotFound
     */
    public static function configurationValueNotFound($key)
    {
        return new self("Configuration value not found under key: " . $key);
    }
}