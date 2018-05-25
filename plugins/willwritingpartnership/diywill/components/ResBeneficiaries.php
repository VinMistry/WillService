<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartnership\DIYWill\Models\BeneficiariesModel;
use WillWritingPartnership\DIYWill\Models\ResidualEstateModel;
class ResBeneficiaries extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ResBeneficiariesModel Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function onRedirect(){
        return Redirect::to('lastWill3');
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
        $id = \Session::get('residual_estate_id');

        $reserveBeneficiariesModel = new BeneficiariesModel;
        $reserveBeneficiariesModel->residualestateid = $id;
        $reserveBeneficiariesModel->relationshiptest1 = $rel1;
        $reserveBeneficiariesModel->relationshiptest2 = $rel2;
        $reserveBeneficiariesModel->firstname = $firstName;
        $reserveBeneficiariesModel->lastname = $lastName;
        $reserveBeneficiariesModel->street = $street;
        $reserveBeneficiariesModel->city = $city;
        $reserveBeneficiariesModel->postcode = $postCode;
        $reserveBeneficiariesModel->mobilenumber = $mob;
        $reserveBeneficiariesModel->homenumber = $homeNum;
        $reserveBeneficiariesModel->sharetobeneficiary = $sTB;
        $reserveBeneficiariesModel->age = $atAge1;
        $reserveBeneficiariesModel->toissue = $toIssue;
        $reserveBeneficiariesModel->reservebeneficiary = true;
        $reserveBeneficiariesModel->ifgiftfail = $gift;
        $reserveBeneficiariesModel->save();

        ResidualEstateModel::where('id', $id)
            ->update(['execludedfromwill' => $excluded]);

        $octoberid = Auth::getUser()->id;
        WillModel::where('octoberid', $octoberid)->update(['progress' => 4 ]);
        return Redirect::to('lastWill5');

        /*
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
          */

       // Db::table('residualestate')->where('id', \Session::get('ben_id'))->update(['reservebenfid' => $benID,'excludedfromwill'=> $excluded]);

    }
}
