<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Test extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['id', 'user_name', 'email'];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $list = $query->paginate('10'); //phân trang auto
        return $list;
    }
    public function saveNew($params)
    {
        $data = array_merge($params['cols'], [
            'password' => Hash::make($params['cols']['password']),
        ]
        );
        //   dd($data);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}
