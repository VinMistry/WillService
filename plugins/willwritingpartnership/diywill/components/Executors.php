<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
class Executors extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Executors Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    function onSubmit(){

        $spouse = post('spouse');
        $type = post('typeExecutor');
        $rel1 = post('relTo1');
        $rel2 = post('relTo2');
        $title = post('title');
        $fn = post('firstName');
        $ln = post('lastName');
        $mobile = post('mobile');
        $home = post('homeNum');
        $street = post('address-line1');
        $city = post('city');
        $postCode = post('postal-code');
        $mirror = post('mirror');
        $spouseExecType = post('spouseExecutor');

        $appointedID  = DB::table('appointedexecutors')->insertGetId([
            'spousetobeexec' => $spouse,
            'mirrorexecutor' => $mirror,
            'spousetype' => $spouseExecType
        ]);

        DB::table('executors')->insert(
            [
                'appointedid' => $appointedID,
                'executortype' => $type,
                'relationshiptest1' => $rel1,
                'relationshiptest2' => $rel2,
                'title' => $title,
                'firstname' => $fn,
                'lastname' => $ln,
                'contactnumber' => $mobile,
                'contactnumberhome' => $home,
                'street' => $street,
                'city' => $city,
                'postcode' => $postCode
            ]
        );

        return Redirect::to("lastWill2");
    }



}

