# Description
* This module provides OOP access to Markit On Demand's Market Data API in Zend Framework 2

## Features
* Symbol lookup
* Symbol quote data

## Installation
* Composer: composer require rzr/markitondemand
* Git: git clone https://github.com/rmayne/Markitondemand.git

## Usage
* find the symbol for a company on various markets
  * returns an array of objects
  1. $client = new MarkitondemandClient();
  2. $results = $client->lookupCompany('twit');
* get a quote for symbol
  * returns a quote object
  1. $company = new Company();
  2. $quote = $company->getQuote('TWTR');
* update a quote object
  1. $quote = new Quote();
  2. $quote->updateQuote();

## Resources
* API Docs: http://dev.markitondemand.com/MODApis

## To Do List
* singleton behavior for zend client usage
* better performance
