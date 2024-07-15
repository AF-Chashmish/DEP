<?php
include 'db.php';
session_start();

$sql = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h2>Blog Posts</h2>
    <a href="create_post.php">Create Post</a> | <a href="logout.php">Logout</a>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div>
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['content']; ?></p>
                <p><small>By <?php echo $row['username']; ?> on <?php echo $row['created_at']; ?></small></p>
                <a href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="delete_post.php?id=<?php echo $row['id']; ?>">Delete</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</body>
</html>
