<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
class ClientData extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ClientData',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSubmitBasicInfo() {
        $id = Auth::getUser()->id;
        $title = post('title');
        $fn = post('firstName');
        $ln = post('lastNames');
        $email = post('email');
        $mob = post('mobile');
        $work = post('work');
        $home = post('homeNum');
        $street = post('address-line1');
        $city = post('city');
        $postCode = post('postal-code');


        $userID = DB::table('useraccount')->insertGetId(
            [
                'title' => $title,
                'firstname' => $fn,
                'lastname' => $ln,
                'emailaddress' => $email,
                'contactnumber' => $mob,
                'street' => $street,
                'city' => $city,
                'postcode' => $postCode,
                'termsandcon' => false,
                'contactnumberwork' => $work,
                'contactnumberhome' => $home
            ]
        );

        \Session::put('ua_id', $userID);

        DB::table('will')->insert(
            [
                'octoberid' => $id,
                'progress' => 0,
            ]

        );

        return Redirect::to("termsAndCon");

    }

}
