@extends('admin.layouts.layouts')
@section('admin_page_title')
    Manage Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Category</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="fw-bold">
                                    <th>S.N.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($categories as $cat)
                                        <tr>
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->category_name}}</td>
                                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection