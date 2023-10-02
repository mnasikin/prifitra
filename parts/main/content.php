<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4 ">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <!-- Void -->
                </div>

                <!-- Main form -->
                
                <div class="col-sm-12 col-md-8 col-xl-8">
                    Welcome to <a href="">PRIFITRA</a>, Please use <a href="help"> Help Page</a> to get started.
                    <hr>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <select class="form-select form-select mb-3" aria-label=".form-select-sm example" id="protocol" name="protocol">
                        <option selected>Select protocol</option>
                        <option value="https">HTTPS</option>
                        <option value="http">HTTP</option>
                    </select>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" title="Your File URL"><i class="fas fa-link" ></i></span>
                        <input type="text" class="form-control" placeholder="https://example.com/archive.zip" aria-label="Username"
                            aria-describedby="basic-addon1" autocomplete="off" id="file_url" name="file_url">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" title="Destination Folder"><i class="fas fa-folder-plus"></i></span>
                        <input type="text" class="form-control" placeholder="download/files" aria-label="Username"
                            aria-describedby="basic-addon1" id="destination_folder" name="destination_folder">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" title="Downloaded File Name"><i class="far fa-file"></i></span>
                        <input type="text" class="form-control" placeholder="archive" aria-label="Username"
                            aria-describedby="basic-addon1" id="file_name" name="file_name">
                    </div>
                    <select class="form-select form-select mb-3" aria-label=".form-select-sm example" id="file_extension" name="file_extension">
                        <option selected>Select File Extension</option>
                        <option value="zip">ZIP</option>
                        <option value="jpg">JPG</option>
                        <option value="webp">WEBP</option>
                        <option value="png">PNG</option>
                        <option value="rar">RAR</option>
                        <option value="tar.gz">TAR.GZ</option>
                        <option value="sql">SQL</option>
                        <option value="jpeg">JPEG</option>
                        <option value="daf">DAF</option>
                        <option value="mp4">MP4</option>
                    </select>
                    <?php require_once "parts/main/download.php"; ?><br>
                    <button type="submit" class="btn btn-dark m-2">Download and Save File</button>
                    </form>
                </div>
                
                <!-- End Form -->

                <div class="col-sm-6 col-md-4 col-xl-2">
                    <!-- Void -->
                </div>
            </div>
        </div>
    </div>
</div>
