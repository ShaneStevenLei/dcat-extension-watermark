<?php

namespace ShaneStevenLei\DcatExtensionWatermark;

class Consts
{
    const DEFAULT_CONTAINER     = 'document.body';
    const DEFAULT_CONTENT       = 'id';
    const DEFAULT_WIDTH         = 120;
    const DEFAULT_HEIGHT        = 120;
    const DEFAULT_TEXT_ALIGN    = 'left';
    const DEFAULT_TEXT_BASELINE = 'alphabetic';
    const DEFAULT_FONT          = 'Microsoft YaHei';
    const DEFAULT_FONT_SIZE     = 12;
    const DEFAULT_FILL_STYLE    = 'rgba(204,204,204,0.4)';
    const DEFAULT_ROTATE        = -30;
    const DEFAULT_Z_INDEX       = 2000;

    const CONTENT_KEY_NAME        = 'name';
    const CONTENT_KEY_MOBILE      = 'mobile';
    const CONTENT_KEY_EMAIL       = 'email';
    const CONTENT_KEY_NAME_MOBILE = 'name_mobile';

    const FONT_LIST = [
        'Microsoft YaHei'    => 'Microsoft YaHei',
        'Microsoft JhengHei' => 'Microsoft JhengHei',
        'SimSun'             => 'SimSun',
        'STSong'             => 'STSong',
        'SimHei'             => 'SimHei',
        'Times New Roman'    => 'Times New Roman',
    ];

    const TEXT_BASELINE = [
        'alphabetic'  => 'alphabetic',
        'ideographic' => 'ideographic',
        'hanging'     => 'hanging',
        'top'         => 'top',
        'middle'      => 'middle',
        'bottom'      => 'bottom',
    ];
}
