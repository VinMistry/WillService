<?php

namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Auth;
use Validator;
use ValidationException;
use WillWritingPartnership\DIYWill\Models\BeneficiariesModel;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
use WillWritingPartnership\DIYWill\Models\ResidualEstateModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
class Beneficiaries extends ComponentBase
{
    /**
     * @return array component details
     */
    public function componentDetails()
    {
        return [
            'name' => 'Beneficiaries',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @return array defined properties
     */
    public function defineProperties()
    {
        return [];
    }

    /**
     * @return redirect to previous page
     * Redirect method for going back to the previous page
     */
    function onRedirect()
    {
        return Redirect::to('lastWill2');
    }


    /**
     * @return redirect to next page
     * Method gathers data from the form fields and then saves this data to the database using a model.
     */
    function onSubmit()
    {
        //Get all the data from the page
        $data = post();
        //Set validation rules, NOTE: that some of the validation is done though Bootstrap on the page
        $rules = [
            'rel1' => 'required|alpha',
            'rel2' => 'required|alpha',
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'address-line1' => 'required',
            'city' => 'required|alpha',
            'postal-code' => 'required',
            'shareToBeneficiary' => 'required|min:0|max:100',
            'atAge1' => 'required|min:0|max:100',
        ];

        //Create a validator takes the data and the rules
        $validation = Validator::make($data, $rules);

        //If the validation fails throw and error
        if ($validation->fails()) {
            throw new ValidationException($validation);
        } else {
            //Get values
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

            //Create models and assign values to db column names
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
            $benificiaryModel->toissue = $toIssue;
            $benificiaryModel->reservebeneficiary = false;
            $benificiaryModel->ifgiftfail = $gift;
            $benificiaryModel->save();

            //Get the users account id
            $octoberid = Auth::getUser()->id;
            //Update table with progress
            $will = WillModel::where('octoberid', $octoberid)->first();
            ClientDataModel::where('id', $will->userid)->update(['progress' => 5]);
            $will->update(['residestateid' => $residualEstateModel->id]);

            //Pass residual estate to session
            \Session::put('residual_estate_id', $residualEstateModel->id);

            //Redirect to the reserve beneficiaries page
            return Redirect::to("lastWill4");
        }

    }
}

