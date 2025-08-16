@extends('layouts.app')

@section('title', 'Edit Student')

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
    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }
    .course-selection {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 15px;
        max-height: 200px;
        overflow-y: auto;
    }
    .course-item {
        margin-bottom: 10px;
    }
    .course-item label {
        display: flex;
        align-items: center;
        font-weight: normal;
        cursor: pointer;
    }
    .course-item input[type="checkbox"] {
        margin-right: 10px;
        width: auto;
    }
    .error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }
    .submit-btn {
        background: #007bff;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        font-weight: 500;
    }
    .submit-btn:hover {
        background: #0056b3;
    }
</style>
@endsection

@section('content')
<div class="main-container">
    <div class="header">
        <h1 class="title">Edit Student</h1>
        <a href="{{ route('students.index') }}" class="back-btn">Back to Students</a>
    </div>
    
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="{{ old('fname', $student->fname) }}" required>
            @error('fname')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="{{ old('lname', $student->lname) }}" required>
            @error('lname')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Select Courses:</label>
            <div class="course-selection">
                @foreach($courses as $course)
                <div class="course-item">
                    <label>
                        <input type="checkbox" name="course_ids[]" value="{{ $course->id }}" 
                               {{ in_array($course->id, old('course_ids', $student->courses->pluck('id')->toArray())) ? 'checked' : '' }}>
                        {{ $course->name }} (Prof. {{ $course->professor->name }})
                    </label>
                </div>
                @endforeach
            </div>
            @error('course_ids')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="submit-btn">Update Student</button>
    </form>
</div>
@endsection
