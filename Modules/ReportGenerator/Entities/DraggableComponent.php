<?php
/*
|--------------------------------------------------------------------------
| DraggableComponent Model
|--------------------------------------------------------------------------
|
| This is the model for DraggableComponent table.
| Copyright 2018 Tigpezeghe Rodrige K. <tigrodrige@gmail.com>
|
*/

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
     * The database connection name for DraggableComponent model.
     * TODO
     * @var string
     */
    protected $connection = 'mysql_report_generator';
}
