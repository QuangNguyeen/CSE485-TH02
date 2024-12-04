<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Tin tức</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: blue;
    color: #333;
    display: flex;
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center; /* Căn giữa theo chiều dọc */
    height: 100vh; /* Chiều cao toàn màn hình */
    border: 1px solid black;
}

/* Container của form */

form {
    background: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 400px;
    box-sizing: border-box;

}

/* Tiêu đề */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4a90e2;
}

/* Nhãn */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

/* Input và Textarea */
input[type="text"],
input[type="file"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
    background: #f9f9f9;
}

textarea {
    resize: none;
    height: 100px;
}

/* Button */
button {
    width: 100%;
    padding: 10px 15px;
    background: #4a90e2;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: #357abd;
}
    </style>
</head>

<body>

    <form method="POST" action="../../../index.php?action=create" enctype="multipart/form-data">
    <h1>Thêm Tin tức</h1>  
    <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Nội dung:</label>
        <textarea name="content" required></textarea>
        <br>
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" required>
        <br>
        <label for="category_id">ID Danh mục:</label>
        <input type="number" name="category_id" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
