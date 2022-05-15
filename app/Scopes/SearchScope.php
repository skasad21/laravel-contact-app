<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class SearchScope implements Scope{

    protected $searchCollumns = [];
    public function apply(Builder $builder, Model $model){
        if ($search = request('search')) {

            $columns = property_exists($model,'searchCollumns') ? $model->searchCollumns : $this->searchCollumns;

            foreach($columns as $index => $column)
            {
                $arr = explode('.',$column);
                $method = $index === 0 ? "where" : "orWhere";
                if(count($arr) == 2)
                {
                    $method .= "Has";
                    list($relationship,$col) = $arr;

                    $builder->$method($relationship,function($query) use($search, $col){
                        $query->where($col,'LIKE',"%{$search}%");
                    });
                }
                else{
                    $builder->$method($column,'LIKE',"%{$search}%");
                }

            }

            //$builder->where('first_name','LIKE',"%{$search}%");

            // $builder->orwhere('last_name','LIKE',"%{$search}%");
            // $builder->orwhere('email','LIKE',"%{$search}%");

            // $builder->orwhereHas('company',function($query) use($search){
            //     $query->where('name','LIKE',"%{$search}%");
            // });
        }
    }
}