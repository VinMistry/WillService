<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
class ResBeneficiaries extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ResBeneficiaries Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    function onSubmit(){

        $rel1 = post('rel1');
        $rel2 = post('rel2');
        $firstName = post('firstName');
        $lastName = post('lastName');
        $street = post('address-line1');
        $city = post('city');
        $postCode = post('postal-code');
        $mob = post('mobile');
        $homeNum = post('homeNum');
        $sTB = post('shareToBeneficiary');
        $atAge1 = post('atAge1');
        $toIssue = post('toIssue');
        $gift = post('gift');
        $excluded = post('excluded');

        $benID = DB::table('beneficiary')->insertGetId(
            [
                'relationshiptest1' => $rel1,
                'relationshiptest2' => $rel2,
                'firstname' => $firstName,
                'lastname' => $lastName,
                'street' => $street,
                'city' => $city,
                'postcode' => $postCode,
                'mobilenumber' => $mob,
                'homenumber' => $homeNum,
                'sharetobeneficiary' => $sTB,
                'age' => $atAge1,
                'toissue' => $toIssue,
                'reservebeneficiary' => true,
                'ifgiftfail' => $gift
            ]
        );


        Db::table('residualestate')->where('id', \Session::get('ben_id'))->update(['reservebenfid' => $benID,'excludedfromwill'=> $excluded]);

        return Redirect::to('lastWill5');
    }
}
