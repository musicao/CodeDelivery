<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         =>       $model->name,
            'email'        =>       $model->email,
            'phone'        =>       $model->phone,
            'address'      => (int) $model->address,
            'zipcode'      =>       $model->zipcode,
            'city'         =>       $model->city,
            'state'        =>       $model->state,
			

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}


 