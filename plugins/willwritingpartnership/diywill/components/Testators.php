<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use DateTime;
class Testators extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Testators Component',
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

        $formatedDate =  $date->format('m-d-Y');

        $id = \Session::get('ua_id');

        DB::table('testators')->insertGetId(
            [
                'userid' => $id,
                'maritalstatus' => $marital,
                'lengthOfMaritalStatus' => $forHowLong,
                'childrencurrent' => $numCurrent,
                'childrenprevious' => $numPast,
                'childrenunder18' => $numUnder,
                'dob' => $formatedDate,
                'alsoknownas' => $alsoKnown,
                'formerly' => $formerly,
                'fullysighted' => $sight,
                'bornintown' => $bornAt,
                'bornincountry' => $bornAtCountry,
                'nationality' => $nationality,
                'jobtitle' => $jobTitle,
                'employer' => $employer
            ]
        );

        return Redirect::to("lastWill1");

    }

}
