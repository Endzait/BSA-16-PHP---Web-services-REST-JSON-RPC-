@extends('layouts.app');

@section('pagetitle')
    Book list
   @stop

@section('content')
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>User Id</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->genre}}</td>
                    <td>{{$book->user_id}}</td>
                    <td width="380">
                        @can('isAdmin',\App\User::class)
                        <a class="btn btn-small btn-info" href="{{URL::to('book/'.$book->id.'/edit')}}">Edit book</a>



                                    <a class="btn btn-small btn-info" href="{{URL::to('book/'.$book->id.'/get')}}">Get</a>

                                    <a class="btn btn-small btn-info" href="{{URL::to('book/'.$book->id.'/pass/')}}">Pass</a>



                        {!! FORM::open(array('url' => 'book/'.$book->id,'class'=>'pull-right')) !!}
                        {!! FORM::hidden('_method','DELETE') !!}
                        {!! FORM::submit('Delete',array('class'=>'btn btn-warning')) !!}
                        {!! FORM::close() !!}
                            @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
@stop