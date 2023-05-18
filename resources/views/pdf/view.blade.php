<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            direction: rtl
        }
    </style>
  @php
   $tests = App\Models\Test::where('project_id',$project->id)->orderBy('name_program','ASC')->get();
       @endphp

           <div class="sub-menu">
               @foreach($tests as $test)
               <div><a href="vendors-grid.html">{{ $test->name_program }}</a></div>
               @endforeach
           </div>
       </div>

</body>
</html>
