<?php

namespace ShaneStevenLei\DcatExtensionWatermark\Http\Middleware;

use Closure;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use ShaneStevenLei\DcatExtensionWatermark\Consts;
use ShaneStevenLei\DcatExtensionWatermark\DcatExtensionWatermarkServiceProvider as ServiceProvider;

class MiddleInjectDcatExtensionWatermark
{
    public function handle(Request $request, Closure $next)
    {
        $user = Admin::user();
        if (!empty($user)) {
            $container = ServiceProvider::setting('container') ?? Consts::DEFAULT_CONTAINER;
            $content   = ServiceProvider::setting('content') ?? Consts::DEFAULT_CONTENT;
            if ($content === Consts::CONTENT_KEY_NAME_MOBILE) {
                $name    = Admin::user()->{Consts::CONTENT_KEY_NAME};
                $mobile  = Admin::user()->{Consts::CONTENT_KEY_MOBILE};
                $content = $name . ' ' . substr($mobile, strlen($mobile) - 4, 4);
            } else {
                $content = Admin::user()->$content ?? $content;
            }

            $width        = (ServiceProvider::setting('width') ?? Consts::DEFAULT_WIDTH) . 'px';
            $height       = (ServiceProvider::setting('height') ?? Consts::DEFAULT_HEIGHT) . 'px';
            $textAlign    = ServiceProvider::setting('textAlign') ?? Consts::DEFAULT_TEXT_ALIGN;
            $textBaseline = ServiceProvider::setting('textBaseline') ?? Consts::DEFAULT_TEXT_BASELINE;
            $font         = ServiceProvider::setting('font') ?? Consts::DEFAULT_FONT;
            $fontSize     = (ServiceProvider::setting('fontSize') ?? Consts::DEFAULT_FONT_SIZE) . 'px';
            $fillStyle    = ServiceProvider::setting('fillStyle') ?? Consts::DEFAULT_FILL_STYLE;
            $rotate       = ServiceProvider::setting('rotate') ?? Consts::DEFAULT_ROTATE;
            $zIndex       = ServiceProvider::setting('zIndex') ?? Consts::DEFAULT_Z_INDEX;

            Admin::requireAssets('@shanestevenlei.dcat-extension-watermark');

            Admin::script(
                $this->script(
                    $container,
                    $content,
                    $width,
                    $height,
                    $textAlign,
                    $textBaseline,
                    $font,
                    $fontSize,
                    $fillStyle,
                    $rotate,
                    $zIndex
                )
            );
        }

        return $next($request);
    }

    protected function script(
        $container,
        $content,
        $width,
        $height,
        $textAlign,
        $textBaseline,
        $font,
        $fontSize,
        $fillStyle,
        $rotate,
        $zIndex
    ) {
        return <<<EOF
__canvasWM({
        container: $container,
        content: '$content',
        width: '$width',
        height: '$height',
        textAlign: '$textAlign',
        textBaseline: '$textBaseline',
        font: '$font',
        fontSize: '$fontSize',
        fillStyle: '$fillStyle',
        rotate: $rotate,
        zIndex: $zIndex,
    })
EOF;
    }
}
