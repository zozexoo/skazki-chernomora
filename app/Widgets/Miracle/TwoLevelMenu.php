<?php

namespace App\Widgets\Miracle;

use Validator;

class TwoLevelMenu extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' => [],
            'title' => '',
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|max:15',
                'items.*.title' => 'required|max:20',
            ],
            [],
            [
                'title' => 'menu_name_field123',
                'items.*.title' => 'link_name_field123',
            ]);
    }
}
