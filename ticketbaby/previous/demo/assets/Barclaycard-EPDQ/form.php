<?php

$path = dirname(__FILE__);

require "BarclaycardEpdq.class.php";

$resultUrl = "http://localhost/myprojects/tBaby/return.php";

$customer = array(
	'name' => 'Retheesh Tester',
	'email' => 'retheesh4u@gmail.com',
	'address' => 'Test Road, Test, Tester',
	'postcode' => 'PL1 1AA',
	'town' => 'Plymouth',
	'country' => 'England',
	'tel' => '01234567890'
);

$order = array(
	'amount' => 100.00,
	'orderid' => '125'
);

$formParams = array(
	'ORDERID' => $order['orderid'],
	'AMOUNT' => round($order['amount'] * 100),
	
	'CN' => $customer['name'],
	'EMAIL' => $customer['email'],
	'OWNERADDRESS' => $customer['address'],
	'OWNERTOWN' => $customer['town'],
	'OWNERZIP' => $customer['postcode'],
	'OWNERCTY' => $customer['country'],
	'OWNERTELNO' => $customer['telephone'],

	'TITLE' => 'Notorious EPDQ Form',

	'LOGO' => 'http://localhost/myprojects/tBaby/assets/images/logo.png',
	'BUTTONBGCOLOR' => '802626',
	'BUTTONTXTCOLOR' => 'FFFFFF'

	/* You can customise more if you want (but you pay for completely custom templates)
	'BGCOLOR' => 'FFFFFF',
	'TXTCOLOR' => '000000',
	'TBLBGCOLOR' => 'FFFFFF',
	'TBLTXTCOLOR' => '000000',
	'FONTTYPE' => ''
	*/

);

$barclaycardEpdq = new BarclaycardEpdq();

// output the form
$barclaycardEpdq->outputForm($formParams);

?>
