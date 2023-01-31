<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use InteractsWithMedia;
    use Auditable;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public $table = 'galleries';

    public static $search = [
        'heading',
    ];

    public $orderable = [
        'id',
        'heading',
        'status',
        'sort_order',
        'created_at',
    ];

    public $filterable = [
        'id',
        'heading',
        'status',
        'sort_order',
        'created_at',
    ];

    protected $appends = [
        'image',
    ];

    protected $fillable = [
        'heading',
        'status',
        'sort_order',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getImageAttribute()
    {
        return $this->getMedia('gallery_image')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
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
