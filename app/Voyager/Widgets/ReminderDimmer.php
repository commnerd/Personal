<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Str;
use App\Models\Reminder;

class ReminderDimmer extends BaseDimmer
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
        $count = Reminder::count();
        $string = 'Reminder';
        if($count != 1) {
          $string .= "s";
        }
        $lower = Str::lower($string);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-receipt',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$lower} in your database. Click on button below to view {$lower}.",
            'button' => [
                'text' => "View {$lower}",
                'link' => route('admin.manage.reminder.index'),
            ],
            'image' => '/storage/admin/reminders.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->hasRole('admin');
    }
}
