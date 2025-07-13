document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("downloadForm"); // Declare first

  if (!form) {
    console.error("Form with ID 'downloadForm' not found.");
    return;
  }

  function pollProgress(fileName) {
    const query = `parts/main/progress.php?file=${encodeURIComponent(fileName)}`;

    const interval = setInterval(() => {
      fetch(query)
        .then(res => res.text())
        .then(data => {
          const [percent, size] = data.split("|");
          document.getElementById("progressBar").value = percent;
          document.getElementById("progressText").innerText = `${percent}% (${size} MB)`;

          if (parseInt(percent) >= 100) {
            clearInterval(interval);
            document.getElementById("progressBar").value = 0;
            document.getElementById("progressText").innerText = "";
          }
        })
        .catch(err => {
          console.error("Polling error:", err);
        });
    }, 1000);
  }


  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();

    const destinationFolder = document.getElementById("destination_folder").value.trim();
    const progressFileName = ".progress_" + Date.now() + "_" + Math.floor(Math.random() * 1000) + ".txt";

    formData.append("progress_file", progressFileName);
    formData.append("progress_folder", destinationFolder); // Send folder info

    pollProgress(progressFileName);

    xhr.open("POST", ajaxEndpoint, true);

    xhr.onload = function () {
      document.getElementById("result").innerHTML = xhr.responseText;
    };

    xhr.onerror = function () {
      document.getElementById("result").innerHTML = "<span style='color:red;'>AJAX request failed.</span>";
    };

    xhr.send(formData);
  });

});
