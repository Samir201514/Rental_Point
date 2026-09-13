<?php
session_start();
if (!isset($_SESSION["adminId"])) {
    header("Location: ../login.php");
    exit;
}

require_once "../../models/adminModel.php";
$active = "users";
$users  = getAllUsers();

function initials($name)
{
    $parts   = preg_split('/\s+/', trim($name));
    $letters = array_map(fn($p) => substr($p, 0, 1), array_slice($parts, 0, 2));
    return strtoupper(implode('', $letters));
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rental Point - Admin Users</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="layout">

  <?php include "sidebar.php"; ?>

  <main class="main">
    <div class="main-header">
      <div>
        <h1>Users</h1>
        <p>Manage verified landlords, tenants, and sublet posters.</p>
      </div>
      <input type="text" id="userSearch" class="search-box" placeholder="Search by name or email...">
    </div>

    <?php if (isset($_GET["msg"])): ?>
      <div class="flash flash-success"><?= htmlspecialchars($_GET["msg"]) ?></div>
    <?php elseif (isset($_GET["err"])): ?>
      <div class="flash flash-error"><?= htmlspecialchars($_GET["err"]) ?></div>
    <?php endif; ?>

    <div class="table-wrapper">
      <table id="usersTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $u): ?>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar"><?= htmlspecialchars(initials($u["name"])) ?></div>
                <?= htmlspecialchars($u["name"]) ?>
              </div>
            </td>
            <td><?= htmlspecialchars($u["email"]) ?></td>
            <td><?= htmlspecialchars($u["role"]) ?></td>
            <td><span class="badge badge-<?= strtolower($u["status"]) ?>"><?= htmlspecialchars($u["status"]) ?></span></td>
            <td>
              <form method="post" action="../../controllers/userControls.php" class="confirm-form" data-confirm="Delete <?= htmlspecialchars($u["name"]) ?> from the database? This cannot be undone.">
                <input type="hidden" name="id" value="<?= (int) $u["id"] ?>">
                <button type="submit" class="link-remove btn-link">Remove User</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>

          <?php if (empty($users)): ?>
          <tr><td colspan="5" class="muted">No users found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>

<script src="js/script.js"></script>
<script>
  attachTableSearch('userSearch', 'usersTable');
  attachConfirmForms();
</script>
</body>
</html>
