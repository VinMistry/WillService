<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use DateTime;
use WillWritingPartnership\DIYWill\Models\WillModel;
use WillWritingPartnership\DIYWill\Models\ClientDataModel;
use WillWritingPartnership\DIYWill\Models\AppointedExecutorsModel;
use WillWritingPartnership\DIYWill\Models\ExecutorsModel;
use WillWritingPartnership\DIYWill\Models\BeneficiariesModel;
use WillWritingPartnership\DIYWill\Models\ProfessionalExecutorsModel;
use WillWritingPartnership\DIYWill\Models\ResidualEstateModel;
use WillWritingPartnership\DIYWill\Models\TestatorModel;
use WillWritingPartnership\DIYWill\Models\FuneralArrangementsModel;
use Mpdf\Mpdf;
class PDFWill extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'PDFWill Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function changeBoolToString($bool)
    {
        if($bool){
            return "Yes";
        }
        else {
            return "No";
        }
    }
    public $l = "Hi";
    public $html;

    function onRun() {
        $beneficiairies = new BeneficiariesModel;
        $id = Auth::getUser()->id;
        $will = WillModel::where('octoberid', $id)->first();
        $clientData = ClientDataModel::where('id', $will->userid)->first();
        $executors = ExecutorsModel::where('appointedid',$will->executors)->first();
        $professionalExec = ProfessionalExecutorsModel::where('appointedid',$will->executors)->first();
        $testatorModel = TestatorModel::where('userid', $clientData->id)->first();
        $funeralArrangements = FuneralArrangementsModel::where('id', $will->funeralID)->first();
        $beneficiairies =  BeneficiariesModel::where('residualestateid', $will->residestateid)->first();
        $conn = pg_pconnect("dbname=vm2amt_twp user=Vinesh");
        $sql= "SELECT * FROM beneficiary WHERE residualestateid = ". $will->residestateid ."AND reservebeneficiary = true;";
        $result = pg_query($conn,$sql);
        $resRow = pg_fetch_array($result);
        $appointed = AppointedExecutorsModel::where('id', $will->executors)->first();
        $residualEstate = ResidualEstateModel::where('id', $will->residestateid)->first();

        $stylesheet = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/October/themes/WillWritingPartnership/assets/css/pdf.css');
        $mpdf = new \Mpdf\Mpdf();
        $now = new DateTime();
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML('<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
            </head>
            <body>
            <header class="clearfix">
            <link rel="stylesheet" href="/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/assets/css/bootstrap.css" media="all" />
            <link rel="stylesheet" href="/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/assets/css/theme.css" media="all" />
            <div id="logo">
                <img src="/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/assets/images/twp-logo-h.png">
            </div>
            <h1>Your DIY Will</h1>
            <div id="company" class="clearfix">
                <div>TWP</div>
                <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                <div>(602) 519-0450</div>
                <div><a href="mailto:company@example.com">company@example.com</a></div>
            </div>
            <div id="project">
                <div><span>PROJECT: </span>DIY Will</div>
                <div><span>CLIENT: </span>'. $clientData->title ." ". $clientData->firstname . " " . $clientData->lastname . '</div>
                <div><span>ADDRESS: </span>' . $clientData->street . ", " . $clientData->city . ", " . $clientData->postcode . '</div>
                <div><span>EMAIL: </span>'. $clientData->emailaddress .'</div>
                <div><span>DATE: </span>'. $now->format("d-m-Y").'</div>
            </div>
            </header>
            <main>
             <h2>Your Information</h2>
             <p>Name: '. $clientData->title ." ". $clientData->firstname . " " . $clientData->lastname .' <br> Date of Birth: ' . $testatorModel->dob.'
             <br>Born In: '.$testatorModel->bornintown.', '.$testatorModel->bornincountry.' <br>Nationality: '.$testatorModel->nationality.'
             <br> Address: '. $clientData->street . ", " . $clientData->city . ", " . $clientData->postcode .  '. <br>
             Home Number: '. $clientData->contactnumberhome .'<br>Mobile Number: '. $clientData->contactnumber .'<br>Work Number: '. $clientData->contactnumberwork .'
             <br> Fully Sighted: '. $this->changeBoolToString($testatorModel->fullysighted) .'
             <br>Job Title: ' . $testatorModel->jobtitle .', Employed By: '.$testatorModel->employer .'
             </p>
                <h2>Martial Information</h2>
                <p>'. $testatorModel->maritalstatus .' for '. $testatorModel->lengthOfMaritalStatus .' years. With '.
                $testatorModel->childrencurrent .' children from the current relationship and '. $testatorModel->childrenprevious .' children from previous relationships.
                '. $clientData->firstname ." has " .$testatorModel->childrenunder18 . ' children under 18. Also known as '. $testatorModel->alsoknownas .' and formerly known as '. $testatorModel->formerly. '.</p>
                
                <h2>Executor</h2>
                <p>Relationship To Testator 1: ' .
                $executors->relationshiptest1.
                '<br>Relationship To Testator 2: '.
                $executors->relationshiptest2 .
                '<br>Title: '.
                $executors->title .
                '<br>First Name: '.
                $executors->firstname.
                '<br>Last Name: '.
                $executors->lastname.
                '<br>Mobile Number: '.
                $executors->contactnumber.
                '<br>Home Number: '.
                $executors->contactnumberhome.
                '<br>Street : '.
                $executors->street.
                '<br>City: '.
                $executors->city .
                '<br>Post Code: '.
                $executors->postcode.'</p>
                <pagebreak></pagebreak>
                <h2>Professional Executors</h2>
                <p>Firm Name: ' .
                $professionalExec->firmname.
                '<br>Contact Number: '.
                $professionalExec->contactnumber .
                '<br>Street: '.
                $professionalExec->street .
                '<br>City: '.
                $professionalExec->city.
                '<br>Post Code: '.
                $professionalExec->postcode.
                '</p>
                <h2>Beneficiary</h2> <p>
                Relationship To Testator 1: ' .
            $beneficiairies->relationshiptest1 .
                '<br>Relationship To Testator 2: '.
            $beneficiairies->relationshiptest2 .
                '<br>First Name: '.
            $beneficiairies->firstname.
                '<br>Last Name: '.
            $beneficiairies->lastname.
                '<br>Mobile Number: '.
                $beneficiairies->mobilenumber.
                '<br>Home Number: '.
                $beneficiairies->homenumber.
                '<br>Street : '.
            $beneficiairies->street.
                '<br>City: '.
                $beneficiairies->city .
                '<br>Post Code: '.
                $beneficiairies->postcode.
            '<br>Share to Beneficiaries: '.
            $beneficiairies->sharetobeneficiary.
            '<br>At Age: '.
            $beneficiairies->age.
            '<br>To Issue: '.
            $this->changeBoolToString($beneficiairies->toissue).
            '<br>If Any Gift Shall Fail - to be Added Proportional to The Ones That Have Not?: '.
            $this->changeBoolToString($beneficiairies->ifgiftfail).'
             <h2>Reserve Beneficiary</h2> <p>
        Relationship To Testator 1: ' .
            $resRow['relationshiptest1'] .
                '<br>Relationship To Testator 2: '.
           $resRow['relationshiptest2'] .
                '<br>First Name: '.
            $resRow['firstname'].
                '<br>Last Name: '.
            $resRow['lastname'].
                '<br>Mobile Number: '.
            $resRow['mobilenumber'] .
                '<br>Home Number: '.
            $resRow['homenumber'].
                '<br>Street : '.
            $resRow['street'].
                '<br>City: '.
            $resRow['city'] .
                '<br>Post Code: '.
            $resRow['postcode'].
            '<br>Share to Beneficiaries: '.
            $resRow['sharetobeneficiary'].
            '<br>At Age: '.
            $resRow['age'].
            '<br>To Issue: '.
            $this->changeBoolToString($resRow['toissue']).
            '<br>If Any Gift Shall Fail - to be Added Proportional to The Ones That Have Not?: '.
           $this->changeBoolToString($resRow['ifgiftfail']).

            '</p>
        <h3>Excluded from the will:</h3>
        <p>'. $residualEstate->execludedfromwill  .'</p>
        
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
            </body>
            </html>', 2);

        $mpdf->Output();
        return Redirect::to('users');
    }



}
