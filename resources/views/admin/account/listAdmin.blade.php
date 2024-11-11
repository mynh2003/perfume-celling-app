
@extends('admin.layouts.app')

@section('admin-content')


<div class="container-fluid px-4">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="overflow-hidden card table-nowrap table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Admin</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Acc</th>
                                    <th>Name</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <!-- Sample static data row -->
                            <tr>
                                <td>Admin1</td>
                                <td>John Doe</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" onclick="return confirm('Are you sure?')" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Repeat similar rows as needed -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection