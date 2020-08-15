@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @guest
                @include('auth.register')
            @endguest

            @auth
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th style="text-align: center"><a href="#" class="btn btn-info addRow">+</a></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="file" name="image[]" class="form-control-file"></td>
                            <td><input type="text" name="quantity[]" class="form-control"></td>
                            <td style="text-align: center"><a href="#" class="btn btn-danger removeRow">-</a></td>
                        </tr>
                    </tbody>
                </table>
                <script type="text/javascript">
                    $('.addRow').on('click', function() {
                        addRow();
                    });

                    $('tbody').on('click', '.removeRow', function() {
                        $(this).parent().parent().remove();
                    });

                    function addRow() {
                        var tr = '<tr>'+
                                    '<td><input type="file" name="image[]" class="form-control-file"></td>'+
                                    '<td><input type="text" name="quantity[]" class="form-control"></td>'+
                                    '<td style="text-align: center"><a href="#" class="btn btn-danger removeRow">-</a></td>'+
                                '</tr>';
                        $('tbody').append(tr);
                    }
                </script>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
