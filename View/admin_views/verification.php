<?php
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
<title>Rental Point - Admin Verification</title>
<link rel="stylesheet" href="../View/admin_views/css/style.css">
</head>
<body>

<div class="layout">

  <?php include "../View/admin_views/sidebar.php";?>

  <main class="main">
    <div class="main-header">
      <div>
        <h1>Verification Requests</h1>
        <p>Verify NID, utility bills, and property tax ownership files.</p>
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
            <th>Owner Name</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r): ?>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar"></div>
                <?= htmlspecialchars($r["OwnerName"]) ?>
              </div>
            </td>
            <td><span class="badge badge-<?= strtolower($r["Status"]) ?>"><?= htmlspecialchars($r["Status"]) ?></span></td>
            <td>
              <?php if ($r["Status"] === "Pending"): ?>
                <form method="post" action="../../controllers/verificationControls.php" class="inline-form">
                  <input type="hidden" name="id" value="<?= (int) $r["UserId"] ?>">
                  <input type="hidden" name="status" value="Approved">
                  <button type="submit" class="btn btn-approve">Approve</button>
                </form>
                <form method="post" action="../../controllers/verificationControls.php" class="inline-form">
                  <input type="hidden" name="id" value="<?= (int) $r["UserId"] ?>">
                  <input type="hidden" name="status" value="Rejected">
                  <button type="submit" class="btn btn-reject">Reject</button>
                </form>
              <?php else: ?>
                &mdash;
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>

          <?php if (empty($rows)): ?>
          <tr><td colspan="3" class="muted">No verification requests found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>

<script src="../View/admin_views/js/script.js"></script>
</body>
</html>
