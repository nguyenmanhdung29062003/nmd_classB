<?php

namespace App\Service;

//thực hiện các CRUD , gọi MODEL

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryService
{

    //khai bao model
    protected $category;

    //tạo constructor, khởi tạo
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getList()
    {
        return $this->category->orderBy('id','desc')->get();
    }
    
    //create
    public function createCategory($params){
        
        #sau khi có dữ liệu, tiến hành xử lý logic
		#create() trong model là 1 hàm có sẵn trong Laravel
		#dùng để thêm mới , nó giống save() của repository trong Spring
        try{
            Log::info('Params:', $params);
            $product = $this->category->create($params);
            #params là mảng gồm key:value, đại  diện cho cột và giá trị của nó trong DB
			#để lấy giá trj hoặc set giá tri: $params['tên cột']=...;
        }
        catch(Exception $exception){
            Log::error($exception);
            return false;
        }
        #hoặc viết kiểu truy vấn
		# DB::table('tên bảng')->insert('câu lệnh SQL')
		return $product;

    }
    
    //update
    public function update($category,$params){
        try{
            Log::info('Param',$params);
            $result = $category->update($params);
        }
        catch(Exception $exception)
        {
            Log::error($exception);
            return false;
        }
        //trả về true nếu thành công, false nếu thất bại
        return $result;
    }

}
