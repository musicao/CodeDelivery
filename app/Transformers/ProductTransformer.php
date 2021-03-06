<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Product;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
			'id'            => (int)$model->id,
			'name'          =>  $model->name,
			'description'   => $model->description,
			'price'         => $model->price,
	
			/* place your other model properties here */
	
			'created_at' => $model->created_at,
			'updated_at' => $model->updated_at
 	
        ];
    }
}


 