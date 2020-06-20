<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        label.error{
            color: red;
        }
    </style>

<?php

global $wpdb;

// Insert Data
// $wpdb->insert(
//     "ih_custom_table",
//     array(
//         'name'    => 'Injamamul Haque',
//         'email'   => 'injam.cse@gmail.com',
//         'address' => 'F-Block, New Market, Jessore-7400.',
//     ),
// );

// Update Data
// $wpdb->update(
//     "ih_custom_table",
//     array(
//         'name'    => 'Joti Sarkar',
//         'email'   => 'joti@gmail.com',
//         'address' => 'Deyana, Daulatpur, Khulna-9000.',
//     ),
//     array(
//         'id' => 1,
//     ),
// );

// Delete Data
$wpdb->delete(
    "ih_custom_table",
    array(
        'id' => 3,
    ),
);

?>
</head>
<body>

<div class="conatiner pt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="" id="post-post">
                <div class="form-group">
                    <label for="name">Enter Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Enter Email:</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary clickbtn">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>

</script>
</html>