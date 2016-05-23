@extends('admin.master')
@section('controller','User')
@section('action','list')
@section('content')

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=0 ?>
        @foreach ($data as $key => $item)
        <?php $stt=$stt + 1; ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item["username"] !!}</td>
            <td>{!! $item["email"] !!}</td>
            <td>
                @if($item["level"] == 2)
                    {{"Super Admin"}}
                @elseif($item["level"] == 1)
                    {{"Admin"}}
                @else
                    {{"Member"}}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete-row" data-toggle="modal" data-target="#ModaldelUser"  url="{!! URL::Route('admin.user.getDelete',$item['id'])!!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="ModaldelUser" class="modal fade" role="dialog">
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