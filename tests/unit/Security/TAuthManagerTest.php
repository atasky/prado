<?php

use Prado\Exceptions\TConfigurationException;
use Prado\Exceptions\TInvalidOperationException;
use Prado\Security\TAuthManager;
use Prado\Security\TUserManager;
use Prado\TApplication;
use Prado\Xml\TXmlDocument;

class TAuthManagerTest extends PHPUnit\Framework\TestCase
{
	public static $app = null;
	public static $usrMgr = null;

	protected function setUp(): void
	{
		// ini_set('session.use_cookies',0);
		// ini_set('session.cache_limiter', 'none');
		if (self::$app === null) {
			self::$app = new TApplication(__DIR__ . '/app');
		}

		// Make a fake user manager module
		if (self::$usrMgr === null) {
			self::$usrMgr = new TUserManager();
			$config = new TXmlDocument('1.0', 'utf8');
			$config->loadFromString('<users><user name="Joe" password="demo"/><user name="John" password="demo" /><role name="Administrator" users="John" /><role name="Writer" users="Joe,John" /></users>');
			self::$usrMgr->init($config);
			self::$app->setModule('users', self::$usrMgr);
		}
	}

	protected function tearDown(): void
	{
	}

	public function testInit()
	{
		$authManager = new TAuthManager();
		// Catch exception with null usermgr
		try {
			$authManager->init(null);
			self::fail('Expected TConfigurationException not thrown');
		} catch (TConfigurationException $e) {
		}

		$authManager->setUserManager('users');
		$authManager->init(null);
		self::assertEquals(self::$usrMgr, $authManager->getUserManager());
	}

	public function testUserManager()
	{
		$authManager = new TAuthManager();
		$authManager->setUserManager('users');
		$authManager->init(null);
		self::assertEquals(self::$usrMgr, $authManager->getUserManager());

		// test change
		try {
			$authManager->setUserManager('invalid');
			self::fail('Expected TInvalidOperationException not thrown');
		} catch (TInvalidOperationException $e) {
		}
	}

	public function testLoginPage()
	{
		$authManager = new TAuthManager();
		$authManager->setUserManager('users');
		$authManager->init(null);
		$authManager->setLoginPage('LoginPage');
		self::assertEquals('LoginPage', $authManager->getLoginPage());
	}

	public function testDoAuthentication()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
		// Not yet finished, Session won't start because of headers :( :(

		$authManager = new TAuthManager();
		$authManager->setUserManager('users');
		$authManager->init(null);
		$authManager->setLoginPage('LoginPage');
		self::$app->raiseEvent('onAuthentication', self::$app, null);
	}

	public function testDoAuthorization()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testLeave()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testReturnUrl()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testOnAuthenticate()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testOnAuthorize()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testUpdateSessionUser()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testLogin()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}

	public function testLogout()
	{
		throw new PHPUnit\Framework\IncompleteTestError();
	}
}
