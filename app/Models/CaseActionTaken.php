<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CaseActionTaken extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'case_action_takens';

    protected $dates = [
        'action_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_id',
        'action_type_id',
        'action_desc',
        'action_date',
        'action_notes',
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
    

    public function action_type()
    {
        return $this->belongsTo(ActionType::class, 'action_type_id');
    }

    public function getActionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setActionDateAttribute($value)
    {
        $this->attributes['action_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
