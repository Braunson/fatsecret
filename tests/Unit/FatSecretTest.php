<?php

namespace Tests;

use Braunson\FatSecret\FatSecret;
use Braunson\FatSecret\FatSecretApi;
use Braunson\FatSecret\OAuthBase;
use Mockery;

class FatSecretTest extends TestCase
{

		protected $fatsecret;
		protected $api;
		protected $oauth;
		protected $consumerKey = 'foo';
		protected $consumerSecret = 'bar';

    public function setUp()
    {
        parent::setUp();

				$this->api = Mockery::mock(FatSecretApi::class);
				app()->instance(FatSecretApi::class, $this->api);

				$this->oauth = Mockery::mock(OAuthBase::class);
				app()->instance(OAuthBase::class, $this->oauth);

				$this->fatsecret = app()->makeWith(FatSecret::class, [
					'consumerKey' => $this->consumerKey,
					'consumerSecret' => $this->consumerSecret
				]);
    }

    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testSettingAndGettingTheConsumerKey()
    {
			$newKey = 'quiz';
			$this->assertEquals(
				$this->consumerKey,
				$this->fatsecret->getKey()
			);
			$this->fatsecret->setKey($newKey);
			$this->assertEquals(
				$newKey,
				$this->fatsecret->getKey()
			);
    }

    public function testSettingAndGettingTheConsumerSecret()
    {
			$newSecret = 'quiz';
			$this->assertEquals(
				$this->consumerSecret,
				$this->fatsecret->getSecret()
			);
			$this->fatsecret->setSecret($newSecret);
			$this->assertEquals(
				$newSecret,
				$this->fatsecret->getSecret()
			);
    }

		public function testCreatingProfile()
		{
			$userId = '1';
			$token = '';
			$secret = '';
			$xmlResponse = '<xml></xml>';
			$this->oauth->shouldReceive('generateSignature')
				->once();
			$this->api->shouldReceive('getQueryResponse')
				->once()
				->andReturn($xmlResponse);
			$this->api->shouldReceive('errorCheck')
				->once();
			$this->fatsecret->profileCreate($userId, $token, $secret);
		}

		public function testGettingTheProfileAuth()
		{
			$userId = '1';
			$token = '';
			$secret = '';
			$xmlResponse = '<xml></xml>';
			$this->oauth->shouldReceive('generateSignature')
				->once();
			$this->api->shouldReceive('getQueryResponse')
				->once()
				->andReturn($xmlResponse);
			$this->api->shouldReceive('errorCheck')
				->once();
			$this->fatsecret->profileGetAuth($userId, $token, $secret);
		}

		public function testSearchingForIngredients()
		{
			$searchPhrase = 'quiz';
			$page = 0;
			$maxResults = 20;
			//$xmlResponse = '<xml></xml>';
			$this->oauth->shouldReceive('generateSignature')
				->once();
			$this->api->shouldReceive('getQueryResponse')
				->once();
				//->andReturn($xmlResponse);
			/*$this->api->shouldReceive('errorCheck')
				->once();*/ //TODO: No error check?
			$this->fatsecret->searchIngredients($searchPhrase, $page, $maxResults);
		}

		public function testGettingAnIgredientById()
		{
			$ingredientId = 1;
			$this->oauth->shouldReceive('generateSignature')
				->once();
			$this->api->shouldReceive('getQueryResponse')
				->once();
				//->andReturn($xmlResponse);
			/*$this->api->shouldReceive('errorCheck')
				->once();*/ //TODO: No error check?
			$this->fatsecret->getIngredient($ingredientId);
		}
}
