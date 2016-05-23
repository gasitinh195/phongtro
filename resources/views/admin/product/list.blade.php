@extends('admin.master')
@section('controller','Product')
@section('action','List')
@section('content')

<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Introduction</th>
            <th>Content</th>
            <th>Description</th>
            <th>Catelogy</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=0; ?>
        @foreach ($pro as $item)
        
        <?php $stt=$stt+1; ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item["name"] !!}</td>
            <td>{!! number_format($item["price"],0,",",".") !!} VNĐ</td>
            <td>{!! $item["intro"] !!}</td>
            <td>{!! $item["content"] !!}</td>
            <td>{!! mb_substr($item["description"],0,6)!!} ... </td>
            <td>
                <?php
                    $par = DB::table('cates')->where('id',$item["cate_id"])->first(); 
                    echo $par->name;
                ?>
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete-row" data-toggle="modal" data-target="#myModal"  url="{!! URL::Route('admin.product.getDelete',$item['id'])!!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::Route('admin.product.getEdit',$item['id'])!!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top:300px">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="text-align:center">Xóa à</h3>
      </div>
      <div class="modal-body" style="text-align:center">
        <a  href="" class="btn btn-danger md-delete" >Ừ xóa</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Thôi ko xóa</button>
      </div>
    </div>

  </div>
</div>
@endsection()