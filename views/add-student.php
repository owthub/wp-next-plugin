<?php
global $wpdb;
$msg = '';

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";

$row_details = $wpdb->get_row(
        $wpdb->prepare(
                "SELECT * from wp_next_plugin_tbl WHERE id = %d", $id
        ), ARRAY_A
);


if (isset($_POST['btnsubmit'])) {

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";
    $id = isset($_GET['id']) ? intval($_GET['id']) : "";

    if (!empty($action)) {

        $wpdb->update("wp_next_plugin_tbl", array(
            "name" => $_POST['txtname'],
            "email" => $_POST['txtemail']
                ), array(
            "id" => $id
        ));

        $msg = "Form data updated successfully";
    } else {

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
}
?>

<p><?php echo $msg; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=wp-next-add<?php
if (!empty($action)) {
    echo '&action=edit&id=' . $id;
}
?>" method="post">
    <p>
        <label>
            Name
        </label>
        <input type="text" name="txtname" value="<?php echo isset($row_details['name']) ? $row_details['name'] : ""; ?>" placeholder="Enter name"/>
    </p>
    <p>
        <label>
            Email
        </label>
        <input type="email" name="txtemail" value="<?php echo isset($row_details['email']) ? $row_details['email'] : ""; ?>" placeholder="Enter email"/>
    </p>
    <p>
        <button type="submit" name="btnsubmit">Submit</button>
    </p>
</form>