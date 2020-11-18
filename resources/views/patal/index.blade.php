@extends('adminlte::page')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List patal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Patal</a></li>
                    <li class="breadcrumb-item active">List Patal</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="col-md-3">
                        <a href="{{route("patal.create")}}" class="btn btn-primary"><i class="fas fa-edit">
                                Tambah</i></a>
                    </div>
                    <div class="col-md-9">

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="patals-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created At</th>
                                {{--  <th>Action</th>  --}}
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            @forelse($patals as $patal)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$patal->name}}</td>
                                <td>{{$patal->email}}</td>
                                <td>{{$patal->phone}}</td>
                                <td>{{$patal->created_at}}</td>
                                {{--  <td>
                                    <a href="{{route("patal.show", [$patal->id])}}"
                                        class="btn btn-sm bg-success"><i class="fas fa-eye"> Show</i></a>

                                    <a href="{{route("patal.edit", [$patal->id])}}"
                                        class="btn btn-sm bg-primary"><i class="fas fa-edit"> Edit</i></a>

                                    <form onsubmit="return confirm('Delete this patal permanently?')"
                                        action="{{route('patal.destroy', [$patal->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm bg-danger mt-2"><i
                                                class="fas fa-trash"> Delete</i></button>
                                    </form>

                                </td>  --}}
                            </tr>
                            @empty
                            <p>No Data patal</p>
                            @endforelse
                        </tbody>

                    </table>
                </div> <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@Push('js')
<script>
    $(function() {
        $('#patals-table').DataTable({
            processing: true,
            serverSide: false,
        });
    });
</script>
@endpush
@stop
