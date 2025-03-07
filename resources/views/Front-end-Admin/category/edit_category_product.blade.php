@extends('LayOut.admin-dashboard.master_admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                @foreach($edit_category_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ URL::to('update-category-product/'.$edit_value->category_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{ $edit_value->category_name }}" onkeyup="ChangeToSlug();" name="category_product_name" class="form-control">
                            @error('category_product_name') <!-- Hiển thị lỗi cho trường tên danh mục -->
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1">{{ $edit_value->category_desc }}</textarea>
                            @error('category_product_desc') <!-- Hiển thị lỗi cho trường mô tả danh mục -->
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
    <label for="category_status">Trạng thái</label>
    <select name="category_product_status" class="form-control">
        <option value="0" {{ $edit_value->category_status == 0 ? 'selected' : '' }}>Không hiển thị</option>
        <option value="1" {{ $edit_value->category_status == 1 ? 'selected' : '' }}>Hiển thị</option>
    </select>
</div>

                        <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
