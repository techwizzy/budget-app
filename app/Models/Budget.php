<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table = 'budgets';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                           'budget_title',
                          'budget_amount',
                          'start_date',
                          'end_date'
                          ];
}
