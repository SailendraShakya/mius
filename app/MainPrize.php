<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPrize extends Model
{
	protected $table = 'main_prizes';
      protected $primaryKey = 'id';
      protected $fillable = ['id','item','gift','code','quantity','total_week_in_month','total_quantity_in_month','probability'];

      /* For Decimal Formating */
      // public function getQuantityAttribute($value){
      // 	return number_format($value,2);
      // }
      
      public function getProbabilityAttribute($value){
      	return ucfirst($value);
      }
      public static function getTotalQty(){
            $total = 0 ;
            $quantity = MainPrize::select('quantity')->pluck('quantity')->toArray();
            foreach ($quantity as $key => $value) {
                  $total += $value;
            }
            return $total;
      }
      public static function getTotalMnthQty(){
            $getTotalMnthQty = 0 ;
            $quantity = MainPrize::select('total_quantity_in_month')->pluck('total_quantity_in_month')->toArray();
            foreach ($quantity as $key => $value) {
                  $getTotalMnthQty += $value;
            }
            return $getTotalMnthQty;
      }
}
