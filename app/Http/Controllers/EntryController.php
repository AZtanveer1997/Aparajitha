<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $entries = Entry::with('user')->paginate(10); // Admin sees all entries
        } else {
            $entries = Auth::user()->entries()->paginate(10); // Accountant sees their own entries
        }
        return view('entries.index', compact('entries'));
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric'
        ]);

        Entry::create([
            'item' => $request->item,
            'type' => $request->type,
            'amount' => $request->amount,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('entries.index')->with('success', 'Entry created successfully.');
    }

    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric'
        ]);

        $entry->update($request->all());
        return redirect()->route('entries.index')->with('success', 'Entry updated successfully.');
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entries.index')->with('success', 'Entry deleted successfully.');
    }
}
