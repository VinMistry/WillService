<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
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

    function onRedirect(){
        return Redirect::to('lastWill4');
    }

    function onSubmit()
    {
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

        $octoberid = Auth::getUser()->id;
        $will = WillModel::where('octoberid', $octoberid)->first();
        $testator = TestatorModel::where('userid', $will->userid)->first();
        $testID = $testator->id;

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
        $funeralArrangementsModel-> burriedOrScattered = $bOrS;
        $funeralArrangementsModel->whereBurOrScat = $whereBuried;
        $funeralArrangementsModel->serviceReq = $serviceReq;
        $funeralArrangementsModel->familyFlowers = $famFlowers;
        $funeralArrangementsModel->donationInLieu = $donationToCharity;
        $funeralArrangementsModel->save();


        WillModel::where('octoberid', $octoberid)->update(['progress' => 5 ]);
        /*

        DB::table('funeralarrangements')->insert(
            [
                'funeralprearranged' => $prearranged,
                'funeralplanrefno' => $plannumber,
                'funeralfunded' => $funded,
                'bodytoresearch' => $body,
                'organsfortransplant' => $organs,
                'organsnottouse' => $noOrgans,
                'cremationreq' => $crem,
                'burialrequired' => $burial,
                'serviceplace' => $service,
                'burorcremplace' => $burialPlace,
                'burriedorscattered' => $bOrS,
                'whereburorscat' => $whereBuried,
                'servicereq' => $serviceReq,
                'familyflowers' => $famFlowers,
                'donationinlieu' => $donationToCharity
            ]
        );*/


        return Redirect::to("payments");
    }

}
