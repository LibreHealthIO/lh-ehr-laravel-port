<?php

namespace Modules\ReportGenerator\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportFormat extends Model
{
    protected $fillable = ['user', 'title', 'system_feature', 'description', 'draggable_components_id'];

    /**
     * Convert draggable_components_id column from jsona(as specified in migration file) to array.
     *
     * @var string
     */
    protected $casts = [
        'draggable_components_id' => 'array'
    ];

    /**
     * The connection name for the model.
     * TODO
     * @var string
     */
    //protected $connection = 'connection-name';
}
