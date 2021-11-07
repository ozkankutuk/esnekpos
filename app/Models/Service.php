<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['name', 'price', 'tax', 'period'];

    public function ScopeUserPackage($query) {

        $query->where('name','like', "%". auth()->user()->register_type."%");
    }

    public function getTotalPriceAttribute(){
        return  number_format( ( $this->price + ( $this->price * $this->tax) ) * $this->period, 2, ',');
    }

}
