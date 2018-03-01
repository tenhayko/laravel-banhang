<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Bill;
use App\Cart;
use App\User;
use App\BillDetail;
use App\Customer;
use Session;
use Hash;
use Auth;
class PageController extends Controller
{
    //
    public function getIndex()
    {   
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(4,['*'],'page_a');
    	$sanpham_km = Product::where('promotion_price','<>',0)->paginate(8,['*'],'page_b');
    	return view('page.trangchu',['slide'=>$slide,'new_product'=>$new_product,'sanpham_km'=>$sanpham_km]);
    }  

    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type',$type)->paginate(6);
        $countsp = Product::where('id_type',$type)->count('id');
        $sp_khac = Product::where('id_type','<>',$type)->take(6)->get();
        $loai = ProductType::all();
    	return view('page.loai_san_pham',['sp_theoloai'=>$sp_theoloai,'sp_khac'=>$sp_khac,'countsp'=>$countsp,'loai'=>$loai]);
    } 

    public function getChitiet(Request $rq)
    {
        $sanpham =  Product::where('id',$rq->id)->first();
        $sp_tt = Product::where('id_type',$sanpham->id_type)->paginate(6);
    	return view('page.chitiet_sanpham',['sanpham'=>$sanpham,'sp_tt'=>$sp_tt]);
    }  

    public function getLienhe()
    {
    	return view('page.lienhe');
    }  

    public function getLogIn()
    {
    	if(Auth::check()){
	    	abort(404,'messages');
    	}else{
    		return view('page.dangnhap');
    	}
    }     

    public function getSignup()
    {
    	if(Auth::check()){
	    	abort(404,'messages');
    	}else{
    		return view('page.dangky');
    	}
    }   

    public function postSignup(Request $req)
    {
    	$this->validate($req,
    		[
    			'email'=>'required|email|unique:users,email',
    			'password'=>'required|min:6|max:20',
    			'fullname'=>'required',
    			're_password'=>'required|same:password'
    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'email.email'=>'Email không đúng định dạng',
    			'email.unique'=>'Email đã có người sử dụng',
    			'password.required'=>'Vui lòng nhập mật khẩu',
    			're_password.required'=>'Vui lòng nhập lại mật khẩu',
    			'password.min'=>'Mật khẩu ít nhất 6 ký tự',
    			'password.max'=>'Mật khẩu không được quá 20 ký tự',
    			're_password.same'=>'Mật khẩu không giống nhau',
    		]
    	);
    	$user =  new User;
    	$user->full_name = $req->fullname;
    	$user->email = $req->email;
    	$user->password = Hash::make($req->password);
    	$user->phone = $req->phone;
    	$user->address = $req->address;
    	$user->save();
    	return redirect('dang-nhap')->with('thongbao','Tạo tài khoản thành công');
    }  
    public function postLogIn(Request $req)
    {
    	
    	$this->validate($req,
    		[
    			'email'=>'required|email',
    			'password'=>'required',
    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'email.email'=>'Email không đúng định dạng',
    			'password.required'=>'Vui lòng nhập mật khẩu',
    		]
    	);
    	$credentials = ['email'=> $req->email, 'password'=> $req->password];
    	if (Auth::attempt($credentials)) {
    		return redirect()->route('trang-chu');
    	}else{
    		return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập không thành công']);
    	}
	    
    }
    public function postSigOut()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }     

    public function getSearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->paginate(8);
        return view('page.search',['products'=>$product]);
    }     

    public function getGioithieu()
    {
        return view('page.gioithieu');
    } 

    public function getAddToCart(Request $req,$id)
    {
        $product = Product::find($id);

    	$oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id)
    {
       $oldCart = Session::has('cart')?Session::get('cart'):null; 

       $cart = new Cart($oldCart);
       $cart->removeItem($id);
       if (count($cart->items)>0) {
          Session::put('cart',$cart);
       }else{
        Session::forget('cart');
       }
       return redirect()->back();
    }
    public function getCheckout()
    {
        return view('page.dat_hang');
    }
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');


        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->adress;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        if ($customer->save()) {
            # code...
        }
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');

        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
}
