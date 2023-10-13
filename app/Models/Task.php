<?php

namespace App\Models;

use App\Models\Scopes\UserTypeTaskScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'user_id',
    ];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserTypeTaskScope());
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
