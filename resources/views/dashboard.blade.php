@extends('layouts.template')
@section('title', 'Dashboard')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
    @include('layouts.sidebar')
  <div class="content-wrapper">

    @section('contents')

        @include('layouts.main')

    @endsection

  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

</body>
</html>

