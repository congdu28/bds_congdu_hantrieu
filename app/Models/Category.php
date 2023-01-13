<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['id', 'category_name'];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $list = $query->paginate('5'); //phân trang auto
        return $list;
    }


    public function saveNew($params)
    {
        // dd($params);
        $data = array_merge($params['cols'] );
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadOne($id,$params=[]){
        $query = DB::table($this->table)
               ->where('id','=',$id);
               $obj = $query->first();
               return $obj;
    }

    public function saveUpdate($params){
        if(empty($params['cols']['id'])){
            Session::push('errors','Không xác định bản ghi cập nhật');
        }
        $dataUpdate = [];
        foreach($params['cols'] as $colName=>$val){
            if($colName == 'id') continue;
            $dataUpdate[$colName] = (strlen($val) == 0) ? null:$val;
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
            return $res;
    }
}
