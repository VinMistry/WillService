<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartership\DIYWill\Models\ClientDataModel;

class ClientData extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ClientDataModel',
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


        $clientData = new \WillWritingPartership\DIYWill\Models\ClientData();
        $clientData->title = $title;
        $clientData->firstname = $fn;
        $clientData->lastname = $ln;
        $clientData->email = $email;
        $clientData->contactnumber = $mob;
        $clientData->contactnumberwork = $work;
        $clientData->contactnumberhome = $home;
        $clientData->street = $street;
        $clientData->city = $city;
        $clientData->postcode = $postCode;
        $clientData->termsandcon = false;
        $clientData->save();

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
                'complete' => false,
            ]

        );

        return Redirect::to("termsandconditions");

    }

}
