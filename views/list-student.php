<?php
global $wpdb;
$all_students = $wpdb->get_results(
        $wpdb->prepare(
                "SELECT * from wp_next_plugin_tbl", ""
        ), ARRAY_A
);
if (count($all_students) > 0) {
    ?>
    <table cellpadding="10" border="1">
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
        $count = 1;
        foreach ($all_students as $index => $student) {
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $student['name'] ?></td>
                <td><?php echo $student['email'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php
}
?>