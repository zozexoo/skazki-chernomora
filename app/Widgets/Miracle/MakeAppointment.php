<?php

namespace App\Widgets\Miracle;

use Validator;

class MakeAppointment extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator|null
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите текст.',
            ]);
    }
}