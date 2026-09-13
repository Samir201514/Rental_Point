<?php
// session_start();
// if (!isset($_SESSION["adminId"])) {
//     header("Location: ../login.php");
//     exit;
// }

// require_once "../../models/adminModel.php";
// $active  = "help";
// $tickets = getAllHelpTickets();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rental Point - Admin Help</title>
<link rel="stylesheet" href="../View/admin_views/css/style.css">
</head>
<body>

<div class="layout">
<?php include "../View/admin_views/sidebar.php";?>
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
          <?php foreach ($helps as $h): ?>
          <tr>
            <td><?= htmlspecialchars($h["SenderName"]) ?></td>
            <td><?= htmlspecialchars($h["Subject"]) ?></td>
            <td><?= htmlspecialchars($h["Description"]) ?></td>
            <td><span class="badge badge-<?= strtolower(str_replace(' ', '', $h["Status"])) ?>"><?= htmlspecialchars($h["Status"]) ?></span></td>
            <td>
              <?php if ($h["Status"] !== "Resolved"): ?>
                <button type="button" class="btn btn-respond toggle-reply">Respond</button>
                <form method="post" action="../../controllers/helpControls.php" class="inline-form">
                  <input type="hidden" name="id">
                  <input type="hidden" name="action" value="resolve">
                  <button type="submit" class="btn btn-resolved">Mark Resolved</button>
                </form>
              <?php else: ?>
                <span class="muted">No actions required</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php if ($h["Status"] !== "Resolved"): ?>
          <tr class="reply-row" style="display:none;">
            <td colspan="5">
              <form method="post" action="../../controllers/helpControls.php" class="reply-form">
                <input type="hidden" name="id" value="<?= (int) $h["id"] ?>">
                <input type="hidden" name="action" value="reply">
                <textarea name="admin_reply" rows="2" placeholder="Type your reply to <?= htmlspecialchars($h["user_name"]) ?>..." required><?= htmlspecialchars($h["admin_reply"] ?? '') ?></textarea>
                <button type="submit" class="btn btn-respond">Send Reply</button>
              </form>
            </td>
          </tr>
          <?php endif; ?>
          <?php endforeach; ?>

          <?php if (empty($helps)): ?>
          <tr><td colspan="5" class="muted">No help tickets found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>

<script src="../View/admin_views/js/script.js"></script>
<script>
  attachReplyToggles();
</script>
</body>
</html>
