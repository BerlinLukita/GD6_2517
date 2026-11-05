<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Promotor extends Model
{
 protected $fillable = ['nama', 'kontak']; 
 public function konsers(): HasMany 
 {
 return $this->hasMany(Konser::class);
 }
}
