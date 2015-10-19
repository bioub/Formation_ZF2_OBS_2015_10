<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orange\Logger;

/**
 * Description of FileLoggerAvecTrait
 *
 * @author romain
 */
class FileLoggerAvecTrait implements \Psr\Log\LoggerInterface
{
    use \Psr\Log\LoggerTrait;
    
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
