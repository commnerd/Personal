<?php

namespace App\Services;

use App\Services\Converters\Calculator;

class System
{
    public function getOS(): string
    {
        return php_uname('s');
    }

    public function getDiskUsage(): string
    {
        $free = disk_free_space('/');
        $total = disk_total_space('/');
        $used = $total - $free;

        $usagePercent = number_format(100 * ($used / $total))."%";
        $used = Calculator::metric($used, 1)."B";
        $total = Calculator::metric($total, 1)."B";

        return $used." / ".$total." (".$usagePercent.")";
    }

    public function getUptime(): string
    {
        $uptime = '';

        try {
            $uptime = shell_exec('uptime -p');
        }
        catch (Exception $e) {
            try {
                $uptime = trim(explode(',', shell_exec('uptime'))[0]);
            }
            catch (Exception $e) {
                // Do nothing
            }
            
        }
        return $uptime || 'Something went wrong during uptime calculation';
    }
}
