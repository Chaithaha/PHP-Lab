@extends('layouts.app')

@section('title', 'Create Course')

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
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #333;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }
    textarea {
        height: 120px;
        resize: vertical;
    }
    .error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }
    .submit-btn {
        background: #28a745;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        font-weight: 500;
    }
    .submit-btn:hover {
        background: #218838;
    }
</style>
@endsection

@section('content')
<div class="main-container">
    <div class="header">
        <h1 class="title">Create New Course</h1>
        <a href="{{ route('courses.index') }}" class="back-btn">Back to Courses</a>
    </div>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Course Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="submit-btn">Create Course</button>
    </form>
</div>
@endsection
