@extends('layout')
@section('titlepage','Website bán hàng online LaraSu24')
@section('title','Sản phẩm mùa hè 2024')

@section('content')
<div class="container">
            <h2>Sản Phẩm Mới</h2>
            <div class="product-box">
                @foreach($newProducts as $item)
                <div class="product">
                    <img src="{{ $item->img}}" alt="" />
                    <h3>{{ $item->name}}</h3>
                    <p>{{ number_format($item->price,0,'.',',')}} VNĐ</p>
                    <p>{{ $item->category->name}}</p>
                </div>
                @endforeach
                
            </div>
            <h2>Sản Phẩm Bán Chạy</h2>
            <div class="product-box">
                <div class="product">
                    <img src="img/hinh1.webp" alt="" />
                    <h3>Sản Phẩm 1</h3>
                    <p>Mô tả sản phẩm 1.</p>
                </div>
                <div class="product">
                    <img src="img/hinh2.webp" alt="" />
                    <h3>Sản Phẩm 2</h3>
                    <p>Mô tả sản phẩm 2.</p>
                </div>
                <div class="product">
                    <img src="img/hinh3.webp" alt="" />
                    <h3>Sản Phẩm 3</h3>
                    <p>Mô tả sản phẩm 3.</p>
                </div>
                <div class="product">
                    <img src="img/hinh4.webp" alt="" />
                    <h3>Sản Phẩm 4</h3>
                    <p>Mô tả sản phẩm 4.</p>
                </div>
                <div class="product">
                    <img src="img/hinh5.webp" alt="" />
                    <h3>Sản Phẩm 5</h3>
                    <p>Mô tả sản phẩm 5.</p>
                </div>
                <div class="product">
                    <img src="img/hinh6.webp" alt="" />
                    <h3>Sản Phẩm 6</h3>
                    <p>Mô tả sản phẩm 6.</p>
                </div>
            </div>
        </div>

        @endsection