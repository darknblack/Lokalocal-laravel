@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="title" placeholder="Enter the title here">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="originalprice" class="col-sm-2 col-form-label">Original Price</label>
                        <div class="col-sm-4">
                          <input type="number" name="originalprice" class="form-control" id="originalprice" placeholder="Original price here">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="discountedprice" class="col-sm-2 col-form-label">New Price</label>
                        <div class="col-sm-4">
                          <input type="number" name="discountedprice" class="form-control" id="discountedprice" placeholder="New price here">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bean" class="col-sm-2 col-form-label">Grams of bean</label>
                        <div class="col-sm-4">
                          <input type="number" name="bean" class="form-control" id="bean" placeholder="Enter the grams of need bean to create the coffee">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                          <input type="text" name="category" class="form-control" id="category" placeholder="Enter the category here">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Add Images</label>
                        <div class="col-sm-10">
                          <input type="file" name="file" id="file" multiple accept='image/*'>
                        </div>
                      </div>
                      <div class="form-group row">
                         <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-block">Post</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
