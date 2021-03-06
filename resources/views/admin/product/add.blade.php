@extends('admin.master')
@section('controller','Product')
@section('action','Add')
@section('content')

<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.error')
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slcparent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,'-',old('slcparent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Name product" value="{!! old('txtName')!!}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice')!!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro')!!}</textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent')!!}</textarea>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages" value="{!! old('fImages') !!}">
        </div>
        <div class="form-group">
            <label>Images Detail</label>
            <input type="file" multiple="multiple" name="fImagesDetail[]" value="{!! old('fImages') !!}">
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription')!!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>

@stop