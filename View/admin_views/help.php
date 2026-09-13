<?php
session_start();
if (!isset($_SESSION["adminId"])) {
    header("Location: ../login.php");
    exit;
}

require_once "../../models/adminModel.php";
$active  = "help";
$tickets = getAllHelpTickets();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rental Point - Admin Help</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="layout">

  <?php include "sidebar.php"; ?>

  <main class="main">
    <div class="main-header">
      <div>
        <h1>Help</h1>
        <p>Manage user support queries, report investigations, and platform help tickets.</p>
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
            <th>User</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $t): ?>
          <tr>
            <td><?= htmlspecialchars($t["user_name"]) ?><br><span class="muted"><?= htmlspecialchars($t["user_email"]) ?></span></td>
            <td><?= htmlspecialchars($t["subject"]) ?></td>
            <td><?= htmlspecialchars($t["description"]) ?></td>
            <td><span class="badge badge-<?= strtolower(str_replace(' ', '', $t["status"])) ?>"><?= htmlspecialchars($t["status"]) ?></span></td>
            <td>
              <?php if ($t["status"] !== "Resolved"): ?>
                <button type="button" class="btn btn-respond toggle-reply" data-target="reply-<?= (int) $t["id"] ?>">Respond</button>
                <form method="post" action="../../controllers/helpControls.php" class="inline-form">
                  <input type="hidden" name="id" value="<?= (int) $t["id"] ?>">
                  <input type="hidden" name="action" value="resolve">
                  <button type="submit" class="btn btn-resolved">Mark Resolved</button>
                </form>
              <?php else: ?>
                <span class="muted">No actions required</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php if ($t["status"] !== "Resolved"): ?>
          <tr class="reply-row" id="reply-<?= (int) $t["id"] ?>" style="display:none;">
            <td colspan="5">
              <form method="post" action="../../controllers/helpControls.php" class="reply-form">
                <input type="hidden" name="id" value="<?= (int) $t["id"] ?>">
                <input type="hidden" name="action" value="reply">
                <textarea name="admin_reply" rows="2" placeholder="Type your reply to <?= htmlspecialchars($t["user_name"]) ?>..." required><?= htmlspecialchars($t["admin_reply"] ?? '') ?></textarea>
                <button type="submit" class="btn btn-respond">Send Reply</button>
              </form>
            </td>
          </tr>
          <?php endif; ?>
          <?php endforeach; ?>

          <?php if (empty($tickets)): ?>
          <tr><td colspan="5" class="muted">No help tickets found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>

<script src="js/script.js"></script>
<script>
  attachReplyToggles();
</script>
</body>
</html>
