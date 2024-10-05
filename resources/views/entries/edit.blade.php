@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Entry</h2>
    <form action="{{ route('entries.update', $entry->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <input type="text" name="item" id="item" class="form-control" value="{{ $entry->item }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="income" {{ $entry->type === 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $entry->type === 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $entry->amount }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
