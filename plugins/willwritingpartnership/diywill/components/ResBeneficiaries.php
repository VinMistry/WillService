<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use Validator;
use ValidationException;
use WillWritingPartnership\DIYWill\Models\WillModel;
use WillWritingPartnership\DIYWill\Models\BeneficiariesModel;
use WillWritingPartnership\DIYWill\Models\ResidualEstateModel;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;

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

    /**
     * @return redirect to previous page
     */
    function onRedirect(){
        return Redirect::to('lastWill3');
    }

    /**
     * Gets data from form and adds it to the Db
     * @return redirect to next page
     */
    function onSubmit(){
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
        }
        else {

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

            //Add excluded people to the residual estate table
            ResidualEstateModel::where('id', $id)
                ->update(['execludedfromwill' => $excluded]);

            //Update will progress
            $octoberid = Auth::getUser()->id;
            $will = WillModel::where('octoberid', $octoberid)->first();
            ClientDataModel::where('id', $will->userid)->update(['progress' => 6]);

            //Redirect to funeral arrangements page
            return Redirect::to('lastWill5');
        }

    }
}
