@extends('welcome')
@section('content')

    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="" method="get" class="tbl ajax_filter">
            <div class="row search-bar">
                <div class="col-4">
                    Tytuł lub opis:<br><input type="text" name="str" class="form-control"
                                              value="<?php if (isset($_GET['str']) && $_GET['str'] != '') echo $_GET['str']; ?>">
                </div>

                <div class="col-2">
                    <button type="submit" class="btn btn-info">pokaż</button>
                </div>
            </div>
        </form>


        <div class="table-responsive mt-3">
            <table id="rows" class="table align-middle mb-0">
                <thead class="table-secondary">
                <tr>
                    <th>Id</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#rows').DataTable({
                searching: false,
                lengthChange: false
            });
        });
    </script>
@endsection
