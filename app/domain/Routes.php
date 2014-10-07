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
	const CUSTOMER_ACCOUNT_CHANGE_PASSWORD = 'CUSTOMER_ACCOUNT_CHANGE_PASSWORD';
	/*
	 * LoyaltyCode routes
	*/
	const LOYALTY_CODE_CREATE = 'LOYALTY_CODE_CREATE';	
	/*
	 * Gift routes
	*/
	const GIFT_CREATE = 'GIFT_CREATE';	
	/*
	 * API routes 
	*/
	const API_COMPANY_LOGIN = 'API_COMPANY_LOGIN';
	const API_COMPANY_GIFTS = 'API_COMPANY_GIFTS';
	const API_COMPANY_VALIDATE_CODE = 'API_COMPANY_VALIDATE_CODE';

}
