<?php
include './model/postModel.php';

addComment();
header('location:show_post.php?id_post='.$postId);







