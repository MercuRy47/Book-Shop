<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function index(){
        $books = Book::all();
        $calculatePrice = 0;
        foreach ($books as $book) {
            $calculatePrice += $book->bk_price * $book->bk_stock; 
        }
        return view('pages.cart', compact('books', 'calculatePrice'));
    }

    // 📌 แสดงรายการสินค้าในตะกร้า
    public function cart() {
        $cart = session('cart', []); // ดึงข้อมูลตะกร้า
        $books = Book::whereIn('bk_id', array_keys($cart))->get(); // ค้นหาข้อมูลสินค้า

        // คำนวณจำนวนสินค้าทั้งหมดในตะกร้า
        $totalItems = array_sum($cart);

        return view('pages.cart', compact('books', 'cart', 'totalItems'));
    }

    // 📌 เพิ่มสินค้าเข้าไปในตะกร้า
    public function addToCart($id) {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]++; // เพิ่มจำนวนถ้าสินค้ามีอยู่แล้ว
        } else {
            $cart[$id] = 1; // ถ้ายังไม่มีให้เริ่มต้นที่ 1
        }

        session(['cart' => $cart]); // บันทึกลง session

        return redirect('/store')->with('success', 'เพิ่มสินค้าเรียบร้อย');
    }

    // 📌 ล้างตะกร้าสินค้า
    public function checked() {
        // ล้างตะกร้าสินค้าใน session
        session()->forget('cart');
        
        // รีไดเร็กต์กลับไปที่หน้า store พร้อมแสดงข้อความ
        return redirect('/store')->with('success', 'Order placed successfully!');
    }    
}
