<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use Validator;
use ValidationException;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
class ClientData extends ComponentBase
{
    /**
     * @return array component details
     */
    public function componentDetails()
    {
        return [
            'name'        => 'ClientData',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @return array defined properties
     */
    public function defineProperties()
    {
        return [];
    }

    /**
     * @return redirect to next page
    * Method gathers data from the form fields and then saves this data to the database using a model.
    */
    public function onSubmitBasicInfo() {
        //Get all the data from the page
        $data = post();
        //Set validation rules, NOTE: that some of the validation is done though Bootstrap on the page
        $rules = [
            'firstName' => 'required|alpha',
            'lastNames' => 'required|alpha',
            'email' => 'required|email',
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

}
