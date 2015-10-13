<?php
class Upload{
	public static function uploadFile($file,$rule=array(),$mes=array(),$upload_path='uploads/img',$success_route){
		$valid = Validator::make(array('file'=>$file),$rule,$mes);
		if($valid->passes()){
			$name = $file->getClientOriginalName();
			$clear = new ClearFileName;
			$name = $clear->make($name);
			while(File::exists($upload_path.$name)){
				$name = uniqid().'_'.$name;
			}
			$upload = $file->move($upload_path,$name);
			if($upload){
				return Redirect::to($success_route);
			}
		}else{
			return Redirect::back()->with('error',$valid->errors()->first());
		}
	}
	
	public static function uploadFileResize($file,$rule=array(),$mes=array(),$upload_path='uploads/img',$success_route,$w,$h){
		$valid = Validator::make(array('file'=>$file),$rule,$mes);
		if($valid->passes()){
			$name = $file->getClientOriginalName();
			$name = $this->clearFileName($name);
			while(File::exists($upload_path.$name)){
				$name = $name.'_'.uniqid();
			}
			$upload = Image::make($file->getRealPath())->resize($w,$h,function($constraint){
				$constraint->aspectRatio();
			})->save($upload_path.$name);
			if($upload){
				return $success_route;
			}
		}else{
			return Redirect::back()->with('error',$valid->errors()->first());
		}
	}

	
}