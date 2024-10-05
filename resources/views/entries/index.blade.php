@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Entries</h2>
    <a href="{{ route('entries.create') }}" class="btn btn-success">Add Entry</a>
    <table class="table">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Item</th>
                <th>Type</th>
                <th>Amount</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $entry->item }}</td>
                    <td>{{ ucfirst($entry->type) }}</td>
                    <td>{{ $entry->amount }}</td>
                    <td>{{ $entry->user->name }}</td>
                    <td>
                        <a href="{{ route('entries.edit', $entry->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('entries.destroy', $entry->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $entries->links() }}
</div>
@endsection
