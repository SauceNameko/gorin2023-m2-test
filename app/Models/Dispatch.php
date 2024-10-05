<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = [
        "event-id",
        "worker-id",
        "approval",
        "memo"
    ];
    public function event()
    {
        // event_idが外部キーとして、Eventモデルと関連していることを指定
        return $this->belongsTo(Event::class, 'event-id');
    }
    public function worker()
    {
        return $this->belongsTo(Worker::class, "worker-id");
    }
}
