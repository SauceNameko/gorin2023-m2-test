<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  protected $fillable = [
    "name",
    "place",
    "event-date"
  ];
  public function dispatches()
  {
    return $this->hasMany(Dispatch::class, 'event-id');
  }
}
