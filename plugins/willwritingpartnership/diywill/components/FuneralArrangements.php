<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
class FuneralArrangements extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'FuneralArrangements Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
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
        );


        return Redirect::to("testpayments");
    }

}
