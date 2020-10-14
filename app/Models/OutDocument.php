<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class OutDocument extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'out_documents';

    protected $dates = [
        'out_date',
        'return_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_id',
        'doc_id',
        'out_date',
        'return_date',
        'borrower_id',
        'receiver_name',
        'out_notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    function case()
    {
        return $this->belongsTo(CaseInfo::class, 'case_id');
    }

    public function doc()
    {
        return $this->belongsTo(CaseDocument::class, 'doc_id');
    }

    public function getOutDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setOutDateAttribute($value)
    {
        $this->attributes['out_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReturnDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReturnDateAttribute($value)
    {
        $this->attributes['return_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function borrower()
    {
        return $this->belongsTo(DocBorrower::class, 'borrower_id');
    }
}
