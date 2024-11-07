<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Layout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        h2{
            text-align: center;
            color: #45a049;
        }
        .error{
            color: red;
            font-weight: bolder;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form action="{{route('category.create')}}" method="POST">
        @csrf
        <h2>Create Category</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            @error('name')
                <span class="error">{{$message}}</span>
            @enderror

        </div>

        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="describe"></textarea>
            @error('describe')
                <span class="error">{{$message}}</span>
            @enderror

        </div>
        <button type="submit">Create</button>
    </form>
</div>

</body>
</html>
