<?php 

include "templates/header.php";
include "../data/Database.php";
include "../models/Post.php";

if (isset($_POST['title'])) {

    try {

        $database = new Database();

        $post = new Post(array(

            "title" => $_POST['title'], 
            
            "content" => $_POST['content']

        ));

        $database->create($post);

    } catch (PDOException $error) {

        echo "Error " . $error;

    }

}

?>
<div class="container">
    <h2> Submit A New Blog Entry!</h2>
</div>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Blog Post Title...">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<?php include "templates/footer.php"; ?>