<?php
    include('config.php');
    include('const/check.php');
    include('functions.php');

    $bookid = $_POST['bookid'];
    $query = "SELECT * FROM books WHERE bookid='$bookid'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
?>
<div class="modal-header">
    <h4 class="modal-title"><strong><?php echo $row['bookName']; ?></strong></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-3">
            <i class="fas fa-lg fa-user text-muted"></i>&nbsp;&nbsp;<?php echo $row['bookAuthor']; ?>
        </div>
        <div class="col-lg-4 col-sm-6 mb-3">
            <i class="fas fa-lg fa-star text-muted"></i>&nbsp;&nbsp;<?php echo $row['bookRating']."/5"; ?>
        </div>
        <div class="col-lg-4 col-sm-6 mb-3">
            <i class="fas fa-lg fa-list text-muted"></i>&nbsp;&nbsp;<?php echo $row['bookGenre']; ?>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo $row['bookAbout']; ?>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>