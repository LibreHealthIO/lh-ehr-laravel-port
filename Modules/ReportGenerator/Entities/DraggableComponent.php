<?php

namespace Modules\ReportGenerator\Entities;

use Illuminate\Database\Eloquent\Model;

class DraggableComponent extends Model
{
    protected $fillable = ['is_default', 'user', 'title', 'order', 'active', 'notes', 'toggle_sort', 'toggle_display'];

    /**
     * Convert notes column from jsona(as specified in migration file) to array.
     *
     * @var string
     */
    protected $casts = [
        'notes' => 'array'
    ];

    /**
     * The connection name for the model.
     * TODO
     * @var string
     */
    //protected $connection = 'connection-name';
}
