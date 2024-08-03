@extends('layouts.admin.master')
@section('content')
@if (session()->has('success'))
<script>
    alert('{{ session('success') }}');
</script>
@elseif (session()->has('error'))
<script>
    alert('{{ session('error') }}');
</script>
@endif

    <div class="container-fluid">
        <div class="row">
            <!-- Page Heading -->
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Loại tin</h1>
            </div>
            {{-- <div class="col-3">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div> --}}
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Danh sách loại tin</h6>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Loại tin</th>
                                <th>slug </th>
                                <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $categories)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $categories->name }}</td>
                                    <td>{{ $categories->slug}}</td>
                                    <td class="">
                                        <form action="{{ route('categories.destroy', $categories->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa Danh Mục này không?')">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="submit" class="btn btn-outline-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-outline-warning">Sửa</a>
                                        

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
    </div>
   =
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- End of Page Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
