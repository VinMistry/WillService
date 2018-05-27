<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use Validator;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
class ClientData extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ClientData',
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
    public function onSubmitBasicInfo() {


        //Get values
        $title = post('title');
        $fn = post('firstName');
        $ln = post('lastNames');
        $email = post('email');
        $mob = post('mobile');
        $work = post('work');
        $home = post('homeNum');
        $street = post('address-line1');
        $city = post('city');
        $postCode = post('postal-code');

        //Create model and assign values to db column names
        $clientData = new ClientDataModel;
        $clientData->title = $title;
        $clientData->firstname = $fn;
        $clientData->lastname = $ln;
        $clientData->emailaddress = $email;
        $clientData->contactnumber = $mob;
        $clientData->contactnumberwork = $work;
        $clientData->contactnumberhome = $home;
        $clientData->street = $street;
        $clientData->city = $city;
        $clientData->postcode = $postCode;
        $clientData->termsandcon = false;
        $clientData->save();

        //Pass client data id to the session
        \Session::put('ua_id', $clientData->id);

        //Redirect to terms and conditions page
        return Redirect::to("termsandconditions");

    }

}
