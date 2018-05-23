<?php namespace WillWritingPartership\DIYWill\Models;

use Model;

/**
 * TermsAndCon Model
 */
class TermsAndCon extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'willwritingpartership_diywill_terms_and_cons';

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
