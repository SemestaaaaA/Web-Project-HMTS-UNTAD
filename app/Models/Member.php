<?php

namespace App\Models;

use App\Models\Scopes\ActivePeriodScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([ActivePeriodScope::class])]
class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_id',
        'division_id',
        'name',
        'nim',
        'role_type',
        'position',
        'batch',
        'bio',
        'photo_path',
        'sort_order',
    ];

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function isBph(): bool
    {
        return in_array($this->role_type, ['ketua', 'bph'], true);
    }
}
