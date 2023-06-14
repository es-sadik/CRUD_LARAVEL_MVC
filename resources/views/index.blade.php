@extends('master')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif



<div class="card">
  <div class="card-header">
    <div class="row">
        <div class="col col-md-6">Student Data</div>
        <div class="col col-md-6">
            <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end fw-bold">Add Student</a>
        </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        @if (count($data) > 0)
            @foreach ($data as $row)
                <tr>
                    <td>
                        <img src="{{ $row->image }}" alt="" width="75">
                    </td>
                    <td>{{ $row->student_name}}</td>
                    <td>{{ $row->student_email}}</td>
                    <td>{{ $row->gender }}</td>
                    <td class="">
                        <form action="{{ route('students.destroy',$row->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('students.show' , $row->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('students.edit' , $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>

                    </td>
                </tr>

            @endforeach

        @else
            <tr>
                <td colspan="5" class="text-center">Not Data Found</td>
            </tr>

        @endif
    </table>
    <div class="d-flex justify-content-center my-4">
        {!!$data->links()!!}
    </div>
  </div>
</div>

@endsection


