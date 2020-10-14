<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CaseParty extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'case_parties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'case_id',
        'party_type_id',
        'party_id_num',
        'party_name',
        'party_address',
        'party_phone',
        'party_mobile',
        'party_email',
        'party_notes',
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

    public function party_type()
    {
        return $this->belongsTo(PartyType::class, 'party_type_id');
    }
}
