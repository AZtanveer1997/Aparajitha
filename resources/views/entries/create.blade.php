@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Entry</h2>
    <form action="{{ route('entries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <input type="text" name="item" id="item" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
