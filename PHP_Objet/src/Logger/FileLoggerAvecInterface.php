<?php

namespace Orange\Logger;

class FileLoggerAvecInterface implements \Psr\Log\LoggerInterface
{

    protected $fic;

    public function __construct($filePath)
    {
        $this->fic = fopen($filePath, 'a');
    }

    public function __destruct()
    {
        fclose($this->fic);
    }

    public function alert($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::ALERT, $message);
    }

    public function critical($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::CRITICAL, $message);
    }

    public function debug($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::DEBUG, $message);
    }

    public function emergency($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::EMERGENCY, $message);
    }

    public function error($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::ERROR, $message);
    }

    public function info($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::INFO, $message);
    }

    public function log($level, $message, array $context = array())
    {
        // [warning] 2015-10-19 16:02:32 - Un message\n
        $date = date('Y-m-d H:i:s');
        $log = "[$level] $date - $message\n";
        
        fwrite($this->fic, $log);
    }

    public function notice($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::NOTICE, $message);
    }

    public function warning($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::WARNING, $message);
    }

}
