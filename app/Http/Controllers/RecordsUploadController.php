<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BusinessSurvey};
use App\Jobs\BusinessProcess;
use Illuminate\Support\Facades\Bus;

class RecordsUploadController extends Controller
{
    //

    public function upload_file() {
           return view('upload_file');
    }

    public function upload(Request $request){
        if($request->has('file')){
            /**
             * Read data from csv file
             * 
            */

            // $data = array_map('str_getcsv', file(request()->file));
            $data = file(request()->file);

            // chunking files to reduce time
            $chunks = array_chunk($data, 1000); // chunk 1000 data at a time
            
            // convert 1000 records into a new csv file
            foreach($chunks as $key => $chunk){
                  $name = "/tmp{$key}.csv";
                  $path = resource_path('temp');
                  file_put_contents($path . $name, $chunk);
            }

            $this->store();

        }
        
        return redirect()->back()->with("success", "Success");
    }


    public function store(){
           // define batch
        //    $batch = Bus::batch([])->dispatch();
        //    $batch->add(new BusinessProcess());
        //    dd(Bus::findBatch($batch->id));
           BusinessProcess::dispatch();

        //    return $batch;
    }
}