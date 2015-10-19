<?php

namespace Orange\Logger;

class FileLoggerAvecAbstract extends \Psr\Log\AbstractLogger
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
    
    public function log($level, $message, array $context = array())
    {
        // [warning] 2015-10-19 16:02:32 - Un message\n
        $date = date('Y-m-d H:i:s');
        $log = "[$level] $date - $message\n";
        
        fwrite($this->fic, $log);
    }

}
