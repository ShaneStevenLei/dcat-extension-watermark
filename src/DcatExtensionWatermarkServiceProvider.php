<?php

namespace ShaneStevenLei\DcatExtensionWatermark;

use Dcat\Admin\Extend\ServiceProvider;
use ShaneStevenLei\DcatExtensionWatermark\Http\Middleware\MiddleInjectDcatExtensionWatermark;

class DcatExtensionWatermarkServiceProvider extends ServiceProvider
{
    protected $js  = [
        'js/index.js',
    ];
    protected $css = [
    ];

    protected $middleware = [
        'middle' => [
            MiddleInjectDcatExtensionWatermark::class,
        ],
    ];

    public function register()
    {
    }

    public function init()
    {
        parent::init();
    }

    public function settingForm()
    {
        return new Setting($this);
    }
}
