<?php

namespace App\Models;

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
            return explode(' ', $this->start)[0];
        }

        return null;
    }

    public function getEndDateAttribute() {
        if($this->end) {
            return explode(' ', $this->start)[0];
        }

        return null;
    }


}
