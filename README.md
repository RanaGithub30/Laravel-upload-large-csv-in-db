## Upload Million Records 

   - setup a empty laravel file using following command
             
             composer create-project laravel/laravel:^9.0 example-app

   - serve the project using following command & on browser hit the link ( http://127.0.0.1:8000/ )

             php artisan serve

   - create a controller called RecordsUploadController using following command
          
              php artisan make:controller RecordsUploadController
    
   - create a route for file upload page in routes/web.php & create a method on controller for a view page
   - create a new route called upload for uploading a large data in db & write the code as per this project
   - set up db details in env like db name, user name, p/wd & also create a db also
   - create model & migrtaion using following command

              php artisan make:model BusinessSurvey -m

   - declare the fields name in migration & model
   - Now migrate the table using following command 

              php artisan migrate
   - write the code for uploading million data from csv in the controller as per given here
   - Run the project from the link & upload a millions a record, but it will take times & don't show you progress bar

             http://127.0.0.1:8000/upload-file


## Set Up Queue

   - create the queue table using following command, it will create a migration file called jobs

            php artisan queue:table

   - Now run the migration command to migrate all the queue table

            php artisan migrate

   - Now create a Job using following commands

            php artisan make:job BusinessProcess

   - Now cut all the code from store method and paste it to the job's handle method & dispatch the job from controller's store method, just follow the code of this project in controller & app/jobs/BusinessProcess.php
   - convert the QUEUE_CONNECTION in .env from sync to database
   - Now open a new cmd & run the following command for running the queue and also run ( php artisan serve ) in another cmd

            php artisan queue:work

   - Now try to upload the records and you can see the records are uploaded with no time at all
   - Till Now records has been successfully uplodad into database using queue


## Set up Job Batching for progress details (Working ... )

   - Laravel's job batching feature allows you to easily execute a batch of jobs and then perform some action when the batch of jobs has completed executing.
   - create a table for job batching using the following command

            php artisan queue:batches-table
   - Now migrate the table using ( php artisan migrate )
   - Add a new trait Batchable in the ( app/jobs/BusinessProcess.php ) file
   - Now you can define & dispatch the batch from controller as per the project here
   - 
