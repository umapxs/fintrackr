<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * Relationships
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Gets the total amount of a single account.
     *
     *
     */
    public function getTotalAmount()
    {
        return $this->transactions()->sum('transaction_value');
    }

    public static function overallTotal()
    {
        // Get the current user
        $user = auth()->user();

        // Get the user's accounts
        $accounts = $user->accounts;

        // Initialize the overall total amount
        $overallTotal = 0;

        // Iterate over each account and add its total amount to the overall total
        foreach ($accounts as $account) {
            $overallTotal += $account->getTotalAmount();
        }

        return $overallTotal;
    }
}
