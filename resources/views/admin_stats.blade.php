@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
                <div class="card-header">Account</div>
                <div class="card-body">
                    <form method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputPassword1">Vendor Name</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
