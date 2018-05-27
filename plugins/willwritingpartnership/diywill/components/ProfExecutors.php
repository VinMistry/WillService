<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartnership\DIYWill\Models\ProfessionalExecutorsModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
class ProfExecutors extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ProfExecutorsModel Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function onStart(){

    }

    /**
     * @return redirect to previous page
     */
    function onRedirect(){
        return Redirect::to('lastWill1');
    }

    /**
     * @return redirect to next page
     * Method gathers data from the form fields and then saves this data to the database using a model.
     */
    function onSubmit()
    {
        $twpYN = post('twpYesNo');
        $firmName = post('firmName');
        $street = post('address-line1');
        $city = post('city');
        $postCode = post('postal-code');
        $home = post('homeNum');

        $octoberid = Auth::getUser()->id;
        $id = \Session::get('exec_id');



        $professionalExecutorsModel = new ProfessionalExecutorsModel;
        $professionalExecutorsModel->appointedid = $id;
        $professionalExecutorsModel->twptoact = $twpYN;
        $professionalExecutorsModel->firmname = $firmName;
        $professionalExecutorsModel->contactnumber = $home;
        $professionalExecutorsModel->street = $street;
        $professionalExecutorsModel->city = $city;
        $professionalExecutorsModel->postcode = $postCode;
        $professionalExecutorsModel->save();

        WillModel::where('octoberid', $octoberid)->update(['progress' => 2 ]);
        /*
        DB::table('professionalexecutors')->insert(
            [
                'twptoact' => $twpYN,
                'firmname' => $firmName,
                'contactnumber' => $home,
                'street' => $street,
                'city' => $city,
                'postcode' => $postCode
            ]
        );
        */
        return Redirect::to("lastWill3");
    }

}
