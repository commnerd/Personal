<?php

namespace App\Voyager\Widgets;

use App\Models\Work\EmploymentRecord;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;

class ResumeDimmer extends BaseDimmer
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
        $count = EmploymentRecord::count();
        $string = 'Employment Record';
        if($count != 1) {
            $string .= "s";
        }
        $lower = Str::lower($string);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-certificate',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$lower} in your database. Click on button below to view {$lower}.",
            'button' => [
                'text' => "View {$lower}",
                'link' => route('admin.manage.resume.index'),
            ],
            'image' => '/storage/resume.png',
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
