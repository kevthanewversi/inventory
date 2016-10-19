<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class InternalInvoice extends Model implements AuthenticatableContract
{
    use Authenticatable;

    public function user()
   {
   return $this->belongsTo('App\User');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'internal_invoice';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'employee_name', 'halflt', 'onelt','onehalflt','fivelt','tenlt','eighteenlt',];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
}
