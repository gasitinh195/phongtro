@extends('admin.master')
@section('controller','Cate')
@section('action','list')
@section('content')

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Order</th>
            <th>Category Parent</th>
            <th>Description</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=0; ?>
        @foreach ($data as $item)
        <?php $stt=$stt + 1; ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item["name"] !!}</td>
            <td>{!! $item["order"] !!}</td>
            <td>
                @if($item["parent_id"]==0)
                    {{"None" }}
                
                @else
                   <?php 
                         $parent=DB::table("cates")->where('id',$item["parent_id"])->first();
                         echo $parent->name;
                    ?>
                @endif
            </td>
            <td>{!! $item["description"] !!}</td>
          
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete-row" data-toggle="modal" data-target="#myModal"  url="{!! URL::Route('admin.cate.getDelete',$item['id'])!!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::Route('admin.cate.getEdit',$item['id'])!!}">Edit</a></td>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Thôi éo xóa</button>
      </div>
    </div>

  </div>
</div>

@endsection()