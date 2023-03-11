<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductImage;
use PDF;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $productArr = Product::select('id', 'description', 'product_name', 'price')->with('product_images')->where('status', '=', TRUE)->get();
        return view('frontend.product.index', compact('productArr'));
    }

    public function product_details(Request $request, $id){
        
        $productArr = Product::where('id', $id)->first();
        $imges = ProductImage::where('product_id',$id)->get();
        return view('frontend.product.product_details', compact('productArr', 'imges'));
    }

    public function user_logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Your logged out successfully!');
    }

    public function product_detail_pdf(Request $request, $id){

        $productArr = Product::with('product_images')->where('id', $id)->first();   
        $data = [
            'title' => 'Product Details PDF Generate ',
            'date' => date('m/d/Y'),
        ];
        $hrml_data = view('frontend.product.product_pdf_report', compact('productArr', 'data'));
        $pdf = PDF::loadHTML($hrml_data);
        return $pdf->download('product_detail.pdf');
   }
}

?>