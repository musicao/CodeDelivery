<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Models\Order;
use CodeDelivery\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
	
	public function getByIdAndDeliveryman($id, $idDeliveryman)
	{
		$result = $this->with(['client', 'items', 'cupom'])->findWhere([
			'id' => $id,
			'user_deliveryman_id' => $idDeliveryman
		]);
		if ($result instanceof Collection) {
			$result = $result->first();
		} else {
			if (isset($result['data']) && count($result['data']) == 1) {
				$result = [
					'data' => $result['data'][0]
				];
			} else {
				throw new ModelNotFoundException("Order não existe!");
			}
		}
		
		return $result;
	}
}
