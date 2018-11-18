@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Bean</th>
                      <th>Original price / New price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $e)
                    <tr>
                        <td style="width: 350px"><img src="{{$e['imageurl']}}" style="height: 40px; width: 40px; margin-right: 10px;" alt="">{{ $e['title']}}</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus a libero adipisci deleniti enim veritatis, quaerat distinctio eos aspernatur quibusdam laboriosam eum itaque, commodi id nesciunt eligendi debitis. Nesciunt, voluptatum.</td>
                        <td>{{ $e['category'] }}</td>
                        <td>{{ $e['bean'] }} grams</td>
                        <td style="width: 150px; text-align: center">{!! $e['originalprice'] !!} / {!! $e['discountedprice'] !!}</td>
                        <td style="width: 120px">View Status</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
