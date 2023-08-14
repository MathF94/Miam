<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    use HasFactory;

    /**
    * @var array<int, string>
    */

    protected $fillable = [
        'user_id',
        'file',
        'receipe_name',
        'time_cook',
        'ingredients',
        'description'
    ];

}
