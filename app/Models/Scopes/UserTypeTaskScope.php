<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class UserTypeTaskScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->check()) {
            $userType = auth()->user()->type;

            if ($userType !== 'super_admin') {
                $builder->where('user_id', auth()->id());
            }
        }
    }
}
