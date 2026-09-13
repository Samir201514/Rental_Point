<?php
// session_start();
// if (!isset($_SESSION["adminId"])) {
//     header("Location: ../login.php");
//     exit;
// }

// require_once "../../models/adminModel.php";
// $active = "posts";
// $posts  = getAllPosts();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rental Point - Admin Posts</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="layout">

  <?php include "sidebar.php"; ?>

  <main class="main">
    <div class="main-header">
      <div>
        <h1>Posts</h1>
        <p>Manage all rental and roommate posts.</p>
      </div>
      <input type="text" id="postSearch" class="search-box" placeholder="Search by ID, title, or location...">
    </div>

    <?php if (isset($_GET["msg"])): ?>
      <div class="flash flash-success"><?= htmlspecialchars($_GET["msg"]) ?></div>
    <?php elseif (isset($_GET["err"])): ?>
      <div class="flash flash-error"><?= htmlspecialchars($_GET["err"]) ?></div>
    <?php endif; ?>

    <div class="table-wrapper">
      <table id="postsTable">
        <thead>
          <tr>
            <th>Title</th>
            <th>Post Type</th>
            <th>Posted By</th>
            <th>Location</th>
            <th>Price</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($posts as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p["Title"]) ?></td>
            <td><span class="tag"><?= htmlspecialchars($p["PostType"]) ?></span></td>
            <td><?= htmlspecialchars($p["PosterName"]) ?></td>
            <td><?= htmlspecialchars($p["Location"]) ?></td>
            <td>&#2547;<?= number_format($p["MonthlyRent"]) ?>/mo</td>
            <td><span class="badge badge-<?= strtolower($p["Status"]) ?>"><?= htmlspecialchars($p["Status"]) ?></span></td>
            <td><?= htmlspecialchars(date("M d, Y", strtotime($p["CreatedAt"]))) ?></td>
            <td>
              <a href="#" class="link-view">View</a>
              <a href="#"
                 class="link-remove open-remove-modal"
                 data-id="<?= (int) $p["id"] ?>"
                 data-label="<?= htmlspecialchars($p["post_code"] . ': ' . $p["title"]) ?>">Remove</a>
            </td>
          </tr>
          <?php endforeach; ?>

          <?php if (empty($posts)): ?>
          <tr><td colspan="9" class="muted">No posts found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

</div>

<!-- Confirmation modal: submits a real DELETE to controllers/postControls.php -->
<div class="modal-overlay" style="display:none;" id="removeModal">
  <div class="modal">
    <h2>Remove Post</h2>
    <p>This permanently deletes the post row from the database — it cannot be undone.</p>
    <p class="muted">REMOVING POST<br><strong id="removeModalLabel"></strong></p>
    <form method="post" action="../../controllers/postControls.php">
      <input type="hidden" name="action" value="remove">
      <input type="hidden" name="id" id="removeModalId">
      <div class="modal-actions">
        <button type="button" class="btn btn-cancel" id="removeModalCancel">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete permanently</button>
      </div>
    </form>
  </div>
</div>

<script src="js/script.js"></script>
<script>
  attachTableSearch('postSearch', 'postsTable');
  attachRemovePostModal();
</script>
</body>
</html>
