<?php

namespace App\Models\Entities\Traits;

trait ModelTraits {

    public function prepareOptions($options = [])
    {
        $model = $this;
        if(isset($options['relationships'])) {
            $relationships = explode(',', $options['relationships']);
            $with = [];
            foreach($relationships as $relationship) {
                $with[$relationship] = function($query) {
                    $query->orderBy('id', 'DESC');
                };
            }
            $model = $model->with($with);
        }
        return $model;
    }
}
