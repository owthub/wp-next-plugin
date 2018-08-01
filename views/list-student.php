<?php
global $wpdb;
$all_students = $wpdb->get_results(
        $wpdb->prepare(
                "SELECT * from wp_next_plugin_tbl", ""
        ), ARRAY_A
);

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";
if (!empty($action) && $action == "delete") {

    $row_exists = $wpdb->get_row(
            $wpdb->prepare(
                    "SELECT * from wp_next_plugin_tbl WHERE id = %d", $id
            )
    );
    if (count($row_exists) > 0) {
        $wpdb->delete("wp_next_plugin_tbl", array(
            "id" => $id
        ));
    }
    ?>
    <script>
        location.href = "<?php echo site_url() ?>/wp-admin/admin.php?page=wp-next-plugin";
    </script>
    <?php
}

if (count($all_students) > 0) {
    ?>
    <table cellpadding="10" border="1">
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $count = 1;
        foreach ($all_students as $index => $student) {
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $student['name'] ?></td>
                <td><?php echo $student['email'] ?></td>
                <td>
                    <a href="admin.php?page=wp-next-add&action=edit&id=<?php echo $student['id']; ?>">Edit</a> 
                    <a href="admin.php?page=wp-next-plugin&id=<?php echo $student['id']; ?>&action=delete" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php
}
?>