<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CaseCourtDecision extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'case_court_decisions';

    protected $dates = [
        'court_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_id',
        'court_name',
        'court_reff_code',
        'court_date',
        'court_decisions',
        'court_notes',
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

    public function getCourtDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCourtDateAttribute($value)
    {
        $this->attributes['court_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
