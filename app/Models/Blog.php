<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use Auditable;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public $table = 'blogs';

    public static $search = [
        'title',
    ];

    public $orderable = [
        'id',
        'title',
        'status',
        'content',
        'created_at',
    ];

    public $filterable = [
        'id',
        'title',
        'status',
        'content',
        'created_at',
    ];

    protected $fillable = [
        'title',
        'status',
        'content',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
