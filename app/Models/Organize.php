<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
    use HasFactory;

    public function events() {
        return $this->belongsToMany(Event::class, 'event_coorganizers');
    }
}
