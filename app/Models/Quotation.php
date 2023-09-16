<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory; 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quotations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'user_id', 'vat_percent', 'vat', 'sub_total', 'net_total', 'remark'];

    public function quotationDetails()
    {
        return $this->hasMany(QuotationDetail::class, 'quotation_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
