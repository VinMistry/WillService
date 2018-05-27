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

    /**
     * @return redirect to next page
    * Method gathers data from the form fields and then saves this data to the database using a model.
    */
    function onSubmit(){
        //Get values
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

        //Create models and assign values to db column names
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

        //Get October user account id
        $octoberid = Auth::getUser()->id;

        //Add executor id to the session
        \Session::put('exec_id', $appointedExecutorModel->id);

        //Use the will model to update the progress and add executor id on the will table
        WillModel::where('octoberid', $octoberid)->update(['executors' => $appointedExecutorModel->id, 'progress' => 1 ]);

        //Redirect to professional executors page
        return Redirect::to("lastWill2");
    }



}

