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
use WillWritingPartnership\DIYWill\Models\WillModel;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
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

    /**
     * @param $str - date string
     * @return DateTime - the converted date string as an DateTime object
     */
    function dateCleaner($str)
    {
        // regex pattern will match any date formatted dd-mm-yyy or d-mm-yyyy with
        // separators: periods, slahes, dashes
        $p = '{.*?(\d\d?)[\\/\.\-]([\d]{2})[\\/\.\-]([\d]{4}).*}';
        $date = preg_replace($p, '$3-$2-$1', $str);
        return new \DateTime($date);
    }

    /**
     * @return redirect to next page
     */
    function onSubmit()
    {
        //Get all the data from the page
        $data = post();

        //Set validation rules, NOTE: that some of the validation is done though Bootstrap on the page
        $rules = [
            'howLong' => 'required| min: 0| max:100',
            'numOfChildCurrent' => 'required| min: 0| max:100',
            'numOfChildPast' => 'required| min: 0| max:100',
            'numOfChildUnder' => 'required| min: 0| max:100',
            'dob' => 'required|date'
        ];

        //Create a validator takes the data and the rules
        $validation = Validator::make($data, $rules);
        //If the validation fails throw and error
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


            $date = $this->dateCleaner($dob);

            $formatedDate = $date->format('m-d-Y');

            $id = \Session::get('ua_id');
            //Create models and assign values to db column names
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

            $octoberid = Auth::getUser()->id;
            $will = WillModel::where('octoberid', $octoberid)->first();
            ClientDataModel::where('id', $will->userid)->update(['progress' => 2]);

            return Redirect::to("lastWill1");
        }

    }

}
