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

    /**
     * @param $bool - Boolean Value
     * @return string - text to display on the pdf
     */
    function changeBoolToString($bool)
    {
        if($bool){
            return "Yes";
        }
        else {
            return "No";
        }
    }

    /**
     * @param $bool - Boolean Value
     * @return string - text to display on the pdf
     */
    function changeBoolToBuriedOrScattered($bool)
    {
        if($bool){
            return "Buried";
        }
        else {
            return "Scattered";
        }
    }

    /**
     * @param $clientData - client data model
     * @param $testatorModel - testator model
     * @return string - string of html to be added to the pdf
     */
    function yourInfo($clientData, $testatorModel){
        $htmlYourInfo = '<h2>Your Information</h2>
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
        '. $clientData->firstname ." has " .$testatorModel->childrenunder18 . ' children under 18. Also known as '. $testatorModel->alsoknownas .' and formerly known as '. $testatorModel->formerly. '.</p>';
        return $htmlYourInfo;
    }

    /**
     * @param $executors - executor model
     * @return string - string of html to be added to the pdf
     */
    function executorInfo($executors){
        $htmlExecutor =   '<h2>Executor</h2>
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
            $executors->postcode.'</p>';
        return $htmlExecutor;
    }

    /**
     * @param $professionalExec - profesional executor model
     * @return string -  string of html to be added to the pdf
     */
    function profExecutorInfo($professionalExec) {
        $htmlProfExec = '<h2>Professional Executors</h2>
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
            '</p>';
        return $htmlProfExec;
    }

    /**
     * @param $beneficiairies - beneficiary model
     * @return string -  string of html to be added to the pdf
     */
    function beneficiaryInfo($beneficiairies){
        $htmlBeneficiary = '<h2>Beneficiary</h2> 
            <p>Relationship To Testator 1: ' .
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
            $this->changeBoolToString($beneficiairies->ifgiftfail).'</p>';
        return $htmlBeneficiary;
    }

    /**
     * @param $resRow - row of data from the beneficiary table that corresponds to the correct reserve beneficiary
     * @return string - string of html to be added to the pdf
     */
    function reserveBeneficiaryInfo($resRow){
        $htmlResBeneficiary =      '<h2>Reserve Beneficiary</h2> <p>
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
            $this->changeBoolToString($resRow['ifgiftfail']).'
        </p>';
        return $htmlResBeneficiary;
    }

    /**
     * @param $funeralArrangements - funeral arrangements model
     * @param $residualEstate - residual estate model
     * @return string -  string of html to be added to the pdf
     */
    function funeralArrangementInfo($funeralArrangements, $residualEstate) {
        $htmlFuneralArrangements = '
        <h2>Funeral Arrangements</h2>
            <p> Funeral Prearranged With: '.
            $funeralArrangements->funeralPrearranged .
            '<br><p> Funeral Plan Ref No: '.
            $funeralArrangements->funeralPlanRefNo.
            '<br><p> Funeral Funded: '.
            $funeralArrangements->funeralFunded.
            '<br><p> Donation of Body to Research: '.
            $this->changeBoolToString($funeralArrangements->bodyToResearch).
            '<br><p> Donation of Organs for Transplant: '.
            $this->changeBoolToString($funeralArrangements->organsForTransplant).
            '<br><p> Organs not to be Used for Transplant: '.
            $funeralArrangements->organsNotToUse.
            '<br><p>Cremation Required: '.
            $this->changeBoolToString($funeralArrangements->cremationReq).
            '<br><p>Burial Required: '.
            $this->changeBoolToString($funeralArrangements->burialRequired).
            '<br><p> Service Place: '.
            $funeralArrangements->servicePlace .
            '<br><p> Burial or Cremation Place: '.
            $funeralArrangements->burOrCremPlace .
            '<br><p> Buried or Scattered: '.
            $this->changeBoolToBuriedOrScattered($funeralArrangements->burriedOrScattered) .
            '<br><p> Where to Bury or Scatter: '.
            $funeralArrangements->whereBurOrScat.
            '<br><p> Service Requirements: '.
            $funeralArrangements->serviceReq .
            '<br><p> Family Flowers Only: '.
            $this->changeBoolToString($funeralArrangements->familyFlowers) .
            '<br><p>Donation in Lieu: '.
            $funeralArrangements->donationInLieu
            .'
        </p>
        <h3>Excluded from the will:</h3>
        <p>'. $residualEstate->execludedfromwill  .'</p>';

        return $htmlFuneralArrangements;
    }

    /**
     * @throws \Mpdf\MpdfException - if pdf cannot be generated
     * Method uses the mpdf library in order to create a pdf from HTML markup and CSS styling
     * Method is run as soon as page is loaded
     */
    function onRun() {
        //Get all models needed for the PDF Will
        $beneficiairies = new BeneficiariesModel;
        $id = Auth::getUser()->id;
        $will = WillModel::where('octoberid', $id)->first();
        $clientData = ClientDataModel::where('id', $will->userid)->first();
        $executors = ExecutorsModel::where('appointedid',$will->executors)->first();
        $professionalExec = ProfessionalExecutorsModel::where('appointedid',$will->executors)->first();
        $testatorModel = TestatorModel::where('userid', $clientData->id)->first();
        $funeralArrangements = FuneralArrangementsModel::where('id', $will->funeralID)->first();
        $beneficiairies =  BeneficiariesModel::where('residualestateid', $will->residestateid)->first();
        $appointed = AppointedExecutorsModel::where('id', $will->executors)->first();
        $residualEstate = ResidualEstateModel::where('id', $will->residestateid)->first();
        //Being unable to do select statements which include the AND key word for postgreSQL the reserve beneficiaries
        // are gathered using the php methods pg_connect; as opposed to the octobercms methods and models.
        $conn = pg_pconnect("dbname=vm2amt_twp user=Vinesh");
        $sql= "SELECT * FROM beneficiary WHERE residualestateid = ". $will->residestateid ."AND reservebeneficiary = true;";
        $result = pg_query($conn,$sql);
        $resRow = pg_fetch_array($result);

        //Gets the CSS style sheet to the document
        $stylesheet = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/October/themes/WillWritingPartnership/assets/css/pdf.css');
        //Create new mpdf object
        $mpdf = new \Mpdf\Mpdf();
        //Get current data and time
        $now = new DateTime();
        //Assigns the stylesheet to the pdf
        $mpdf->WriteHTML($stylesheet,1);
        //Writes the HTML to the PDF
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
             
                '. $this->yourInfo($clientData, $testatorModel) .
            $this->executorInfo($executors).'
                <pagebreak></pagebreak>
                '
            .  $this->beneficiaryInfo($beneficiairies) . $this->reserveBeneficiaryInfo($resRow) .

            $this->funeralArrangementInfo($funeralArrangements, $residualEstate) .
            '
                
                <h1>Thank You for using TWP as your online DIY will service!</h1>
          
        
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
            </body>
            </html>', 2);
        //Outputs the pdf for download
        $mpdf->Output();
    }



}
