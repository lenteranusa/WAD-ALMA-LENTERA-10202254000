@extends('layouts.app')
@section('title', 'Machinery & Equipment Module')

@section('content')
<h1>Machinery &amp; Equipment Module</h1>

@if (auth()->user()->hasRole('admin'))
<div class="card">
    <h2>Add machine</h2>
    <form method="POST" action="{{ route('machines.store') }}" class="add-form">
        @csrf
        <select name="machinetype" required>
            <option value="Washer">Washer</option>
            <option value="Dryer">Dryer</option>
        </select>
        <input type="text" name="brand" placeholder="Brand" required>
        <input type="number" name="capacity" placeholder="Capacity (kg)" required>
        <select name="status">
            <option value="1">Operational</option>
            <option value="0">Not Operational</option>
        </select>
        <button type="submit">Add</button>
    </form>
    @if ($errors->any())
        <p style="color:#A0333F">{{ $errors->first() }}</p>
    @endif
</div>
@endif

<div class="card">
    <table>
        <tr>
            <th>Machine</th><th>Brand</th><th>Capacity</th><th>Status</th>
            @if (auth()->user()->hasRole('admin')) <th>Delete</th> @endif
        </tr>
        @forelse ($machines as $m)
        <tr>
            <td>{{ $m->machinetype }}</td>
            <td>{{ $m->brand }}</td>
            <td>{{ $m->capacity }} kg</td>
            <td>
                <form method="POST" action="{{ route('machines.update', $m) }}" style="display:flex;gap:6px;">
                    @csrf
                    @method('PUT')
                    <select name="status">
                        <option value="1" @selected($m->status == 1)>Operational</option>
                        <option value="0" @selected($m->status == 0)>Not Operational</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
            @if (auth()->user()->hasRole('admin'))
            <td>
                <form method="POST" action="{{ route('machines.destroy', $m) }}"
                      onsubmit="return confirm('Delete this machine?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
            @endif
        </tr>
        @empty
        <tr><td colspan="5">No machines yet.</td></tr>
        @endforelse
    </table>
</div>
@endsection