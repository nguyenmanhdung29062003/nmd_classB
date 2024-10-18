<?php
namespace App\Service;

//thực hiện các CRUD , gọi MODEL

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService {
    //khai bao model
    protected $model;

    //tạo constructor, khởi tạo
    public function __construct(Product $product){
        $this->model = $product;
    }

    //hàm thêm product
    public function createPro($params)
    {
        #sau khi có dữ liệu, tiến hành xử lý logic
		#create() trong model là 1 hàm có sẵn trong Laravel
		#dùng để thêm mới , nó giống save() của repository trong Spring
        try{
            Log::info('Params:', $params);
            $product = $this->model->create($params);
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

    //ham update
    public function update($product,$params)
    {
        try{
            Log::info('Param',$params);
            $result = $product->update($params);
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
