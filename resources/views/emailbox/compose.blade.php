{{-- @extends('layouts.template')
@section('title', 'Summernote Project')

@section('content')


 <script src="{{ asset('composetextarea.js') }}"></script>
@endsection
 --}}

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>AdminLTE 3 | Editors</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- summernote -->
   <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
   <!-- SimpleMDE -->
   <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
 </head>
 <body class="hold-transition sidebar-mini">
 <div class="wrapper">

    @include('layouts.topnav')

    @include('layouts.sidebar')

   <div class="content-wrapper">
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Text Editors</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Text Editors</li>
             </ol>
           </div>
         </div>
       </div>
     </section>

     <section class="content">
       <div class="row">
         <div class="col-md-12">
           <div class="card card-outline card-info">
             <div class="card-header">
               <h3 class="card-title">
                 Summernote
               </h3>
             </div>
             <div class="card-body">
               <textarea id="summernote">
                 Place <em>some</em> <u>text</u> <strong>here</strong>
               </textarea>
             </div>
             <div class="card-footer">
               Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
             </div>
           </div>
         </div>
       </div>
     </section>
   </div>
   <footer class="main-footer">
     <div class="float-right d-none d-sm-block">
       <b>Version</b> 3.2.0
     </div>
     <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
   </footer>

   <aside class="control-sidebar control-sidebar-dark">
   </aside>
 </div>

 <!-- jQuery -->
 <script src="../../plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../../dist/js/adminlte.min.js"></script>
 <!-- Summernote -->
 <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
 <!-- CodeMirror -->
 <script src="../../plugins/codemirror/codemirror.js"></script>
 <script src="../../plugins/codemirror/mode/css/css.js"></script>
 <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
 <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../../dist/js/demo.js"></script>
 <!-- Page specific script -->
 <script>
   $(function () {
     // Summernote
     $('#summernote').summernote()

     // CodeMirror
     CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
       mode: "htmlmixed",
       theme: "monokai"
     });
   })
 </script>
 </body>
 </html>


