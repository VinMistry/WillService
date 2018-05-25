<?php

namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use WillWritingPartnership\DIYWill\Models\BeneficiariesModel;
use WillWritingPartnership\DIYWill\Models\ResidualEstateModel;

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

    function onRedirect(){
        return Redirect::to('lastWill2');
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
        $atAge = post('atAge1');
        $toIssue = post('toIssue');
        $gift = post('gift');
        $passToSpouse = post('passToSpouse');

        $residualEstateModel = new ResidualEstateModel;
        $residualEstateModel->passtospouse = $passToSpouse;
        $residualEstateModel->execludedfromwill = "";
        $residualEstateModel->save();

        $benificiaryModel = new BeneficiariesModel;
        $benificiaryModel->residualestateid = $residualEstateModel->id;
        $benificiaryModel->relationshiptest1 = $rel1;
        $benificiaryModel->relationshiptest2 = $rel2;
        $benificiaryModel->firstname = $firstName;
        $benificiaryModel->lastname = $lastName;
        $benificiaryModel->street = $street;
        $benificiaryModel->city = $city;
        $benificiaryModel->postcode = $postCode;
        $benificiaryModel->mobilenumber = $mob;
        $benificiaryModel->homenumber = $homeNum;
        $benificiaryModel->sharetobeneficiary = $sTB;
        $benificiaryModel->age = $atAge;
        $benificiaryModel->toissue =$toIssue;
        $benificiaryModel->reservebeneficiary = false;
        $benificiaryModel->ifgiftfail = $gift;
        $benificiaryModel->save();

        $octoberid = Auth::getUser()->id;
        WillModel::where('octoberid', $octoberid)->update(['progress' => 3 ]);

        \Session::put('residual_estate_id', $residualEstateModel->id);
        return Redirect::to("lastWill4");

        /*
         * If not using a model, a way to add data to the database is to use the DB class.
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
                'age' => $atAge,
                'toissue' => $toIssue,
                'reservebeneficiary' => false,
                'ifgiftfail' => $gift

            ]
        );

           $theID = DB::table('residualestate')->insertGetId(
            [
                'beneficiaryid' => $benID,
            ]
        );

        */



    }




}

