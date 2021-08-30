<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Project
 * @package App\Models
 * @version August 29, 2021, 1:48 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $projectimages
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $tecnologias
 */
class Project extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'projects';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'title',
        'description',
        'tecnologias'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projectimages()
    {
        return $this->hasMany(\App\Models\Projectimage::class, 'project_id', 'id');
    }
}
