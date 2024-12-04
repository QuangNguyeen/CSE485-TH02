<h1>Thêm tin tức</h1>
<form method="POST">
    <label>Tiêu đề:</label>
    <input type="text" name="title" required>
    <br>
    <label>Nội dung:</label>
    <textarea name="content" required></textarea>
    <br>
    <label>Hình ảnh:</label>
    <input type="text" name="image">
    <br>
    <label>Danh mục:</label>
    <select name="category_id">
        <!-- Lặp qua danh sách danh mục -->
        <option value="1">Thể thao</option>
        <option value="2">Giáo dục</option>
    </select>
    <br>
    <button type="submit">Thêm</button>
</form>
