<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    /**
     * @return HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Show a list of all Companies.
     */
    public static function index(): void
    {
        DB::table('companies')->get();
    }
}
