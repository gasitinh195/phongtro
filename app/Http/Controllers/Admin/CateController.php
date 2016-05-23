<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\cate;



class CateController extends Controller {

	public function getAdd(){
		$parent=cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.add',compact('parent'));
	}

	public function postAdd(CateRequest $request){
		$cate = new cate;
		$cate->name = $request->txtCateName;
		$cate->alias = vn_str_filter($request->txtCateName);
		$cate->order = $request->txtOrder;
		$cate->parent_id = $request->slcparent;
		$cate->keywords = $request->txtkeywords;
		$cate->description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_messages'=>'Add catelogy successfull']);
	}

	public function getList(){
		$data=cate::select('id','name','order','parent_id','description')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}

	public function getDelete($id){
		$parent=Cate::where('parent_id',$id)->count();
		if ($parent==0) 
		{
			$cate = Cate::find($id);
			$cate->delete($id);
			return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_messages'=>'Delete catelogy successfull']);
		}
		else
		{	
			return redirect()->route('admin.cate.getList')->with(['flash_level'=>'danger','flash_messages'=>'can not delete']);	
		}		

	}

	public function getEdit($id){
		$data=Cate::findorFail($id)->toArray();
		$parent=Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.edit',compact('parent','data','id'));
	}
	public function postEdit(Request $request,$id){
		$this -> validate($request,
			['txtCateName' => "required"],
			['txtCateName.required' => "Bạn cần nhập Name"]
		);
		$cate = Cate::find($id);
		$cate->name = $request->txtCateName;
		$cate->alias = vn_str_filter($request->txtCateName);
		$cate->order = $request->txtOrder;
		$cate->parent_id = $request->txtparentid;
		$cate->keywords = $request->txtkeywords;
		$cate->description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_messages'=>'Edit catelogy successfull']);
	}
}
