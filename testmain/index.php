<!DOCTYPE html>
<html>
  <head>
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  </head>
  <body>
  <nav class="navbar navbar-expand bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-family: Times New Roman", Times, serif;">INNVENTO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upload_page/index.html">Upload</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Innovation</a></li>
            <li><a class="dropdown-item" href="#">Technology</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Products</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<br>
    <?php

//Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innvento";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT * FROM main";
$result = $conn->query($sql);

// Loop through data and create divs
echo "<div class='row'>";
$i = 1;
while($row = $result->fetch_assoc()) {
    if($i > 3) {
        echo "</div><div class='row'>";
        $i = 1;
    }
    echo"<div class='col-1'></div>";
    echo "<div class='col-3'>";
    echo "<div class='card'>";
    $imgData = base64_encode($row['image']);
    echo '<img src="data:image/jpeg;base64,'.$imgData.'">';
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>".$row['name']."</h5>";
    echo "<p class='card-text'>".$row['dcript']."</p>";
    echo "</div></div></div>";
    $i++;
}
echo "</div>";
// Close database connection
$conn->close();

?>

    <main>
    </main>

    <footer>
      <p>&copy; 2023 - All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
  </body>
</html>