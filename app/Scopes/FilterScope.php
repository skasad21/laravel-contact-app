<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class FilterScope implements Scope{
    protected $filterColums = [];
    public function apply(Builder $builder, Model $model){

        //DB::enableQueryLog();
        $columns = property_exists($model,'filterColums') ? $model->filterColums : $this->filterColums;
        //dd(DB::getQueryLog());
        foreach ($columns as $column) {
            if($value=request($column))
            {
                //DB::enableQueryLog();
                $builder->where($column,$value);
                //dd(DB::getQueryLog());
            }
        }

    }
}