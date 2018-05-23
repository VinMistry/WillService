<?php namespace WillWritingPartership\DIYWill\Models;

use Model;

/**
 * ProfExecutors Model
 */
class ProfExecutors extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'willwritingpartership_diywill_prof_executors';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
