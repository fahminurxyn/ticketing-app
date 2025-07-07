<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(TicketApproval::class)->orderBy('level', 'asc');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TicketHistory::class)->latest();
    }
}
