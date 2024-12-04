<h1>Danh sách tin tức</h1>
<a href="index.php?url=admin/addNews">Thêm tin tức</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Danh mục</th>
        <th>Hình ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($newsList as $news): ?>
        <tr>
            <td><?php echo $news['id']; ?></td>
            <td><?php echo $news['title']; ?></td>
            <td><?php echo $news['category_name']; ?></td>
            <td><img src="<?php echo $news['image']; ?>" width="100"></td>
            <td>
                <a href="index.php?url=admin/editNews&id=<?php echo $news['id']; ?>">Sửa</a> |
                <a href="index.php?url=admin/deleteNews&id=<?php echo $news['id']; ?>" onclick="return confirm('Xóa tin này?');">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
