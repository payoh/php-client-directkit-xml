<?php
namespace Payoh\Examples;
use Payoh\Models\KycDoc;
use Payoh\Models\SddMandate;
use Payoh\Models\Wallet;

require_once 'ExamplesBootstrap.php';

$api = ExamplesBootstrap::getApiInstance();

/**
 *		Case : GetWizypayAds
 *		Steps :
 *			- GetWizypayAds : creating customer wallet
 */

//GetWizypayAds
    $res = $api->GetWizypayAds(array());
if (isset($res->lwError)){
    print 'Error, code '.$res->lwError->CODE.' : '.$res->lwError->MSG;
    return;
}
foreach ($res->lwXml->OFFERS->OFFER as $of)
{
    print '<br/><br/>Offer found :';
    print '<br/>ID : '.$of->ID;
    print '<br/>NAME : '.$of->NAME;
    print '<br/>DESC : '.$of->DESCR;
    print '<br/>Validity : '.$of->START.' - '.$of->END;
}
print('<hr />');
foreach ($res->lwXml->ADS->AD as $of)
{
    print '<br/><br/>AD found :';
    print '<br/>ID : '.$of->ID;
    print '<br/>KIND : '.$of->KIND;
    print '<br/>TEXT : '.$of->TEXT;
}