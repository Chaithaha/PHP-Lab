<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .main-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
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
        .btn-back {
            background: #6c757d;
            color: white;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h1 class="title">Student Details</h1>
        
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
        </div>
        
        <div class="button-group">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">Edit Student</a>
            <a href="{{ route('students.index') }}" class="btn btn-back">Back to List</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete Student</button>
            </form>
        </div>
    </div>
</body>
</html>
