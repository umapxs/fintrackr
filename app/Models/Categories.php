<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    /**
     * Relationships
     *
     */
    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
    ];


    public function getTotalTransactionAmount()
    {
        return $this->transactions()->sum('transaction_value');
    }

}
