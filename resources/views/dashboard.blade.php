
@extends('layouts.template')

@section('title', 'Dashboard')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- navbar  -->
@include('layouts.topnav')
<!-- / navbar  -->

  <!-- Main Sidebar Container -->
    @include('layouts.researchersidebar')
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

