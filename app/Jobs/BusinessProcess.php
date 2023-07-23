<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;
use App\Models\{BusinessSurvey};

class BusinessProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = resource_path('temp');
        $files = glob("$path/*.csv");

        $header = [];
        foreach($files as $key => $file){
               // The str_getcsv() function parses a string for fields in CSV format and returns an array containing the fields read.
               
               $data = array_map('str_getcsv', file($file));

               if($key == 0){
                   $header = $data[0];
                   // remove header/columns from the real data
                   unset($data[0]);
               }

               foreach($data as $item){
                    $finalData = array_combine($header, $item);
                    BusinessSurvey::create($finalData);
               }
               

               // delete the temporary file from the folder after storeing data
               unlink($file);
        }
    }
}
