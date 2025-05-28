<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'full_description',
        'target_amount',
        'current_amount',
        'image',
        'status',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount == 0) {
            return 0;
        }
        return min(100, ($this->current_amount / $this->target_amount) * 100);
    }

    public function getRemainingAmountAttribute()
    {
        return max(0, $this->target_amount - $this->current_amount);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
