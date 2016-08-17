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

class Quote extends ArrayObject {

	protected $url = 'http://dev.markitondemand.com/Api/v2/Quote/json';
	protected $zendHttpClient;

	/*
	* retuns this object upon success
	*/
	public function updateQuote(){

		$this->zendHttpClient = new Client();
		$this->zendHttpClient->setUri($this->url);
	    $this->zendHttpClient->setParameterGet(array(
		    'symbol' => $this->Symbol
	    ));

		$response = $this->zendHttpClient->send();

		if($response->getStatusCode() == 200){
			$this->exchangeArray(json_decode($response->getBody()));
			return $this;
		} else {
			throw new Exception($response->getContent());
		}
	}
}