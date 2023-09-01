<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    /**
     * @return HasMany
     */
    public function company()
    {
        return $this->hasMany(Employee::class);
    }
}
