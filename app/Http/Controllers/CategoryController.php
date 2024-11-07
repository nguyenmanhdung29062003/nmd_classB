<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\Category\CreateRequest;
use App\Models\Category;
use App\Service\CategoryService;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService=$categoryService;
    }

    public function index(){
        $categories = $this->categoryService->getList();

        return view('categories.list',['item'=>$categories]);
    }

    public function show(){
        return view('categories.create');
    }

    public function create(CreateRequest $createRequest){
        //validation
        //createRequest rex tự lấy dữ liệu trên request và validate sau đó truyền vào param
        $params = $createRequest->validated();

        $result = $this->categoryService->createCategory($params);

        if ($result) {
            return redirect()->route('category.index');
        }
    }
    
    public function edit(Category $category){
	    //truyền đối tượng category qua view vì đã sd modal binding
        return view('categories.edit',['category'=>$category]);
    }

    public function editDetail(CreateRequest $createRequest,Category $category){
        //validation
        //createRequest rex tự lấy dữ liệu trên request và validate sau đó truyền vào param
        $params = $createRequest->validated();

        $result = $this->categoryService->update($category, $params);
        if ($result) {
            return redirect()->route('category.index');
        }
    }

    public function delete(Category $category){
        //xóa mềm sp
        $category->delete();

        return redirect()->route('category.index');
    }

    public function find(Request $request)
    {
        // Lấy giá trị của input có name="input" từ form
        $searchTerm = $request->input('input'); 

        if(empty($searchTerm)){
            return redirect()->route('category.index');
        }

        //Tìm kiếm danh mục theo từ khóa
        $categories = Category::where('name', 'LIKE', "%{$searchTerm}%")->get();

        

        // Trả kết quả về view hoặc xử lý theo yêu cầu
        return view('categories.find',['item'=>$categories]);
    }
}
