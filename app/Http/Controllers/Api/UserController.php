<?php

namespace CodeDelivery\Http\Controllers\Api;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{
	protected $repository;
	
	/**
	 * Checkout Controller constructor.
	 * @param OrderRepository   $orderRepository
	 * @param UserRepository    $userRepository
	 * @param ProductRepository $productRepository
	 */
	public function __construct(
		UserRepository $repository)
	{
		$this->repository = $repository;
	}
	
	/**
	 * .
	 * @return \Illuminate\Http\Response
	 */
	public function authenticated()
	{
		$authId = Authorizer::getResourceOwnerId();
		$client = $this->repository
			->skipPresenter(false)
			->with('client')->find($authId);
		return $client;
	}
	
}