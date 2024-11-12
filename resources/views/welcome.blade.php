<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url('image/chibi.gif'); /* Replace with your background image URL */
            background-position: center;
            background-repeat: no-repeat; /* Prevent the image from repeating */
            background-size: cover; /* Cover the entire background */
            color: white;
            height: 620px;
        }
        .sidebar {
            height: 43vh;
            width: 331px;
            position: fixed;
            top: 131px;
            left: 464px;
            background-color: #ff07c817;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            padding-top: 10px;
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            width: 100%; /* Make links full width */
            text-align: center; /* Center text in the link */
            margin: 10px 0; /* Add some vertical spacing between links */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }
        .sidebar a:hover {
            background-color: rgba(0, 31, 63, 0.8);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for main content */
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content horizontally */
            justify-content: center; /* Center content vertically */
        }
        h1 {
            font-size: 3.5rem;
            text-align: center; /* Center the heading */
        }
        p {
            margin-top: 0;
            font-size: larger;
            margin-bottom: 3rem;
            text-align: center; /* Center the paragraph */
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <a href="/login"><i class="fas fa-user"></i> User Login</a>
        <a href="/register"><i class="fas fa-user-plus"></i> User Register</a>
        <a href="/admin/login"><i class="fas fa-user-shield"></i> Admin Login</a>
        <a href="/admin/register"><i class="fas fa-user-cog"></i> Admin Register</a>
    </nav>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
