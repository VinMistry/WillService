<?php namespace WillWritingPartership\DIYWill\Models;

use Model;
use Validation;
/**
 * ClientDataModel Model
 */
class ClientData extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'clientdata';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public $rules = [
        'title' => 'required',
        'firstname' => 'required|between:2,16',
        'lastname' => 'required|between:2,16',
        'email' => 'required|email',
        'mobileNumber' => 'required',
        'workNumber' => 'required',
        'homeNumber' => 'required',
        'addressline1' => 'required',
        'city' => 'required',
        'postalcode' => 'required'
    ];
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
