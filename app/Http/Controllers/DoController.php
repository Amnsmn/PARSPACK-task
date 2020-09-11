<?php
#ADAPTOR
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
class DoController extends Controller
{
    public $path =  '/opt/myprogram/';
    
    public function __construct()
    {
         $this->middleware('auth:api');
    }
    
    public function ProcessList(Request $request){

        $MyProcessList = shell_exec('tasklist'); 
        $MyprocessList_clean = explode("\n", $MyProcessList);
        return response()->json(['P'=> $MyprocessList_clean]);
        
    }
    
    public function NewDir(Request $request){
        $user_name = auth()->user()->name;
        File::makeDirectory($this->path.'\\'.$user_name, 0755, true, true);
        return 'Directory '. $this->path.'\\'.$user_name.' created';
    }
    public function NewFile(Request $request){
        $user_name = auth()->user()->name;
        File::put($this->path.'\\'.$user_name.'.txt','Sample File');
        return 'File '. $this->path.'\\'.$user_name.'.txt created';
    }

    public function DirList(Request $request){
        $Dir_list = File::directories($this->path);
        return response()->json(['DL'=> $Dir_list]);
    }

    public function FileList(Request $request){

        $file_list = scandir($this->path);
        return response()->json(['FL'=> $file_list]);
    }       

    

}
