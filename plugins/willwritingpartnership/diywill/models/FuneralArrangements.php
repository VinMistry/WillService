<?php namespace WillWritingPartership\DIYWill\Models;

use Model;

/**
 * FuneralArrangements Model
 */
class FuneralArrangements extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'willwritingpartership_diywill_funeral_arrangements';

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
