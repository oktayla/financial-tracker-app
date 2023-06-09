<?php

namespace App\Models;

use App\Enums\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'type',
    ];

    protected $casts = [
        'type' => TransactionStatus::class,
        'amount' => 'double',
    ];

    protected $appends = [
        'formatted_amount',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TransactionCategory::class);
    }

    public function scopeIncome($query)
    {
        return $query->where('type', TransactionStatus::Income);
    }

    public function scopeExpense($query)
    {
        return $query->where('type', TransactionStatus::Expense);
    }

    public function getFormattedAmountAttribute(): string
    {
        $fromCurrency = currency()->getUserCurrency();

        $toCurrency = request()->get('currency');
        if (!currency()->hasCurrency($toCurrency)) {
            $toCurrency = $fromCurrency;
        }

        return currency($this->amount, $fromCurrency, $toCurrency, false);
    }
}
