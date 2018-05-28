<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use Validator;
use ValidationException;
use WillWritingPartnership\DIYWill\Models\ExecutorsModel;
use WillWritingPartnership\DIYWill\Models\AppointedExecutorsModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;

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
        //Get all the data from the page
        $data = post();
        //Set validation rules, NOTE: that some of the validation is done though Bootstrap on the page
        $rules = [
            'relTo1' => 'required|alpha',
            'relTo2' => 'required|alpha',
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'address-line1' => 'required',
            'city' => 'required|alpha',
            'postal-code' => 'required',
         ];
        //Create a validator takes the data and the rules
        $validation = Validator::make($data, $rules);
        //If the validation fails throw and error
        if ($validation->fails()) {
            throw new ValidationException($validation);
       }
       else {
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

           $will = WillModel::where('octoberid', $octoberid)->first();
           ClientDataModel::where('id', $will->userid)->update(['progress' => 3]);
           //Use the will model to update the progress and add executor id on the will table
           $will->update(['executors' => $appointedExecutorModel->id]);

           //Redirect to professional executors page
           return Redirect::to("lastWill2");

       }
    }



}

