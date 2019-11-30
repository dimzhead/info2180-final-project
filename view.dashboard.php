<?php if (sizeof($rows) > 0) : ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= "#" . $row['id'] . " " . $row['title']; ?></td>
                    <td><?= $row['type']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['assigned_to']; ?></td>
                    <td><?= $row['created']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else :
    echo "No issues";
endif;
