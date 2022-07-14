<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id',
        'username',
        'nationality',
        'is_visa',
        'doe_passport'
    ];

    protected $hidden = [
        
    ];
    
    public function transaction(){
        return $this -> belongsTo(Transaction::class , 'transaction_id','id'); 
    }
}

