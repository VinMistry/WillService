<?php

namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;

class Beneficiaries extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Beneficiaries',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
}
