@extends('layouts.app')

@section('title', 'Course Details')

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
    .back-btn {
        background: #6c757d;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 500;
    }
    .back-btn:hover {
        background: #545b62;
    }
    .course-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .info-row {
        display: flex;
        margin-bottom: 15px;
    }
    .info-label {
        font-weight: 600;
        color: #495057;
        width: 120px;
        flex-shrink: 0;
    }
    .info-value {
        color: #333;
        flex: 1;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    .btn {
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        font-size: 14px;
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
</style>
@endsection

@section('content')
<div class="main-container">
    <div class="header">
        <h1 class="title">Course Details</h1>
        <a href="{{ route('courses.index') }}" class="back-btn">Back to Courses</a>
    </div>

    <div class="course-info">
        <div class="info-row">
            <div class="info-label">ID:</div>
            <div class="info-value">{{ $course->id }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Name:</div>
            <div class="info-value">{{ $course->name }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Description:</div>
            <div class="info-value">{{ $course->description }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Created:</div>
            <div class="info-value">{{ $course->created_at->format('F j, Y g:i A') }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Updated:</div>
            <div class="info-value">{{ $course->updated_at->format('F j, Y g:i A') }}</div>
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-edit">Edit Course</a>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this course?')">Delete Course</button>
        </form>
    </div>
</div>
@endsection
