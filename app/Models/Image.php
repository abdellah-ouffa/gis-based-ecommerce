<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $path
 * @property int $model_id
 * @property string $created_at
 * @property string $updated_at
 */
class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['path', 'model_id', 'type', 'created_at', 'updated_at'];

}
