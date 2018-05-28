<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use Validator;
use ValidationException;
use DateTime;
use WillWritingPartnership\DIYWill\Models\TestatorModel;
class Testators extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'TestatorsModel Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function dateGrab($str)
    {
        // regex pattern will match any date formatted dd-mm-yyy or d-mm-yyyy with
        // separators: periods, slahes, dashes
        $p = '{.*?(\d\d?)[\\/\.\-]([\d]{2})[\\/\.\-]([\d]{4}).*}';
        $date = preg_replace($p, '$3-$2-$1', $str);
        return new \DateTime($date);
    }

    function onSubmit()
    {

        $data = post();

        $rules = [
            'howLong' => 'required| min: 0| max:100',
            'numOfChildCurrent' => 'required| min: 0| max:100',
            'numOfChildPast' => 'required| min: 0| max:100',
            'numOfChildUnder' => 'required| min: 0| max:100',
            'dob' => 'required|date'
        ];

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }
        else {
            $marital = post('maritalStat');
            $forHowLong = post('howLong');
            $numCurrent = post('numOfChildCurrent');
            $numPast = post('numOfChildPast');
            $numUnder = post('numOfChildUnder');
            $dob = post('dob');
            $nationality = post('nationality');
            $bornAt = post('bornAt');
            $bornAtCountry = post('bornAtCountry');
            $jobTitle = post('jobTitle');
            $employer = post('employer');
            $sight = post('sighted');
            $alsoKnown = post('knowAs');
            $formerly = post('formerly');


            $date = $this->dateGrab($dob);

            $formatedDate = $date->format('m-d-Y');

            $id = \Session::get('ua_id');

            $testatorModel = new TestatorModel;
            $testatorModel->userid = $id;
            $testatorModel->maritalstatus = $marital;
            $testatorModel->lengthOfMaritalStatus = $forHowLong;
            $testatorModel->childrencurrent = $numCurrent;
            $testatorModel->childrenprevious = $numPast;
            $testatorModel->childrenunder18 = $numUnder;
            $testatorModel->dob = $formatedDate;
            $testatorModel->alsoknownas = $alsoKnown;
            $testatorModel->formerly = $formerly;
            $testatorModel->fullysighted = $sight;
            $testatorModel->bornintown = $bornAt;
            $testatorModel->bornincountry = $bornAtCountry;
            $testatorModel->nationality = $nationality;
            $testatorModel->jobtitle = $jobTitle;
            $testatorModel->employer = $employer;
            $testatorModel->save();

            return Redirect::to("lastWill1");
        }

    }

}
