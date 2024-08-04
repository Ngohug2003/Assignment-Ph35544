@extends('layouts.admin.master')
@section('title', 'Thêm loại tin')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-3 mb-3">Thêm loại tin</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 1; $i++)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="categories[{{ $i }}][name]" value="{{ old("categories.$i.name") }}">
                                            @error("categories.$i.name")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="categories[{{ $i }}][slug]">
                                            @error("categories.$i.slug")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger removeRowBtn">-</button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-success" id="addRowBtn">+</button>
                </div>

                <style>
                    .table th,
                    .table td {
                        text-align: center;
                        vertical-align: middle;
                    }

                    .table input[type="text"],
                    .table input[type="file"],
                    .table input[type="number"] {
                        width: 100%;
                    }

                    .table .form-control {
                        padding: 5px;
                    }
                </style>

                <script>
                    document.getElementById('addRowBtn').addEventListener('click', function() {
                        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                        var rowCount = table.rows.length;
                        var lastRow = table.rows[rowCount - 1];
                        var newRow = lastRow.cloneNode(true);
                        var newRowIndex = rowCount;

                        // Update the names and values of the inputs in the new row
                        newRow.querySelectorAll('input').forEach(function(input) {
                            var name = input.getAttribute('name');
                            if (name) {
                                var newName = name.replace(/\d+/, newRowIndex);
                                input.setAttribute('name', newName);
                                input.value = '';
                            }
                        });

                        table.appendChild(newRow);

                        // Re-attach the event listener to the new remove button
                        attachRemoveRowEvent(newRow.querySelector('.removeRowBtn'));
                    });

                    function attachRemoveRowEvent(button) {
                        button.addEventListener('click', function() {
                            var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                            if (table.rows.length > 1) {
                                var row = this.closest('tr');
                                row.remove();
                            } else {
                                alert("Không thể xóa");
                            }
                        });
                    }

                    // Attach event listeners to the initial remove buttons
                    document.querySelectorAll('.removeRowBtn').forEach(function(button) {
                        attachRemoveRowEvent(button);
                    });
                </script>

                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
