<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Workshop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'venue_thumbnail',
        'bg_map',
        'address',
        'about',
        'price',
        'is_open',
        'has_started',
        'started_at',
        'time_at',
        'category_id',
        'workshop_instructor_id',
    ];

    // Casting
    protected $casts = [
        'started_at' => 'date',
        'time_at' => 'datetime:H:i',
    ];

    // Accessor
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Relationships
    public function benefits(): HasMany
    {
        return $this->hasMany(WorkshopBenefit::class);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(WorkshopParticipant::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(WorkshopInstructor::class, 'workshop_instructor_id');
    }
}
