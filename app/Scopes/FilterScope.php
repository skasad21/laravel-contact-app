<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class FilterScope implements Scope{
    protected $filterColums = [];
    public function apply(Builder $builder, Model $model){

        $columns = property_exists($model,'filterColums') ? $model->filterColums : $this->filterColums;
        foreach ($columns as $column) {
            if($value=request($column))
            {
                $builder->where($column,$value);
            }
        }

    }
}