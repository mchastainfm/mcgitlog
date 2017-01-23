<?php

namespace Mclog\;

class mclog
{
    public function __construct()
        {
            return "mclog construct run";
        }
    public static function log($logMessage = 'mclog',$logVar = "no variable set", $end = "")
        {
            $toLog = $logVar;
            if (is_object($logVar)){
                $toLog = (array) $logVar;
            }

            file_put_contents('./log.json', "{\n" . $logMessage . ":  " .  json_encode($toLog, JSON_PRETTY_PRINT)  . "\n\n}" . $end, FILE_APPEND);
        }
    public static function startLog($logname = '')
        {


        $t = time();
        exec("cp ./log.json ./logb.json");
            file_put_contents('./log.json', "{\"" . $logname . "\": \"" .  date("Y-m-d h:i:sa",$t) ."\"\n\n");
        }

}
