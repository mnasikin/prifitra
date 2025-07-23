<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        Made with 💕 by <a href="#"><?php echo BASE_NAME; ?></a> & <a href="https://wpgan.com">WPGan</a>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        Theme Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/inc/main/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/inc/main/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/inc/main/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script>
      const ajaxEndpoint = "<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/parts/main/download.php'; ?>";
    </script>
    <script src="<?php echo BASE_URL; ?>/inc/main/js/main.js"></script>
    <script src="<?php echo BASE_URL; ?>/inc/main/js/ajax.js"></script>
</body>

</html>