@extends('base')

@section('main')
    @if ($errors->any())
    <div class="message alert alert-danger fade in alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
        <strong>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </strong>.
    </div> <br>
    @endif
    @if (session()->has('success'))
    <div class="message alert alert-success fade in alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
        <strong>
            {{ session()->get('success') }}
        </strong>.
    </div> <br>
    @endif
    <div class="row justify-content-center mt-2">
        <div class="col-md-6 bg-light p-3">
            <form method="POST" action='{{ route('courses.store')}}'>
                {{ csrf_field() }}
                <p class="lead">Course Registration Form</p>
                <div class="form-group">
                    <input name='name' type="text" class="form-control" id="name" placeholder="Course name" style="border-radius:0">
                </div>
                <button type="submit" class="btn btn-primary shadow" style="border-radius:0">Add Course</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-6 bg-light p-3">
            <table class="table">
                <p class="lead">View Courses Table</p>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{$course->id}}</th>
                            <td>{{$course->name}}</td>
                            <td>
                                <form action="{{ route('courses.destroy', $course->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
