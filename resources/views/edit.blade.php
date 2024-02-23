<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Blog Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center; 
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 150px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Your Blog Post</h1>
        <form action="{{route('update',['id' => $data->id])}}" method="POST"> <!-- Replace 'process_post.php' with your form processing script -->
          @csrf 
          @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{$data->title}}" name="title" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
           <input type="text" id="body" value="{{$data->body}}" name="body"  required >
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Update Post</button>
            </div>
        </form>
    </div>
</body>
</html>
