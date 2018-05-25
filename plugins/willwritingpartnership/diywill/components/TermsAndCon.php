<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
use WillWritingPartnership\DIYWill\Models\WillModel;
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

    function onAcceptTermsAndCon(){

        $id = \Session::get('ua_id');
      //  Db::table('useraccount')->where('id', $id)->update(['termsandcon' => 1]);

        ClientDataModel::where('id', $id)
        ->update(['termsandcon' => 1]);


        $octoberID = Auth::getUser()->id;

        $willModel = new WillModel;
        $willModel->octoberid = $octoberID;
        $willModel->progress = 0;
        $willModel->complete = false;
        $willModel->userid = $id;
        $willModel->save();


        return Redirect::to("addTestators");
    }
}
