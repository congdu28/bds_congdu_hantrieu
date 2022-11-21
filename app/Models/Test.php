<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    use HasFactory;
    protected $table ="users";
    protected $fillable = ['id','user_name','email'];
    
    public function loadListWithPager($param=[]){
        $query = DB::table($this->table)
                 ->select($this->fillable);

            $list = $query->paginate(5); //phân trang auto
            return $list;
    }
}
