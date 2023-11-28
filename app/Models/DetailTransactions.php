<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransactions extends Model
{
    use HasFactory;

    protected $fillable = ['head_transaction_id', 'no_trans', 'id_user', 'name', 'id_catalog', 'date', 'date2', 'adult_qty', 'child_qty', 'transportation_id', 'payment_id', 'proof'];
}