<?php
  // Check availability
  $fastAvailable = is_callable('shell_exec') && 
                   trim(shell_exec('which mysqldump')) !== '' && 
                   trim(shell_exec('which gunzip')) !== '';
  $serverIP = $_SERVER['SERVER_ADDR'];
  ?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-12">
      <div class="bg-secondary rounded h-100 p-4 text-center">
          <h6 class="mb-4">Only Support Remote Database with port <mark>3306</mark>. Make sure to add or whitelist <mark><?php echo $serverIP ?></mark> in your old server</h6>
      </div>
    </div>
    <div class="col-sm-12 col-xl-6">
      <form id="migrateForm">
        <div class="bg-secondary rounded h-100 p-4">
          <h6 class="mb-4">Old Server (Source)</h6>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" id="old_host" placeholder="127.0.0.1" name="old_host" required>
            <label for="old_host">Old Server Host</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" id="old_user" name="old_user" placeholder="root" required>
            <label for="old_user">Old Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" id="old_pass" placeholder="mypassword" name="old_pass" required>
            <label for="old_pass">Old Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" id="old_db" name="old_db" placeholder="my_database" required>
            <label for="old_db">Old Database</label>
          </div>
        </div>
    </div>
    <!-- New Server -->
    <div class="col-sm-12 col-xl-6">
    <form id="migrateForm">
    <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">New Server (Destination)</h6>
    <div class="form-floating mb-3">
    <input type="text" class="form-control form-control-sm" id="new_host" placeholder="127.0.0.1" name="new_host" required>
    <label for="new_host">New Server Host</label>
    </div>
    <div class="form-floating mb-3">
    <input type="text" class="form-control form-control-sm" id="new_user" name="new_user" placeholder="root" required>
    <label for="new_user">New Username</label>
    </div>
    <div class="form-floating mb-3">
    <input type="text" class="form-control form-control-sm" id="new_pass" placeholder="mypassword" name="new_pass" required>
    <label for="new_pass">New Password</label>
    </div>
    <div class="form-floating mb-3">
    <input type="text" class="form-control form-control-sm" id="new_db" name="new_db" placeholder="my_database" required>
    <label for="new_db">New Database</label>
    </div>
    </div>
    </div>
    <!-- submit -->

    <div class="col-12 text-center">
    <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Start Migration</h6>
    <div class="table-responsive">
    <div class="form-check">
    <input class="form-check-input" type="radio" name="mode" id="compatible" value="compatible" checked>
    <label class="form-check-label" for="compatible">
    🛡 Compatible (PHP only)
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="mode" id="fast" value="fast" <?= $fastAvailable ? '' : 'disabled' ?>>
    <label class="form-check-label" for="fast">
    ⚡ Fast (mysqldump + gunzip)
    </label>
    <?php if (!$fastAvailable): ?>
    <small class="text-danger">Not available: shell_exec or tools missing</small>
    <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-info m-2">Start Migration</button>
    </form>
    <div id="progressContainer" style="margin-top:10px;">
    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
    <div id="progressText"></div>
    </div>
    <div id="result" class="mt-3"></div>
    </div>
    </div>
    </div>
  </div>
</div>