<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;
use App\Models\DailyReminder;
use Illuminate\Support\Str;

class DailyReminderDimmer extends BaseDimmer
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
        $count = DailyReminder::count();
        $string = 'Daily Reminder';
        if($count != 1) {
          $string .= "s";
        }

        return view('vendor.voyager.widgets.dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'button' => [
                'text' => __('voyager::dimmer.user_link_text'),
                'link' => route('admin.daily_reminder.index'),
            ],
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
