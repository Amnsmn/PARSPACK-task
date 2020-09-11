<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PARSPACK</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md">
                    ParsPack-Task
                </div>
          
                <div class="links">
                <input id="tokenField" type="hidden" value="{{$token}}"/>
                <input id="submitButton" type="button" value="ProcessList" />
                <input id="newdir_sub" type="button" value="NewDir" />
                <input id="newfile_sub" type="button" value="NewFile" />
                <input id="dirlist_sub" type="button" value="DirList" />
                <input id="filelist_sub" type="button" value="FileList" />

                    
                    </div>

    
            </div>
        </div>
    </body>
</html>

<script>
$('#submitButton').on('click',function(){
    $.ajax({
          url: "{{ route('ProcessList') }}",
          type: 'GET',
          contentType: 'application/json',
          headers: {
                    "Authorization": "Bearer " + $('#tokenField').val()
                 },
          async: false,
          success: function(d){
   alert(d.P); 
  }
            })
            });

            $('#newdir_sub').on('click',function(){
    $.ajax({
          url: "{{ route('NewDir') }}",
          type: 'GET',
          contentType: 'application/json',
          headers: {
                    "Authorization": "Bearer " + $('#tokenField').val()
                 },
          async: false,
          success: function(d){
   alert(d); 
  }
            })
            });
            $('#newfile_sub').on('click',function(){
    $.ajax({
          url: "{{ route('NewFile') }}",
          type: 'GET',
          contentType: 'application/json',
          headers: {
                    "Authorization": "Bearer " + $('#tokenField').val()
                 },
          async: false,
          success: function(d){
   alert(d.P); 
  }
            })
            });
            $('#dirlist_sub').on('click',function(){
    $.ajax({
          url: "{{ route('DirList') }}",
          type: 'GET',
          contentType: 'application/json',
          headers: {
                    "Authorization": "Bearer " + $('#tokenField').val()
                 },
          async: false,
          success: function(d){
   alert(d.DL); 
  }
            })
            });
            $('#filelist_sub').on('click',function(){
    $.ajax({
          url: "{{ route('FileList') }}",
          type: 'GET',
          contentType: 'application/json',
          headers: {
                    "Authorization": "Bearer " + $('#tokenField').val()
                 },
          async: false,
          success: function(d){
   alert(d.FL); 
  }
            })
            });

</script>