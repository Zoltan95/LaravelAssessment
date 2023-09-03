<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    /**
     * @return HasMany
     */
    public function employees(): hasMany
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Show a list of all Company.
     */
    public static function index(): void
    {
        DB::table('companies')->get();
    }
}
