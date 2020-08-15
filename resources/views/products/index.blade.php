<div class="container">
    <form action="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th style="text-align: center"><a href="#" class="btn btn-info addRow text-white font-weight-bold">+</a></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><input type="file" name="image[]" class="form-control-file"></td>
                    <td><input type="text" name="quantity[]" class="form-control"></td>
                    <td style="text-align: center"><a href="#" class="btn btn-danger removeRow text-white font-weight-bold">-</a></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
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
                            '<td style="text-align: center"><a href="#" class="btn btn-danger removeRow text-white font-weight-bold">-</a></td>'+
                        '</tr>';
                $('tbody').append(tr);
            }
        </script>
    </form>
</div>
