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

    public function getMemUsage(): string
    {
        switch($this->getOS()) {
            case 'Linux':
                [$free, $total] = $this->_getLinuxMemUsage();
                break;
                
        }
        $used = $total - $free;

        $usagePercent = number_format(100 * ($used / $total))."%";
        $used = Calculator::metric($used, 1)."B";
        $total = Calculator::metric($total, 1)."B";

        return $used." / ".$total." (".$usagePercent.")";
    }

    private function _getLinuxMemUsage(): array
    {
        $data = explode("\n", file_get_contents("/proc/meminfo"));
        $memInfo = array();
        foreach ($data as $line) {
            list($key, $val) = explode(":", $line);
            $memInfo[$key] = trim($val);
        }
        return [$memInfo['MemFree'], $memInfo['MemTotal']];
    }
}
