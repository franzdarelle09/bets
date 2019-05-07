@extends('layouts.master')
@section('additional_styles')
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:600" rel="stylesheet" />
  <link href="https://unpkg.com/vue-select/dist/vue-select.css" rel="stylesheet" />
  <style type="text/css">

    body {
      font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
      text-rendering: optimizelegibility;
      -moz-osx-font-smoothing: grayscale;
      -moz-text-size-adjust: none;
    }

    h1,.muted {
      color: #2c3e5099;
    }

    h1 {
      font-size: 26px;
      font-weight: 600;
    }

    #app {
      /*max-width: 30em;*/
      margin: 1em auto;
    }
  </style>
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Match</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/homr">Home</a></li>
              <li class="breadcrumb-item active">Add Match</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div id="app">
          <add-match></add-match>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@section('additional_scripts')
<script src="https://unpkg.com/vue-select@3.0.2"></script>
<script type="text/javascript">
  Vue.component('v-select', VueSelect.VueSelect);
</script>
@endsection