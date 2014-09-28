<?php

abstract class Routes extends BasicEnum {
	
	/* 
	 * Public routes 
	 */
	const HOME = 'HOME';
	const FOR_COMPANIES = 'FOR_COMPANIES';
	const FOR_CUSTOMERS = 'FOR_CUSTOMERS';
	const LOGIN = 'LOGIN';
	const DO_LOGIN = 'DO_LOGIN';
	const LOGOUT = 'LOGOUT';
	const REGISTRATION = 'REGISTRATION';
	/*
	 * Company routes
	*/
	const COMPANY_HOME = 'COMPANY_HOME';
	const COMPANY_CODES = 'COMPANY_CODES';
	const COMPANY_GIFTS = 'COMPANY_GIFTS';

	/*
	 * Customer routes
	*/
	const CUSTOMER_HOME = 'CUSTOMER_HOME';
	const CUSTOMER_CATALOGUE = 'CUSTOMER_CATALOGUE';
	const CUSTOMER_ACCOUNT = 'CUSTOMER_ACCOUNT';

}
