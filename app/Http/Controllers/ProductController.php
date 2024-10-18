<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //khai báo service
    protected $service;

    //tạo constructor
    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }
    //nhận đầu vào là request để validation dữ liệu
    public function store(CreateRequest $createRequest)
    {
        //validation
        //createRequest rex tự lấy dữ liệu trên request và validate sau đó truyền vào param
        $params = $createRequest->validated();
        //$param chính là dữ liệu được gửi
        //tiến hành gọi request để gọi service
        $result = $this->service->createPro($params);
        if ($result) {
            return new ProductResource($result);
        }
        return response()->json(
            [
                'message' => 'Khong thành công'
            ]
        );
    }
    //Laravel hỗ trợ Route Model Binding, một tính năng rất hữu ích để tự động lấy đối tượng model tương ứng với giá trị ID trong URL.
    // Đây là cách Laravel hiểu và tự động gán $product trong phương thức update().
    public function updateProduct(CreateRequest $createRequest, Product $product)
    {
        $params = $createRequest->validated();
        $result = $this->service->update($product, $params);
        if ($result) {
            return response()->json([
                'msg' => 'Cap nhat thanh cong'
            ]);
        }
        return response()->json(
            [
                'message' => 'Khong thành công'
            ]
        );
    }

    //timkiem
    public function show(Product $product = null)
    {
        if ($product != null) {
            return new ProductResource($product);
        }
        return ProductResource::collection(Product::all());
    }
    
    //xoa mem
    public function softdelete(Product $product)
    {
        // Xóa mềm sản phẩm
        $product->delete();

        return response()->json([
            'message' => 'Sản phẩm đã được xóa mềm'
        ]);
    }

    //Khoi phuc
    public function restore($id)
    {
        // Tìm sản phẩm đã bị xóa mềm
        $product = Product::withTrashed()->find($id);

        // Khôi phục sản phẩm
        if ($product) {
            $product->restore();

            return response()->json([
                'message' => 'Sản phẩm đã được khôi phục'
            ]);
        }

        return response()->json([
            'message' => 'Không tìm thấy sản phẩm'
        ]);
    }
}
