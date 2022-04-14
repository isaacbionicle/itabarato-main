<?php
session_start();
// # Authorize Payment using PayPal as payment method
// This sample code demonstrates how you can process a 
// PayPal Account based Payment.
// API used: /v1/payments/payment
// As you can see, there is only one difference between creating a payment using PayPal with sale or authorize as intent.
// You need to set the proper intent in the request, and the remaining data would be the same

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

// ### Payer
// A resource representing a Payer that funds a payment
// For paypal account payments, set payment method
// to 'paypal'.
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// ### Itemized information
// (Optional) Lets you specify item wise
// information
for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
    
    $item = new Item();
    $item->setName(utf8_decode($_SESSION["mi_carrito"][$i]["nombre"]))
    ->setCurrency('MXN')
    ->setQuantity($_SESSION["mi_carrito"][$i]["cantidad"])
    ->setPrice($_SESSION["mi_carrito"][$i]["precio"]);
    $items[] = $item;
    
}

if(isset($_SESSION["envio"])){
    
    $item = new Item();
        $item->setName('Envío')
        ->setCurrency('MXN')
        ->setQuantity(1)
        ->setPrice(100);
        $items[] = $item;

        
}

$item = new Item();
    $item->setName('IVA (16 %)')
    ->setCurrency('MXN')
    ->setQuantity(1)
    ->setPrice(($_SESSION['total']*16)/100);
    $items[] = $item;

$itemList = new ItemList();

//$itemList->setItems(array($item1, $item2));
$itemList->setItems($items);




// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.




/*

     $details = new Details();
$details->setShipping(1)
    ->setTax(100)
    ->setSubtotal($_SESSION['total_iva']-100);
        
 */

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("MXN")
    ->setTotal($_SESSION['total_iva'])
    ->setDetails($details);

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());

// ### Redirect urls
// Set the urls that the buyer must be redirected to after 
// payment approval/ cancellation.
$baseUrl = getBaseUrl();
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
    ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
$payment = new Payment();
$payment->setIntent("authorize")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));


// For Sample Purposes Only.
$request = clone $payment;

// ### Create Payment
// Create a payment by calling the 'create' method
// passing it a valid apiContext.
// (See bootstrap.php for more on `ApiContext`)
// The return object contains the state and the
// url to which the buyer must be redirected to
// for payment approval
try {
    $payment->create($apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    
    /*
    ResultPrinter::printError("Created Payment Authorization Using PayPal. Please visit the URL to Authorize.", "Payment", null, $request, $ex);
    */
    exit(1);
}

// ### Get redirect url
// The API response provides the url that you must redirect
// the buyer to. Retrieve the url from the $payment->getLinks()
// method
$approvalUrl = $payment->getApprovalLink();

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 /*
 ResultPrinter::printResult("Created Payment Authorization Using PayPal. Please visit the URL to Authorize.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
 return $payment;
 */

header("Location: ".$approvalUrl);
return $payment;

