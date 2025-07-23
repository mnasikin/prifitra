<?php
require_once "parts/main/header.php";
require_once "parts/main/nav.php";
require_once "parts/main/navbar.php";
require_once "parts/db/db-migrate.php";
require_once "parts/main/widget.php";
require_once "parts/main/footer.php";
?> 
<script>
    // Get the current full path
    const currentPath = window.location.pathname;

    // Remove last segment (e.g. "db-migrate" or "index")
    const PRIFITRA_BASE = currentPath.endsWith('/') 
        ? currentPath.slice(0, -1) 
        : currentPath.substring(0, currentPath.lastIndexOf('/'));

    const PRIFITRA_URL = window.location.origin + PRIFITRA_BASE;
    // console.log("PRIFITRA_BASE:", PRIFITRA_BASE);
    // console.log("PRIFITRA_URL:", PRIFITRA_URL);
</script>
