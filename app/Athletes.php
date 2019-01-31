<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athletes extends Model
{
    protected $guarded = [];
    protected function validateAthlete()
    {
        return request()->validate([
            'fullname' => ['required', 'min:3'],
            'nickname' => ['required', 'min:3'],
            'school' => ['required', 'min:3'],
            'introduction' => ['required', 'min:3'],
            'category' => ['required', 'min:3']
        ]);
    }
}
