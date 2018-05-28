<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
use WillWritingPartnership\DIYWill\Components\ClientData;
class TermsAndCon extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'TermsAndCon Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * Method gathers data from the form fields and then saves this data to the database using a model.
     * @return redirect to next page
     */
    function onAcceptTermsAndCon(){
        //Gets id from session
        $id = \Session::get('ua_id');

        //Update client data model table
        ClientDataModel::where('id', $id)
        ->update(['termsandcon' => 1, 'progress' => 1]);


        $octoberID = Auth::getUser()->id;
        //creates Will entry and adds data to it
        $willModel = new WillModel;
        $willModel->octoberid = $octoberID;
        $willModel->complete = false;
        $willModel->userid = $id;
        $willModel->save();

        //Redirect to testators page
        return Redirect::to("addTestators");
    }
}
