<select class="select" id="assignto">
<?php foreach($users as $user): ?>
    <option value=""><?= $user['firstname'] . " " . $user['lastname'] ?></option>
<?php endforeach; ?>
</select>