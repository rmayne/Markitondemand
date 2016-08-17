<?php 
/*
*Author: R Mayne
*Page: Github/rmayne
*License: MIT
*2016
*/

namespace Markitondemand;

use \ArrayObject;
use Zend\Http\Client;

class Company extends ArrayObject {

	protected $url = 'http://dev.markitondemand.com/Api/v2/Quote/json';
	protected $zendHttpClient;

	/*
	* params:
	*   [symbol]: the symbol of the company to retrieve a quote for 
	* returns a quote object upon success
	*/
	public function getQuote($symbol = ''){
		if($symbol){
			$this->Symbol = $symbol;
		}
		$this->zendHttpClient = new Client();
		$this->zendHttpClient->setUri($this->url);
	    $this->zendHttpClient->setParameterGet(array(
		    'symbol' => $this->Symbol
	    ));

		$response = $this->zendHttpClient->send();

		if($response->getStatusCode() == 200){
			$quote = new Quote(json_decode($response->getBody()), 2);
			return $quote;
		} else {
			throw new Exception($response->getContent());
		}
	}
}