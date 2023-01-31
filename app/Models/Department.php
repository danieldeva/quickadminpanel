<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use Auditable;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public $table = 'departments';

    public static $search = [
        'name',
    ];

    public $orderable = [
        'id',
        'country.name',
        'name',
        'status',
        'created_at',
    ];

    public $filterable = [
        'id',
        'country.name',
        'name',
        'status',
        'created_at',
    ];

    protected $fillable = [
        'country_id',
        'name',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
