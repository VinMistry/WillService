<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
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
        Db::table('useraccount')->where('id', $id)->update(['termsandcon' => 1]);

        $octoberID = Auth::getUser()->id;

        DB::table('will')->where('octoberid', $octoberID)->update(['userid' => $id]);

        return Redirect::to("addTestators");
    }
}
