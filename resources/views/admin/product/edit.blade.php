@extends('admin.master')
@section('controller','Product')
@section('action','edit')
@section('content')

<!-- /.col-lg-12 -->
<div class="col-lg-5" style="padding-bottom:120px">
     @include('admin.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="txtparentid">
                <option value="0">Please Choose Category</option>
                <?php cate_parent($parent,0,"-",$data["cate_id"]) ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" value="{!! old('txtCateName',isset($data)?$data['name'] : null) !!}" name="txtName" placeholder="Please Enter Username" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" value="{!! old('txtCateName',isset($data)?$data['price'] : null) !!}" name="txtPrice" placeholder="Please Enter prices" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($data)?$data['intro'] : null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($data)?$data['content'] : null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages" multiple="multiple" value="{!! old('fImages',isset($data)?$data['image'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription',isset($data)?$data['description'] : null) !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()