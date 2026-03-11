<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'surname',
        'extension_name',
        'sex',
        'date_of_birth',
        'place_of_birth',
        'religion',
        'civil_status',
        'name_of_spouse',
        'highest_formal_education',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    /**
     * Get the user that owns the farmer record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
