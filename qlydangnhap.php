<?php 
    include('header.php');
?>

<div class="container">
    <h1>Post Manage</h1>
    <p>
        <a href="add_post.php" class="btn btn-success">Add a new post</a>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                getAllPosts();
            ?>
        </tbody>
    </table>
</div>

<?php 
    include('footer.php');
?>