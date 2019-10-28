<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;
use TCG\Voyager\Facades\Voyager;

class VoyagerController extends BaseVoyagerController
{
    /**
     * Override for dashboard/index
     *
     * @return \Illuminate\View
     */
    public function index() {
        $widgetClasses = config('voyager.dashboard.widgets');
        $dimmers = collect();

        foreach($widgetClasses as $index => $widgetClass) {
            $widget = app($widgetClass);

            if($widget->shouldBeDisplayed()) {
                $dimmers->put($index, $widget);
            }
        }

        return Voyager::view('voyager::index', compact('dimmers'));
    }
}
