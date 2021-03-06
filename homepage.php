<?php
include('./common/Header.php');
include('./classes/Blogs.php');
include('./classes/Users.php');
$current_username = $_SESSION['username'];
$blogs = new AllBlogs($conn);
$user = new Users($conn, $current_username);
$rec = $blogs->displayPosts();
?>

<body>

    <h3 style="font-size: 20px;" class="center">YOUR HOMEPAGE - <?php echo $user->name(); ?></h3>

    <div class="allBlogs row">
        <?php if ($rec) : ?>
            <?php foreach ($rec as $item) : ?>
                <div style="padding: 20px;" class="col l6 s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><?php echo $item['title'] ?></span>
                            <p><?php echo $item['body'] ?></p>
                        </div>
                        <div class="card-action">
                            <span class='white-text'>Author : </span><a href="otherProfile.php?q=<?php echo $item['username'] ?>"><?php echo $item['first_name'] . ' ' . $item['last_name'] ?></a>
                            <p class='white-text'>Date Posted : <?php echo $item['date_created'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php else:  ?>
                <div class="container">
                    <p>NO BLOGS HAVE BEEN POSTED YET</p>
                </div>
        <?php endif ?>
    </div>


</body>

<?php
include('./common/Footer.php')
?>