<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'title',
        'specialization',
        'is_current',
        'start',
        'end',
        'sort',
        'text',
        'is_display'
    ];
    protected $appends = [
        'start_date',
        'end_date',
    ];

    public function getStartDateAttribute() {
        if($this->start) {
            return Carbon::parse($this->start)->format('d-m-Y');
        }

        return null;
    }

    public function getEndDateAttribute() {
        if($this->end) {
            return Carbon::parse($this->end)->format('d-m-Y');
        }

        return null;
    }


}
