@extends('admin.layouts.layouts')
@section('admin_page_title')
Edit Category - Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Category</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())

                <div class="text-danger fw-bold text-capitalize">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                
                @endif
                @if (session('message'))
                <div class="text-success text-bold">
                    {{session('message')}}
                </div>
                @endif
                <form action="{{route('update.cat', $category_info->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="category_name" class="fw-bold mb-1">Category Name</label>
                    <input type="text" class="form-control mt-1" name="category_name" placeholder="Computer" value="{{$category_info->category_name}}">

                    <button type="submit" class="btn btn-primary mt-2">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection