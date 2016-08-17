<?php
/*
*Author: R Mayne
*Page: Github/rmayne
*License: MIT
*2016
*/

namespace Markitondemand;

include('../src/Markitondemand/MarkitondemandClient.php');
include('../src/Markitondemand/Company.php');
include('../src/Markitondemand/Quote.php');

class MarkitOnDemandTest extends \PHPunit_Framework_TestCase
{

	public function testLookupCompany() {
		$client = new MarkitondemandClient();
		$results = $client->lookupCompany('twit');
		$this->assertEquals('TWTR', $results[0]->Symbol, 'Failed to get the Twitter Symbol!');
		return $results[0];
	}

    /**
    * @depends testLookupCompany
    */
	public function testGetQuote($company){
		// test with and without symbol supplied to function
		$quote = $company->getQuote();
	    $this->assertTrue(!empty($quote->Timestamp), 'Failed to get the quote!');

		$company = new Company();
		$quote = $company->getQuote('TWTR');
	    $this->assertTrue(!empty($quote->Timestamp), 'Failed to get the quote!');

	    return $quote;
	}

    /**
    * @depends testGetQuote
    */
    public function testUpdateQuote($quote) {
    	$quote->updateQuote();
	    $this->assertTrue(!empty($quote->Timestamp), 'Failed to update the quote!');
    }

}