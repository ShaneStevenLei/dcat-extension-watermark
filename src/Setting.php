<?php

namespace ShaneStevenLei\DcatExtensionWatermark;

use Dcat\Admin\Admin;
use Dcat\Admin\Extend\Setting as Form;
use Dcat\Admin\Form\Row;

class Setting extends Form
{
    public function title()
    {
        return $this->trans('watermark.settings.title');
    }

    public function form()
    {
        $thisForm = $this;
        $this->row(
            function (Row $form) use ($thisForm) {
                $form->width(6)->text('container', $thisForm->trans('watermark.settings.container'))->default(
                    Consts::DEFAULT_CONTAINER
                )->required();
                $form->width(6)->select('content', $thisForm->trans('watermark.settings.content'))->options(
                    function () use ($thisForm) {
                        $result         = [];
                        $userAttributes = Admin::user()->getAttributes();
                        if (array_key_exists(Consts::CONTENT_KEY_NAME, $userAttributes)) {
                            $result[Consts::CONTENT_KEY_NAME] = $thisForm->trans('watermark.settings.name');
                        } elseif (array_key_exists(Consts::CONTENT_KEY_MOBILE, $userAttributes)) {
                            $result[Consts::CONTENT_KEY_MOBILE] = $thisForm->trans('watermark.settings.mobile');
                        } elseif (array_key_exists(Consts::CONTENT_KEY_EMAIL, $userAttributes)) {
                            $result[Consts::CONTENT_KEY_EMAIL] = $thisForm->trans('watermark.settings.email');
                        } elseif (array_key_exists(Consts::CONTENT_KEY_NAME, $userAttributes) &&
                            array_key_exists(Consts::CONTENT_KEY_MOBILE, $userAttributes)) {
                            $result[Consts::CONTENT_KEY_NAME_MOBILE] =
                                $thisForm->trans('watermark.settings.name_mobile');
                        }

                        return $result;
                    }
                )->required();

                $form->width(4)->number('width', $this->trans('watermark.settings.width'))->default(
                    Consts::DEFAULT_WIDTH
                )->required();

                $form->width(4)->number('height', $this->trans('watermark.settings.height'))->default(
                    Consts::DEFAULT_HEIGHT
                )->required();

                $form->width(4)
                    ->number('rotate', $this->trans('watermark.settings.rotate'))
                    ->min(-360)
                    ->max(360)
                    ->default(Consts::DEFAULT_ROTATE)
                    ->required();

                $form->width(4)
                    ->select('font', $this->trans('watermark.settings.font'))
                    ->options(Consts::FONT_LIST)
                    ->default(Consts::DEFAULT_FONT)
                    ->required();

                $form->width(4)->number('fontSize', $this->trans('watermark.settings.fontSize'))->default(
                    Consts::DEFAULT_FONT_SIZE
                )->required();

                $form->width(4)->select('textAlign', $this->trans('watermark.settings.textAlign'))->options([
                    'left'   => $this->trans('watermark.settings.left'),
                    'center' => $this->trans('watermark.settings.center'),
                    'right'  => $this->trans('watermark.settings.right'),
                ])->default(Consts::DEFAULT_TEXT_ALIGN)->required();

                $form->width(4)
                    ->color('fillStyle', $this->trans('watermark.settings.fillStyle'))
                    ->default(Consts::DEFAULT_FILL_STYLE)
                    ->required();

                $form->width(4)
                    ->select('textBaseline', $this->trans('watermark.settings.textBaseline'))
                    ->options(Consts::TEXT_BASELINE)
                    ->default(Consts::DEFAULT_TEXT_BASELINE)
                    ->required();

                $form->width(4)
                    ->number('zIndex', $this->trans('watermark.settings.zIndex'))
                    ->default(Consts::DEFAULT_Z_INDEX)
                    ->required();
            }
        );
    }
}
