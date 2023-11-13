<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundCardChange extends Model
{
    use HasFactory;
    protected $table = 'background_card_changes';
    protected $fillable = [
        'card',
    ];
}
