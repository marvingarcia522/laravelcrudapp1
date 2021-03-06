@extends('layout.app')


@section('content')


    
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
                <h2>List of Accomplishments</h2>
            </div>
            <div class="pull-right mt-5" id="non-printable" >
                
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Add a Reoort"> <i class="fas fa-plus-square"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover mt-1.5" >
            <thead class="thead-dark"style="text-align:center">

    <div class="row" >
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col" >Accomplishment</th>
            <th colspan="4" scope="colgroup">Rating</th>
            <th scope="col">Remarks</th>
            <th scope="col">Date</th>
            <th scope="col" width="120px">Action</th>

        </tr>
        <tr>
            <th rowspan="2"></th>
            <th rowspan="2"></th>
            <th rowspan="2"></th>
                <th scope="col">Q1</th>
                <th scope="col">E2</th>
                <th scope="col" >T3</th>
                <th scope="col">A4</th>
                <th rowspan="2"></th>
            <th rowspan="2"></th>
            <th rowspan="2"></th>
           
        </tr>
        <tbody>
        @foreach ($projects as $project)
            <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->accomplishment }}</td>
            <td>{{ $project->rating}}</td>
            <td>{{ $project->rating}}</td>
            <td>{{ $project->rating}}</td>
            <td>{{ $project->rating}}</td>
            <td> {{ $project->remarks }}</td>
            <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
            <td>
                    <form  action="{{ route('projects.destroy', $project->id) }}" style="display: inline" method="POST" onsubmit="return confirm('Are you sure to delete this item?')">

                        <a href="{{ route('projects.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('projects.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
            
        </tbody>
        @endforeach
        </table>
        <div id="non-printable" ><button onClick="window.print()">Print this page  <i class="fa fa-print" aria-hidden="true"></i></button></div>


    {!! $projects->links() !!}

@endsection
