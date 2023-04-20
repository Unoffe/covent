<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method active
 */
class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'year',
        'genre_id',
        'active',
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', 1);
    }

    public function scopeSearch(Builder $query, $value = null): Builder
    {
        return $query->when($value, function ($query, $value) {
            return $query
                ->where('title', 'LIKE', '%' . $value . '%')
                ->orWhere('description', 'LIKE', '%' . $value . '%');
        });
    }

    public function scopeGenre(Builder $query, $value = null): Builder
    {
        return $query->when($value, function ($query, $value) {
            return $query->where('genre_id', $value);
        });
    }

    public function scopeYear(Builder $query, $year = null, $start_year = null, $end_year = null): Builder
    {
        return $query
            ->when($year, function ($query, $year) {
                $query->where('year', $year);
            })->when($start_year, function ($query, $start_year) {
                $query->where('year', '>=', $start_year);
            })->when($end_year, function ($query, $end_year) {
                $query->where('year', '<=', $end_year);
            });
    }
}
