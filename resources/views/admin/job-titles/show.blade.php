@extends("admin.layouts.master")
@section("title", "All job titles")
@section('css')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')
<div class="mt-3 mb-2">
    @if(session()->has('success'))
    <div class="container alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
</div>
<h1 class="text-center text-secondary mt-4">All Job Titles</h1>
<div class="container">
    <a class="btn btn-primary" href="{{route('job-titles.create')}}">Add job title</a>
</div>
<div class="data-table-responsiv ">
    <div class="container mb-5 mt-3">
        <table id="table1" class="table table-bordered text-center table-hover">
            <thead class="bg-secondary">
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">industry_category_id</th>
                    <th scope="col"> Edit</th>
                    <th scope="col"> Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobtitles as $job)
                <tr>
                    <td>{{$job['title'] }}</td>
                    <td>{{$job->industryCategory->name}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('job-titles.edit',$job)}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('job-titles.destroy',$job)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
@endsection
