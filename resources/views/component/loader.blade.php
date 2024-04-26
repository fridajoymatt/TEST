<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="loader" class="loader"></div>

    <style>
        .loader {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -20px;
    margin-left: -20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

    </style>

    <script>
        // Dans votre fichier JavaScript
function showLoader() {
    document.getElementById("loader").style.display = "block";
}

function hideLoader() {
    document.getElementById("loader").style.display = "none";
}

    </script>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .loader {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -20px;
            margin-left: -20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <title>Loader Example</title>
</head>
<body>
    <!-- Loader -->
    <div id="loader" class="loader"></div>

    <!-- Example button to trigger the loader -->
    <!-- <button onclick="simulateLoading()">Simulate Loading</button> -->

    <!-- JavaScript to show/hide the loader -->
    <script>
        function showLoader() {
            document.getElementById("loader").style.display = "block";
        }

        function hideLoader() {
            document.getElementById("loader").style.display = "none";
        }

        function simulateLoading() {
            showLoader();

            // Simulate loading by using setTimeout
            setTimeout(function() {
                hideLoader();
            }, 3000); // Hide the loader after 3 seconds (adjust as needed)
        }
    </script>
</body>
</html>
