@extends('layouts.app')

@section('content')
    <h1>Proponents List</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proponents as $proponent)
                <tr>
                    <td>{{ $proponent->title }}</td>
                    <td>{{ $proponent->content }}</td>
                    <td>{{ $proponent->status }}</td>
                    <td>
                        <a href="{{ route('proponents.show', $proponent->id) }}">View</a>
                        <a href="{{ route('proponents.edit', $proponent->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
