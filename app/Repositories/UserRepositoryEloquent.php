<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Presenters\UserPresenter;
use CodeDelivery\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return User::class;
	}
	
	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}
	
	public function getDeliverymen()
	{
		return $this->model->where(['role' => 'deliveryman'])->lists('name', 'id');
	}
	
	protected $skipPresenter = true;
	
	public function presenter()
	{
		return UserPresenter::class;
	}
	
}
