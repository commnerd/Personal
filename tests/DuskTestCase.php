<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $driver = config('dusk.drivers.'.config('dusk.driver'));
        $browser = config('dusk.browsers.'.config('dusk.browser'));
        $optionPackage = $browser['option_package'];

        $options = (new $optionPackage)->addArguments($driver['options'] ?? []);

        return RemoteWebDriver::create(
            $driver['target'], DesiredCapabilities::{config('dusk.browser')}()->setCapability(
                $optionPackage::CAPABILITY, $options
            )
        );
    }
}
