<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use Validator;
use ValidationException;
use WillWritingPartnership\DIYWill\Models\FuneralArrangementsModel;
use WillWritingPartnership\DIYWill\Models\TestatorModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
class FuneralArrangements extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'FuneralArrangementsModel Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * @return redirect to previous page
     * Redirect method for going back to the previous page
     */
    function onRedirect(){
        return Redirect::to('lastWill4');
    }

    /**
     * @return redirect to next page
    * Method gathers data from the form fields and then saves this data to the database using a model.
    */
    function onSubmit()
    {
        $data = post();

        $rules = [
            'planNumber' => 'required|alpha_num'
        ];

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }
        else {
            //Get values
            $prearranged = post('prearranged');
            $plannumber = post('planNumber');
            $funded = post('funded');
            $body = post('body');
            $organs = post('organs');
            $noOrgans = post('noOrgans');
            $crem = post('crem');
            $burial = post('burial');
            $service = post('service');
            $burialPlace = post('burialPlace');
            $bOrS = post('bOrS');
            $whereBuried = post('whereBuried');
            $serviceReq = post('serviceReq');
            $famFlowers = post('famflowers');
            $donationToCharity = post('donationToCharity');

            //Get values from the db
            $octoberid = Auth::getUser()->id;
            $will = WillModel::where('octoberid', $octoberid)->first();
            $testator = TestatorModel::where('userid', $will->userid)->first();
            $testID = $testator->id;

            //Create models and assign values to db column names
            $funeralArrangementsModel = new FuneralArrangementsModel;
            $funeralArrangementsModel->testatorid = $testID;
            $funeralArrangementsModel->funeralPrearranged = $prearranged;
            $funeralArrangementsModel->funeralPlanRefNo = $plannumber;
            $funeralArrangementsModel->funeralFunded = $funded;
            $funeralArrangementsModel->bodyToResearch = $body;
            $funeralArrangementsModel->organsForTransplant = $organs;
            $funeralArrangementsModel->organsNotToUse = $noOrgans;
            $funeralArrangementsModel->cremationReq = $crem;
            $funeralArrangementsModel->burialRequired = $burial;
            $funeralArrangementsModel->servicePlace = $service;
            $funeralArrangementsModel->burOrCremPlace = $burialPlace;
            $funeralArrangementsModel->burriedOrScattered = $bOrS;
            $funeralArrangementsModel->whereBurOrScat = $whereBuried;
            $funeralArrangementsModel->serviceReq = $serviceReq;
            $funeralArrangementsModel->familyFlowers = $famFlowers;
            $funeralArrangementsModel->donationInLieu = $donationToCharity;
            $funeralArrangementsModel->save();

            //Update Will table
            WillModel::where('octoberid', $octoberid)->update(['progress' => 5, 'funeralID' => $funeralArrangementsModel->id]);

            //Redirect to the payments page
            return Redirect::to("payments");
        }
    }

}
