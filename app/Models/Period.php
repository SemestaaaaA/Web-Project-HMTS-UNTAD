<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_year',
        'end_year',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'start_year' => 'integer',
            'end_year' => 'integer',
        ];
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class)->orderBy('sort_order');
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class)->orderBy('sort_order');
    }

    public static function current(): ?self
    {
        return static::where('is_active', true)->first();
    }
}
