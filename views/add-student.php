<?php
global $wpdb;
$msg = '';
if (isset($_POST['btnsubmit'])) {
    $wpdb->insert("wp_next_plugin_tbl", array(
        "name" => $_POST['txtname'],
        "email" => $_POST['txtemail']
    ));

    if ($wpdb->insert_id > 0) {
        $msg = "Form data saved successfully";
    } else {
        $msg = "Failed to save data";
    }
}
?>

<p><?php echo $msg; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=wp-next-add" method="post">
    <p>
        <label>
            Name
        </label>
        <input type="text" name="txtname" placeholder="Enter name"/>
    </p>
    <p>
        <label>
            Email
        </label>
        <input type="email" name="txtemail" placeholder="Enter email"/>
    </p>
    <p>
        <button type="submit" name="btnsubmit">Submit</button>
    </p>
</form>