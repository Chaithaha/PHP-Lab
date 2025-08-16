@extends('layouts.app')

@section('title', 'Student Details')

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
    .detail-card {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 25px;
    }
    .detail-row {
        margin-bottom: 15px;
    }
    .detail-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 5px;
        font-size: 14px;
    }
    .detail-value {
        background: white;
        padding: 8px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        color: #333;
    }
    .courses-section {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #dee2e6;
    }
    .course-item {
        background: #e9ecef;
        padding: 8px 12px;
        border-radius: 4px;
        margin: 5px 0;
        border-left: 3px solid #007bff;
    }
    .course-name {
        font-weight: 600;
        color: #495057;
    }
    .professor-name {
        color: #6c757d;
        font-size: 12px;
    }
    .button-group {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
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
        <h1 class="title">Student Details</h1>
        <a href="{{ route('students.index') }}" class="back-btn">Back to Students</a>
    </div>
    
    <div class="detail-card">
        <div class="detail-row">
            <div class="detail-label">ID:</div>
            <div class="detail-value">{{ $student->id }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">First Name:</div>
            <div class="detail-value">{{ $student->fname }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Last Name:</div>
            <div class="detail-value">{{ $student->lname }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Email:</div>
            <div class="detail-value">{{ $student->email }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Created At:</div>
            <div class="detail-value">{{ $student->created_at }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Updated At:</div>
            <div class="detail-value">{{ $student->updated_at }}</div>
        </div>

        <div class="courses-section">
            <div class="detail-label">Enrolled Courses:</div>
            @if($student->courses->count() > 0)
                @foreach($student->courses as $course)
                    <div class="course-item">
                        <div class="course-name">{{ $course->name }}</div>
                        @if($course->professor)
                            <div class="professor-name">Prof. {{ $course->professor->name }}</div>
                        @else
                            <div class="professor-name">No professor assigned</div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="detail-value" style="color: #dc3545; font-style: italic;">No courses enrolled</div>
            @endif
        </div>
    </div>
    
    <div class="button-group">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">Edit Student</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete Student</button>
        </form>
    </div>
</div>
@endsection
