@extends('layouts.app')

@section('title', 'Courses Management')

@section('styles')
<style>
    .main-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-bottom: 2px solid #eee;
        padding-bottom: 15px;
    }
    .title {
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }
    .add-btn {
        background: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 500;
    }
    .add-btn:hover {
        background: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th {
        background: #f8f9fa;
        padding: 12px;
        text-align: left;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }
    td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
    }
    tr:hover {
        background: #f8f9fa;
    }
    .action-buttons {
        display: flex;
        gap: 8px;
    }
    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        font-size: 12px;
        cursor: pointer;
    }
    .btn-view {
        background: #17a2b8;
        color: white;
    }
    .btn-edit {
        background: #ffc107;
        color: #212529;
    }
    .btn-delete {
        background: #dc3545;
        color: white;
    }
    .btn:hover {
        opacity: 0.8;
    }
    .description {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .professor {
        font-size: 12px;
        color: #6c757d;
    }
</style>
@endsection

@section('content')
<div class="main-container">
    <div class="header">
        <h1 class="title">Courses Management</h1>
        <a href="{{ route('courses.create') }}" class="add-btn">Add New Course</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Professor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td class="description">{{ $course->description }}</td>
                <td>
                    @if($course->professor)
                        <span class="professor">{{ $course->professor->name }}</span>
                    @else
                        <span class="professor">No professor assigned</span>
                    @endif
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-view">View</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
