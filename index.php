<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create PDF Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover,
        button[type="submit"]:hover {
            background-color: #45a049;
        }

        button[type="submit"] {
            margin-top: 10px;
            background-color: #2196F3;
        }

        button[type="submit"]:hover {
            background-color: #0b7dda;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">

        <label for="content">Content:</label>
        <textarea name="content" id="content" cols="50" rows="10"></textarea>
        <label for="img">Image:</label>
        <input type="file" id="img" name="img">

        <br>
        <button name="send" type="submit">Create PDF</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['send'])){
    session_start();

    // Sanitize and validate the input
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
    $img = $_POST['img'];

    // Store the sanitized data in the session variable
    $_SESSION['html'] = <<<html
    <img src="$img">
    <h1>$title</h1>
    <p>$content</p>
    html;
    header('location: pdf.php',true);
    exit();
}

 ?>
