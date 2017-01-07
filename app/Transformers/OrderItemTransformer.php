<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{
	
	protected $defaultIncludes = [
		'product'
	];

    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
			'price' => (float) $model->price,
			'qtd' => $model->qtd,

            
        ];
    }
	
	
	
	public function includeProduct(OrderItem $model)
	{
		if(!$model->product)
			return null;
		return $this->item($model->product, new ProductTransformer);
	}
}
