<?php namespace WillWritingPartnership\DIYWill\Components;

use Cms\Classes\ComponentBase;
use Input;
use DB;
use Redirect;
use Session;
use Auth;
use WillWritingPartnership\DIYWill\Models\WillModel;
class Payments extends ComponentBase
{

    public $html = null;
    public $responseCode = null;
    public function componentDetails()
    {
        return [
            'name'        => 'payments',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * @return if user has paid
     */
    public static function getIfPaid($id){
       // $id = Auth::getUser()->id;
        $will = WillModel::where('octoberid', $id)->first();
        echo $will->paid;
        return $will->paid;

    }

    /**
     * UTP method
     * @param array $data
     * @param $key
     * @return mixed|string
     */
    public static function createSignature(array $data, $key)
    { // Sort by field name
        ksort($data);
        // Create the URL encoded signature string
        $ret = http_build_query($data, '', '&');
        // Normalise all line endings (CRNL|NLCR|NL|CR) to just NL (%0A)
        $ret = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $ret);
        // Hash the signature string and the key together
        $ret = hash('SHA512', $ret . $key);
        return $ret;
    }

    /**
     * @return 3d secure payment
     * UTP Method
     */
    function onPayment()
    {
// Signature key entered on MMS. The demo accounts is fixed, // but merchant accounts can be updated from the MMS .
        $key = 'Train37There28Metal';
// Gateway URL
        $url = 'https://gateway.universaltp.com/direct/';
        $cardNumber = post('cardNumber');
        $expiryMonth = post('expiryMonth');
        $expiryYear = post('expiryYear');
        $cvv = post('cvv');
        $name = post('name');
        $email = post('email');
        $tel = post('phone');
        $addr = post('address');
        $postcode = post('postcode');

        $req = array(
            'merchantID' => '101074',
            'action' => 'SALE',
            'type' => 1,
            'countryCode' => 826,
            'currencyCode' => 826,
            'amount' => 1001,
            'cardNumber' => '4012001037141112',
            'cardExpiryMonth' => 12,
            'cardExpiryYear' => 15,
            'cardCVV' => '083',
            'customerName' => 'UTP',
            'customerEmail' => 'support@universaltp.com',
            'customerPhone' => '+44 0844 80 99 211',
            'customerAddress' => '16 Test Street',
            'customerPostCode' => 'TE15 5ST',
            'orderRef' => 'Test purchase',
            'transactionUnique' => (isset($_REQUEST['transactionUnique']) ?
                $_REQUEST['transactionUnique'] : uniqid()),
            'threeDSMD' => (isset($_REQUEST['MD']) ? $_REQUEST['MD'] : null),
            'threeDSPaRes' => (isset($_REQUEST['PaRes']) ? $_REQUEST['PaRes'] : null),
            'threeDSPaReq' => (isset($_REQUEST['PaReq']) ? $_REQUEST['PaReq'] : null),
        );
        // Create the signature using the function called below.
        $req['signature'] = self::createSignature($req, $key);
        // Initiate and set curl options to post to the gateway
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Send the request and parse the response
        parse_str(curl_exec($ch), $res);
        // Close the connection to the gateway
        curl_close($ch);
        // Check the return signature
        if (isset($res['signature'])) {
            $signature = $res['signature'];
            // Remove the signature as this isn't hashed in the return
            unset($res['signature']);
            if ($signature !==  self::createSignature($res, $key)) { // You should exit gracefully
                die('Sorry, the signature check failed');
            }
        }
        // Check the response code
        if ($res['responseCode'] == 65802) {
            // Send details to 3D Secure ACS and the return here to repeat request
            $pageUrl = (@$_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
            if ($_SERVER['SERVER_PORT'] != '80') {
                $pageUrl .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
            } else {
                $pageUrl .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            }
            $this->html = "<div class=\"container text-center\" > <p>Your transaction requires 3D Secure Authentication</p>
                <form action=\"" . htmlentities($res['threeDSACSURL']) . "\"method=\"post\">
                <input type=\"hidden\" name=\"MD\" value=\"" . htmlentities($res['threeDSMD']) . "\">
                <input type=\"hidden\" name=\"PaReq\" value=\"" . htmlentities($res['threeDSPaReq']) . "\">
                <input type=\"hidden\" name=\"TermUrl\" value=\"" . htmlentities($pageUrl) . "\">
                <input type=\"submit\" value=\"Continue\">
                </form>
                
                " . htmlentities($res['responseMessage']) . "</div>";
            $this->responseCode = $res['responseCode'];
            $id = Auth::getUser()->id;
            //Update will table
            Db::table('will')->where('octoberid', $id)->update(['paid' => 1, 'complete' => true]);
        }
        elseif ($res['responseCode'] === "0") {
            return Redirect::to('pdfWill');
            //$this['responseCode'] = $res['responseCode'];
        }
        else {

            $this->responseCode = $res['responseCode'];
            $this['html'] = "<p>Failed to Take Payment: " . htmlentities($res['responseMessage']) . "</p>";
        }
    }
}
