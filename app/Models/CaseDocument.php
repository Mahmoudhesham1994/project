<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class CaseDocument extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'case_documents';

    protected $appends = [
        'doc_file_name',
    ];

    protected $dates = [
        'doc_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_id',
        'doc_type_id',
        'doc_desc_a',
        'doc_date',
        'doc_ref_code',
        'doc_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function docOutDocuments()
    {
        return $this->hasMany(OutDocument::class, 'doc_id', 'id');
    }

    function case()
    {
        return $this->belongsTo(CaseInfo::class, 'case_id');
    }

    public function doc_type()
    {
        return $this->belongsTo(DocType::class, 'doc_type_id');
    }

    public function getDocDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDocDateAttribute($value)
    {
        $this->attributes['doc_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDocFileNameAttribute()
    {
        return $this->getMedia('doc_file_name')->last();
    }
    
      public function caseDocumentMediaa()
    {
        return $this->hasMany(Mediaa::class, 'model_id', 'id');
    }
    
    
}
