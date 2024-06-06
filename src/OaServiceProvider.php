<?php

namespace ManoCode\Oa;

use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Extend\ServiceProvider;

class OaServiceProvider extends ServiceProvider
{


    public function settingForm()
    {
        return $this->baseSettingForm()->body([
            TextControl::make()->name('app_id')->label('应用appId')->required(true),
            TextControl::make()->name('app_secret')->label('应用appSecret')->required(true),
            amis()->RadiosControl('oa_login_enabled', '是否启用')->options([
                ['label' => '启用', 'value' => 1],
                ['label' => '禁用', 'value' => 0],
            ])->value(1)
        ]);
    }
}
