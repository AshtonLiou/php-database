<?php include "./db.php";

    $query = $pdo -> query("SELECT * FROM `db01`");
    $rows = $query -> fetchAll();

?>

<form action="./new.php" method="post">
    <input type="text" name="fname" placeholder="First name">
    <input type="text" name="lname" placeholder="Last name">
    <input type="tel" name="phone" placeholder="Phone">
    <input type="password" name="pw" placeholder="Password">
    <input type="submit" value="Submit">
</form>


<div id="editForm"
    style="display: none; width: 100vw; height: 100vh; background-color: rgba(100, 100, 100, .7); backdrop-filter: blur(10px); position: fixed; justify-content: center; align-items: center; top: 0; left: 0;">
    <form action="./edit.php" method="post">
        <h1 id="editFormH1" class="text-center"></h1>
        <input type="hidden" id="editId" name="editId">
        <input type="text" name="efname" placeholder="First name" value="">
        <input type="text" name="elname" placeholder="Last name" value="">
        <input type="tel" name="ephone" placeholder="Phone" value="">
        <input type="password" name="epw" placeholder="Password" value="">
        <button class="btn btn-success" id="submitEditForm">Edit</button>
    </form>
</div>

<table class="table table-striped" border="5">
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Button</th>
    </tr>
    <?php foreach ($rows as $record){ ?>
    <tr>
        <th>
            <?= $record["id"]; ?>
        </th>
        <td>
            <?= $record["fname"]; ?>
        </td>
        <td>
            <?= $record["lname"]; ?>
        </td>
        <td>
            <?= $record["phone"]; ?>
        </td>
        <td>
            <?= $record["pw"]; ?>
        </td>
        <td>
            <button class="btn btn-warning" onclick="editRecord(<?= $record['id']; ?>)">Edit</button>
            <button class="btn btn-danger" onclick="delRecord(<?= $record['id']; ?>)">Delete</button>
        </td>
    </tr>
    <?php }; ?>
</table>

<script>

    function editRecord(id) {
        $("#editForm").css("display", "flex")
        $("#editId").val(id);
    }

    $("#submitEditForm").click(() => {
        let formData = $("#editForm form").serialize()
        $.ajax({
            url: "./edit.php",
            type: "POST",
            data: formData,
            success: () => {
                location.reload()
            }
        });
    });

    function delRecord(id) {
        $.ajax({
            url: "./del.php",
            type: "POST",
            data: { id: id },
            success: () => {
                location.reload()
            }
        })
    }

</script>

</body>

</html>