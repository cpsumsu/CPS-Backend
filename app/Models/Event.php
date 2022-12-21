<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function eventType() {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    public function leaders() {
        return $this->belongsToMany(Leader::class, 'event_leaders'); // laravel by default go for event_leader
    }

    public function organizes() {
        return $this->belongsToMany(Organize::class, 'event_coorganizers');
    }
}
