<?php

// app/Models/Team.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // Je kunt de naam van de tabel hier aangeven als deze niet de standaard is
    protected $table = 'teams';

    // Je kunt de velden die massaal toewijsbaar zijn hier aangeven
    protected $fillable = ['name', 'points', 'creator_id'];

}
