<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <style>
        body {
            pointer-events: none;
            font-weight: 300;
            direction: rtl;
        }
    </style>
    @php
    $testrows = App\Models\TestRow::where('project_id',$project->id)->orderBy('name_program','ASC')->get();
    $testcsqs = App\Models\TestCsq::where('project_id',$project->id)->orderBy('name_program','ASC')->get();
    $tests = App\Models\Test::where('project_id',$project->id)->orderBy('name_program','ASC')->get();
    $tests = App\Models\Test::where('project_id',$project->id)->orderBy('q1','ASC')->get();
    $tests = App\Models\Test::where('project_id',$project->id)->orderBy('q2','ASC')->get();
    $tests = App\Models\Test::where('project_id',$project->id)->orderBy('q3','ASC')->get();
    $tests = App\Models\Test::where('project_id',$project->id)->orderBy('q4','ASC')->get();
    $tests = App\Models\Test::where('project_id',$project->id)->orderBy('q5','ASC')->get();
    @endphp

    <iframe class="sub-menu">
        <br>
        <br>
        <br>

        @foreach($tests as $key => $test)
        <div>
            <h4 style="font-weight: 200,">{ {{ $key+1 }} } {{ $test->name_program }}</h4>
        </div>
        <div>
            <h4 style="font-weight: 200,">( {{ $test->q1 }} - {{ $test->q2 }} - {{ $test->q3 }} - {{ $test->q4 }} )</h4>
        </div>
        @endforeach
        <br>
        <br>
        <br>
        <hr>
        @foreach($testrows as $key => $test)
        <div>
            <h4 style="font-weight: 200,">{ {{ $key+1 }} } {{ $test->name_program }} ▢</h4>
        </div>
        @endforeach
        <br>
        <br>
        <br>
        <hr>
        @foreach($testcsqs as $key => $test)
        <div>
            <h4 style="font-weight: 200,">{ {{ $key+1 }} } {{ $test->name_program }}</h4>
        </div>
        @endforeach
    </iframe>
    </div>

    <script>
        $(document).ready(function(){
             $(document).bind("contextmenu",function(e){
                  alert('right click disabled');
                return false;
            });
        });
    </script>
</body>

</html>