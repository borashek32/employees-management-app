<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name'
    ];

    public function states()
    {
      return $this->hasMnay(State::class);
    }

    public function cities()
    {
      return $this->hasMnay(City::class);
    }
}
