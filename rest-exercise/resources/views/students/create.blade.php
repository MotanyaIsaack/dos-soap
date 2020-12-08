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
        <div class="col-md-6 col-lg-6 bg-light p-3">
        <form method="POST" action='{{ route('students.store')}}'>
            {{ csrf_field() }}
                <p class="lead">Student Registration</p>
                <div class="form-group">
                    <input name='student_id' type="text" class="form-control" id="student_id" placeholder="Student ID" style="border-radius:0">

                </div>
                <div class="form-group">
                    <input name='full_name' type="text" class="form-control" id="full_name" placeholder="Full name" style="border-radius:0">

                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" style="border-radius:0" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <input name="phone" type="number" class="form-control" id="phone" style="border-radius:0" placeholder="Phone">

                </div>
                <div class="form-group">
                    <input name="address" type="text" class="form-control" id="address" style="border-radius:0" placeholder="Address">

                </div>

                <div class="form-group">
                    <input name="entry_points" type="text" class="form-control" id="entry_points" style="border-radius:0" placeholder="Entry Point">

                </div>
                <div class="form-group">
                    <select class="form-control" name="course_id" id="course_id">
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary shadow" style="border-radius:0">Register</button>
            </form>
        </div>
    </div>
     <div class="row justify-content-center mt-2">
        <div class="col-md-12 bg-light p-3">
            <table class="table">
                <p class="lead">View Students Table</p>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Entry Point</th>
                        <th scope="col">Course</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->full_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->entry_points}}</td>
                            <td>{{$student->course->name}}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id)}}" method="post">
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
