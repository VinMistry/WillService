<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartnership\DIYWill\Models\ExecutorsModel;
use WillWritingPartnership\DIYWill\Models\AppointedExecutorsModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
class Executors extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ExecutorsModel Component',
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


        $appointedExecutorModel = new AppointedExecutorsModel;
        $appointedExecutorModel->spousetobeexec = $spouse;
        $appointedExecutorModel->mirrorexecutor = $mirror;
        $appointedExecutorModel->spousetype = $spouseExecType;
        $appointedExecutorModel->save();

        $executorModel = new ExecutorsModel;
        $executorModel->appointedid = $appointedExecutorModel->id;
        $executorModel->executortype = $type;
        $executorModel->relationshiptest1 = $rel1;
        $executorModel->relationshiptest2 = $rel2;
        $executorModel->title = $title;
        $executorModel->firstname = $fn;
        $executorModel->lastname = $ln;
        $executorModel->contactnumber = $mobile;
        $executorModel->contactnumberhome = $home;
        $executorModel->street = $street;
        $executorModel->city = $city;
        $executorModel->postcode = $postCode;
        $executorModel->save();

        $octoberid = Auth::getUser()->id;

        \Session::put('exec_id', $appointedExecutorModel->id);

        WillModel::where('octoberid', $octoberid)->update(['executors' => $appointedExecutorModel->id, 'progress' => 1 ]);

        /*
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

        */

        return Redirect::to("lastWill2");
    }



}

