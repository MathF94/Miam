<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
    
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}