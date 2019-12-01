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
                    <td><?= "#" . $row['Issues.id'] . " " . $row['Issues.title']; ?></td>
                    <td><?= $row['Issues.type']; ?></td>
                    <td><?= $row['Issues.status']; ?></td>
                    <td><?= $row['Users.firstname'] . " " . $row['Users.lastname'] ; ?></td>
                    <td><?= $row['Issues.created']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else :
    echo "No issues";
endif;
