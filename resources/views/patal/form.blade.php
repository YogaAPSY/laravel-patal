@extends('adminlte::page')

@section('content')
<!-- general form elements -->

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@elseif ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card card-primary">
    <div class="card-header">
        @if(isset($title))
        <h3 class="card-title">Show Patal</h3>
        @else
        <h3 class="card-title">Add/Edit Patal</h3>
        @endif
    </div>

    <!-- /.card-header -->
    <!-- form start -->
        @if(isset($patals))
        <form action="{{route('patal.update', [$patals->id])}}" method="POST" role="form"
            enctype="multipart/form-data">
            <input type="hidden" value="PUT" name="_method">
        @else
        <form action="{{route("patal.store")}}" method="POST" role="form" enctype="multipart/form-data">
        @endif
                <div class=" card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input value="{{ $patals->name ?? ''}}" type="text" name="name" class="form-control"
                        id="exampleInputEmail1" placeholder="Ex : Yoga Anugrah Pratama" {{ isset($title) ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input value="{{ $patals->email ?? ''}}" type="email" name="email" class="form-control"
                        id="exampleInputPassword1" placeholder="Ex : yogaanugrahpsy@gmail.com" {{ isset($title) ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input value="{{ $patals->phone ?? ''}}" type="text" name="phone" class="form-control"
                        id="exampleInputEmail1" placeholder="Ex : 0898xxxx" {{ isset($title) ? 'disabled' : '' }}>
                </div>

            </div>
            <!-- /.card-body -->
            @csrf
            @if(isset($title)==null)
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            @endif
        </form>
</div>
<!-- /.card -->
@stop
