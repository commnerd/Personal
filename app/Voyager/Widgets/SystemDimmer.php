<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use App\Facades\SystemStats;

class SystemDimmer extends SpanningDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $string = 'System';
        $os = SystemStats::getOS();
        $diskUsage = SystemStats::getDiskUsage();

        return view('vendor.voyager.widgets.system-dimmer', array_merge($this->config, [
            'icon'   => 'voyager-laptop',
            'title'  => "{$string}",
            'os' => "{$os}",
            'diskUsage' => "{$diskUsage}",
            'image' => '/storage/admin/system.jpg',
            'width' => 12,
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed(): bool
    {
        return Auth::user()->hasRole('admin');
    }
}
