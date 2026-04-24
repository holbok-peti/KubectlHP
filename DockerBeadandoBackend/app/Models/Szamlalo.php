<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szamlalo extends Model
{
    /** @use HasFactory<\Database\Factories\SzamlaloFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'nev',
        'ertek_a',
        'ertek_b',
        'eredmeny'
    ];

    protected $appends = ['eredmeny'];

    public function getEredmenyAttribute()
    {
        if($this->ertek_a == 3 && $this->ertek_b == 3){
            return 7;
        }
        else{
            return $this->ertek_a + $this->ertek_b;
        }
    }
}
