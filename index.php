<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) {
        die("Database connection failed");
    }
    include "process_skills.php";
    $sql = "select * from skills order by skill_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <div class="container">
        <h1>Register Your Skills</h1>
        <form class="form1" action="" method="post">
            <?php if (!empty($succ_msg)) { ?>
                <div class="alert alert-success"><?= $succ_msg ?></div>
            <?php  }
            if (!empty($err_msg)) { ?>
                <div class="alert alert-danger"><?= $err_msg ?></div>
            <?php  }
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="Enter Your Name"
                    value="<?= $name ?>" />
                <div class="text-danger"><?= $name_err ?></div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Enter Your Email"
                    value="<?= $email ?>" />
                <div class="text-danger"><?= $email_err ?></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Select one or more skill(s)<small> (Press and hold Ctrl key to select multiple)</small></label>
                <select
                    multiple
                    class="form-select"
                    name="skill[]"
                    id="skill">
                    <?php foreach ($result as $row) { ?>
                        <option value="<?= $row['id'] ?>" <?php if (in_array($row['id'], $skill)) echo "selected" ?>><?= $row['skill_name'] ?></option>
                    <?php } ?>
                </select>
                <div class="text-danger"><?= $skill_err ?></div>
            </div>
            <button
                type="submit"
                class="btn btn-primary"
                name="submit">
                Submit
            </button>

        </form>
    </div>
</body>

</html>