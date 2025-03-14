@extends('layout')
@section('titlepage','Website bán hàng online LaraSu24')
@section('title','Welcome')

@section('content')
<div style="margin-bottom: 50px; float: left: 100%;">
    <div class="container">
            <div class="left-box">
                <h2>Danh Mục</h2>
                <!-- Danh sách danh mục -->
                <ul>
                    <li><a href="#">Danh mục 1</a></li>
                    <li><a href="#">Danh mục 2</a></li>
                    <li><a href="#">Danh mục 3</a></li>
                    <!-- Thêm danh mục cần hiển thị -->
                </ul>
            </div>

            <div class="right-box">
                <div class="product-list">
                    <!-- Danh sách sản phẩm -->
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
                <div class="pagination">
                    <!-- Phân trang -->
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                </div>
            </div>
        </div>
</div>

        @endsection