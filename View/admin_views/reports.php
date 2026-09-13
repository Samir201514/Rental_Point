<?php
session_start();
if (!isset($_SESSION["adminId"])) {
    header("Location: ../login.php");
    exit;
}

require_once "../../models/adminModel.php";
$active = "reports";
$rows   = getAllReports();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rental Point - Admin Reports</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="layout">

  <?php include "sidebar.php"; ?>

  <main class="main">
    <div class="main-header">
      <div>
        <h1>Reports</h1>
        <p>Investigate reported listings or spam profiles.</p>
      </div>
    </div>

    <?php if (isset($_GET["msg"])): ?>
      <div class="flash flash-success"><?= htmlspecialchars($_GET["msg"]) ?></div>
    <?php elseif (isset($_GET["err"])): ?>
      <div class="flash flash-error"><?= htmlspecialchars($_GET["err"]) ?></div>
    <?php endif; ?>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Reported Item</th>
            <th>Reason</th>
            <th>Reporter</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r): ?>
          <tr>
            <td><?= htmlspecialchars($r["reported_item"]) ?></td>
            <td><?= htmlspecialchars($r["reason"]) ?></td>
            <td><?= htmlspecialchars($r["reporter"]) ?></td>
            <td><span class="badge badge-<?= strtolower($r["status"]) ?>"><?= htmlspecialchars($r["status"]) ?></span></td>
            <td>
              <?php if ($r["status"] === "Open" && $r["related_post_id"]): ?>
                <form method="post" action="../../controllers/postControls.php" class="inline-form">
                  <input type="hidden" name="action" value="remove">
                  <input type="hidden" name="id" value="<?= (int) $r["related_post_id"] ?>">
                  <button type="submit" class="btn btn-danger">Remove Post</button>
                </form>
                <form method="post" action="../../controllers/reportControls.php" class="inline-form">
                  <input type="hidden" name="id" value="<?= (int) $r["id"] ?>">
                  <input type="hidden" name="status" value="Resolved">
                  <button type="submit" class="btn btn-cancel">Dismiss</button>
                </form>
              <?php elseif ($r["status"] === "Open"): ?>
                <form method="post" action="../../controllers/reportControls.php" class="inline-form">
                  <input type="hidden" name="id" value="<?= (int) $r["id"] ?>">
                  <input type="hidden" name="status" value="Resolved">
                  <button type="submit" class="btn btn-approve">Warn User</button>
                </form>
                <form method="post" action="../../controllers/reportControls.php" class="inline-form">
                  <input type="hidden" name="id" value="<?= (int) $r["id"] ?>">
                  <input type="hidden" name="status" value="Resolved">
                  <button type="submit" class="btn btn-cancel">Dismiss</button>
                </form>
              <?php else: ?>
                &mdash;
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>

          <?php if (empty($rows)): ?>
          <tr><td colspan="5" class="muted">No reports found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>

<script src="js/script.js"></script>
</body>
</html>
