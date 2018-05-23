<?php
/**
 * Created by PhpStorm.
 * User: Vinesh
 * Date: 17/04/2018
 * Time: 10:12
 */

namespace WillWritingPartnership\assets\php;
use Input;
use DB;
use Redirect;
class PaymentOctober extends Controller
{

    public function index()
    {
        // Return a simple string
        return 'Home';
    }

    public function createSignature(array $data, $key)
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

}