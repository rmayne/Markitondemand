<?php
/*
*Author: R Mayne
*Page: Github/rmayne
*License: MIT
*2016
*/

namespace Markitondemand;

use Zend\Http\Client;
use \Exception;

class MarkitondemandClient {

	protected $url = 'http://dev.markitondemand.com/Api/v2/Lookup/json';
	protected $zendHttpClient;

	public function __construct(){
		$this->zendHttpClient = new Client();
		$this->zendHttpClient->setUri($this->url);
	}

	/*
	* params: 
	*	input: string, part of the comapny name
	* return : array of company objects
	*/
	public function lookupCompany($input){
	    $this->zendHttpClient->setParameterGet(array(
		    'input' => $input
	    ));

		$response = $this->zendHttpClient->send();

		if($response->getStatusCode() == 200){
			foreach (json_decode($response->getBody()) as $result) {
				$results[] = new Company($result, 2);
			}
			return $results;
		} else {
			throw new Exception($response->getContent());
		}
	}
}