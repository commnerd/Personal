<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;
use App\Models\ContactMessage;
use App\Facades\SystemStats;
use Illuminate\Support\Str;


class SystemDimmer extends BaseDimmer
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
            'icon'   => 'voyager-group',
            'title'  => "{$string}",
            'os' => "{$os}",
            'diskUsage' => "{$diskUsage}",
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
