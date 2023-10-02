</div>
    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Your Connection Info</h6>
                    </div>
                    <?php
                    // Get User IP
                    $userIP = $_SERVER['REMOTE_ADDR'];

                    // Get Server IP
                    $serverIP = $_SERVER['SERVER_ADDR'];

                    // Get location and other data from ipinfo.io
                    $ipinfoURL = "https://ipinfo.io/{$userIP}/json";
                    $ipinfoData = file_get_contents($ipinfoURL);
                    $ipinfoInfo = json_decode($ipinfoData);
                    $serverinfoURL = "https://ipinfo.io/{$serverIP}/json";
                    $serverinfoData = file_get_contents($serverinfoURL);
                    $serverinfoInfo = json_decode($serverinfoData);

                    // Get location
                    $city = isset($ipinfoInfo->city) ? $ipinfoInfo->city : 'Null';
                    $region = isset($ipinfoInfo->region) ? $ipinfoInfo->region : 'Null';
                    $country = isset($ipinfoInfo->country) ? $ipinfoInfo->country : 'Null';
                    $scity = isset($serverinfoInfo->city) ? $serverinfoInfo->city : 'Null';
                    $sregion = isset($serverinfoInfo->region) ? $serverinfoInfo->region : 'Null';
                    $scountry = isset($serverinfoInfo->country) ? $serverinfoInfo->country : 'Null';

                    // Get ISP Info
                    $isp = isset($ipinfoInfo->org) ? $ipinfoInfo->org : 'Null';
                    $sisp = isset($serverinfoInfo->org) ? $serverinfoInfo->org : 'Null';

                    // Get Time Zone
                    $timezone = isset($ipinfoInfo->timezone) ? $ipinfoInfo->timezone : 'Null';
                    $stimezone = isset($serverinfoInfo->timezone) ? $serverinfoInfo->timezone : 'Null';

                    // Display Info
                    echo "Your IP: " . $userIP . "<br>";
                    echo "Location: " . $city . ", " . $region . ", " . $country . "<br>";
                    echo "Time Zone: " . $timezone . "<br>";
                    echo "ISP: " . $isp;

                    ?>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Current Server Info</h6>
                    </div>
                    <?php
                    // echo "<h6 class='mb-0'>Your Server Info</h6>"
                    echo "Server IP: " . $serverIP . "<br>";
                    echo "Location: " . $scity . ", " . $sregion . ", " . $scountry . "<br>";
                    echo "Time Zone: " . $stimezone . "<br>";
                    echo "ISP: " . $sisp;
                    ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Your PHP Extension status</h6>
                    </div>
                    <?php require_once "parts/main/extension-check.php"; ?> 
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox" <?php echo $checkedAttribute; ?>>
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><?php echo $jsonExtensionIsActive ? 'Your JSON Extension is active!' : '<del>Your JSON Extension is disabled...</del>'; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox" <?php echo $checkedAttribute; ?>>
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><?php echo $curlExtensionIsActive ? 'Your cURL Extension is active!' : '<del>Your cURL Extension is disabled...</del>'; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox" <?php echo $checkedAttribute; ?>>
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><?php echo $fileInfoExtensionIsActive ? 'Your File Info Extension is active!' : '<del>Your File Info Extension is disabled...</del>'; ?></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->