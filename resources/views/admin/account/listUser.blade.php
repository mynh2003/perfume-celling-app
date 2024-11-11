@extends('admin.layouts.app')

@section('admin-content')

<div class="container-fluid px-4">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="overflow-hidden card table-nowrap table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Users</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample static data row -->
                                <tr>
                                    <td>John Doe</td>
                                    <td>johndoe@example.com</td>
                                    <td>123-456-7890</td>
                                    <td>
                                        <p class="status" style="padding: 5px; color: #fff; background-color: green">Hoạt động</p>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#!" class="dropdown-item" onclick="showInput(this, 1)">View Details</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="inputRow-1" style="display:none;">
                                    <td colspan="3">
                                        <form>
                                            <span style="float: left; margin: 8px">Trạng thái</span>
                                            <select name="select" id="select" style="float: left; margin: 8px">
                                                <option value="0" selected>Hoạt động</option>
                                                <option value="1">Ngưng hoạt động</option>
                                            </select>
                                            <button class="btn btn-secondary btn-sm mt-2" onclick="hideInput(1)" style="float: left; margin-right: 8px">Hide</button>
                                            <button class="btn btn-secondary btn-sm mt-2" style="float: left;">Save</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <script>
                            function showInput(button, id) {
                                var inputRow = document.getElementById('inputRow-' + id);
                                inputRow.style.display = 'table-row';
                                var allInputRows = document.querySelectorAll('[id^="inputRow-"]');
                                allInputRows.forEach(function(row) {
                                    if (row.id !== 'inputRow-' + id) {
                                        row.style.display = 'none';
                                    }
                                });
                            }

                            function hideInput(id) {
                                var inputRow = document.getElementById('inputRow-' + id);
                                inputRow.style.display = 'none';
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection