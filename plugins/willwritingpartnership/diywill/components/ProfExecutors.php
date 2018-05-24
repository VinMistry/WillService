<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
class ProfExecutors extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ProfExecutors Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function onSubmit()
    {
        $twpYN = post('twpYesNo');
        $firmName = post('firmName');
        $street = post('address-line1');
        $city = post('city');
        $postCode = post('postal-code');
        $home = post('homeNum');

        DB::table('professionalexecutors')->insert(
            [
                'twptoact' => $twpYN,
                'firmname' => $firmName,
                'contactnumber' => $home,
                'street' => $street,
                'city' => $city,
                'postcode' => $postCode
            ]
        );

        return Redirect::to("lastWill3");
    }

}
