<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CaseInfo extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'case_infos';

    protected $dates = [
        'case_date',
        'close_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_ref_code',
        'case_name',
        'case_date',
        'case_type_id',
        'dept_id',
        'report_type_id',
        'report_num',
        'status_id',
        'staff_id',
        'case_desc',
        'close_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getCaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCaseDateAttribute($value)
    {
        $this->attributes['case_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function case_type()
    {
        return $this->belongsTo(CaseType::class, 'case_type_id');
    }

    public function dept()
    {
        return $this->belongsTo(ComDept::class, 'dept_id');
    }

    public function report_type()
    {
        return $this->belongsTo(ReportType::class, 'report_type_id');
    }

    public function status()
    {
        return $this->belongsTo(CaseStatus::class, 'status_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function getCloseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCloseDateAttribute($value)
    {
        $this->attributes['close_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


    public function caseInfoCaseNote()
    {
        return $this->hasMany(CaseNote::class, 'case_id', 'id');
    }

    public function caseInfoCaseParty()
    {
        return $this->hasMany(CaseParty::class, 'case_id', 'id');
    }

    public function caseInfoCaseActionTaken()
    {
        return $this->hasMany(CaseActionTaken::class, 'case_id', 'id');
    }
      public function caseInfoCaseDocument()
    {
        return $this->hasMany(CaseDocument::class, 'case_id', 'id');
    }
      public function caseInfoCaseCourtDecision()
    {
        return $this->hasMany(CaseCourtDecision::class, 'case_id', 'id');
    }
    
       public function caseInfoCasePayment()
    {
        return $this->hasMany(CasePayment::class, 'case_id', 'id');
    }
      public function caseInfoOutDocument()
    {
        return $this->hasMany(OutDocument::class, 'case_id', 'id');
    }
    
    

}
