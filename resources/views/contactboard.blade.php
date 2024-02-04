@extends("layouts.master")
@section("contenu")
    <style>
    .w-5{display: none}
    </style>
  
<div class="row p-4 pt-5">
    <div class="col-12">
   
    <div class="col-md-6">
        
        {{--<div class="col-lg-12 margin-tb">--}}
            <div class="pull-left">
                <h2>Gestion des Messages</h2>
            </div>
    </div>    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>SUBJECT</th>
            <th>MASSAGE</th>
            <th>CREATION </th>
            <th width="280px">ACTIONS</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject}}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <a class="btn  btn-primary btn-sm" href="{{ route('contacts.show', $contact->id) }}">Show</a>
                    {{--<a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Modifier</a>--}}
                {{-- @endcan--}}
                    {{--@can('role-delete')--}}
                        {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn  btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    {{--@endcan--}}
                </td>
            </tr>
          @endforeach
          
    </table>
           
        <div class="float-left p-4 pt-5">
                        {{$contacts->links()}}
        </div>
    </div>
  </div>

@endsection