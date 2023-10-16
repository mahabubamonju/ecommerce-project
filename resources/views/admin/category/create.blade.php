@extends('admin.master')

@section('title')
Add Category
@endsection

@section('body')
<div class="row">
    <div class="col">
       <div class="card">
           <div class="card-header">Add Category Form</div>
           <div class="card-body">
               <p class="text-center text-danger">{{session('message')}}</p>
               <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="row mb-3">
                       <label class="col-md-3">Category Name</label>
                       <div class="col-md-9">
                           <input type="text" name="name" class="form-control"/>
                       </div>
                   </div>
                   <div class="row mb-3">
                       <label class="col-md-3">Category Description</label>
                       <div class="col-md-9">
                           <textarea name="description" class="form-control"></textarea>
                       </div>
                   </div>
                   <div class="row mb-3">
                       <label class="col-md-3">Category Image</label>
                       <div class="col-md-9">
                           <input type="file" name="image" class="form-control-file"/>
                       </div>
                   </div>
                   <div class="row mb-3">
                       <label class="col-md-3">Publication Status</label>
                       <div class="col-md-9">
                           <label><input type="radio" checked name="status" value="1"/> Published</label>
                           <label><input type="radio" name="status" value="0"/> Unpublished</label>
                       </div>
                   </div>
                   <div class="row mb-3">
                       <label class="col-md-3"></label>
                       <div class="col-md-9">
                           <input type="submit" class="btn btn-success" value="Create New Category"/>
                       </div>
                   </div>
               </form>
           </div>
       </div>
    </div>
</div>

@endsection
