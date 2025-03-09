<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialConnect - Find Users</title>
    <!-- Include your CSS here -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<style>
        /* Copy all the CSS from your original file here */
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #6a8caf;
            --accent-color: #ff6b6b;
            --background-color: #f4f7fc;
            --sidebar-bg: #fff;
            --post-bg: #fff;
            --text-color: #333;
            --light-text: #666;
            --border-color: #e0e0e0;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            --border-radius: 8px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
        }
        
        /* Sidebar - Instagram style */
        .sidebar {
            width: 240px;
            height: 100vh;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }
        
        .logo {
            padding: 0 20px 20px 20px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 20px;
        }
        
        .logo h1 {
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .menu-list {
            list-style: none;
            flex: 1;
        }
        
        .menu-list li {
            margin-bottom: 5px;
        }
        
        .menu-list a {
            display: flex;
            align-items: center;
            color: var(--text-color);
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 0;
            transition: background-color 0.2s;
            font-weight: 500;
        }
        
        .menu-list a:hover {
            background-color: var(--background-color);
        }
        
        .menu-list a.active {
            font-weight: 600;
        }
        
        .menu-list a span {
            margin-right: 12px;
            font-size: 1.3rem;
        }
        
        .profile-section {
            padding: 15px 20px;
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .profile-pic {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .profile-info {
            flex: 1;
        }
        
        .profile-name {
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .profile-username {
            color: var(--light-text);
            font-size: 0.8rem;
        }
        
        /* Main content container */
        .content-wrapper {
            margin-left: 240px;
            width: calc(100% - 240px);
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        
        /* Search Container */
        .search-container {
            background-color: #fff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        
        /* Header */
        .search-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .search-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Search Content */
        .search-content {
            padding: 25px;
        }
        
        /* Search Form */
        .search-form {
            margin-top:5%;
            position: relative;
            margin-bottom: 30px;
        }
        
        .search-input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid var(--border-color);
            border-radius: 50px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: #f9f9f9;
        }
        
        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(74, 111, 165, 0.2);
            outline: none;
            background-color: #fff;
        }
        
        .search-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #555;
            cursor: pointer;
        }
        
        /* Filter Options */
        .filter-options {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .filter-option {
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .filter-option:hover {
            background-color: #e4e4e4;
        }
        
        .filter-option.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        /* Results Container */
        .results-container {
            max-height: 600px;
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
        }
        
        /* User Result Item */
        .user-result {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s;
            background-color: #fff;
        }
        
        .user-result:hover {
            background-color: #f5f5f5;
        }
        
        .user-result:last-child {
            border-bottom: none;
        }
        
        .user-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .user-info {
            flex-grow: 1;
        }
        
        .user-name {
            font-weight: 600;
            margin-bottom: 3px;
        }
        
        .user-username {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .user-bio {
            font-size: 0.85rem;
            color: var(--light-text);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .connect-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .connect-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .connect-btn.connected {
            background-color: #e0e0e0;
            color: #555;
        }
        
        /* No Results */
        .no-results {
            text-align: center;
            padding: 30px;
            color: #666;
            background-color: #fff;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        .page-btn {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            background: #fff;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .page-btn:hover {
            background-color: #f1f1f1;
        }
        
        .page-btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        /* Right sidebar - Recent searches */
        .right-sidebar {
            width: 300px;
            position: fixed;
            right: 0;
            top: 0;
            height: 100vh;
            padding: 20px;
            border-left: 1px solid var(--border-color);
            background-color: var(--sidebar-bg);
        }
        
        .recent-searches-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            margin-top: 60px;
        }
        
        .recent-searches-title {
            color: var(--light-text);
            font-weight: 600;
        }
        
        .clear-all {
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: none;
            color: var(--text-color);
        }
        
        .recent-search-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .search-history-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .search-history-info {
            flex: 1;
        }
        
        .search-history-name {
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .search-history-username {
            color: var(--light-text);
            font-size: 0.75rem;
        }
        
        .remove-search {
            color: var(--light-text);
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            padding: 5px;
        }
        
        .remove-search:hover {
            color: var(--accent-color);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .right-sidebar {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            
            .logo h1, .profile-info, .menu-list a span:not(:first-child) {
                display: none;
            }
            
            .menu-list a {
                justify-content: center;
                padding: 15px 0;
            }
            
            .menu-list a span {
                margin-right: 0;
                font-size: 1.5rem;
            }
            
            .content-wrapper {
                margin-left: 70px;
                width: calc(100% - 70px);
                padding: 10px;
            }
            
            .profile-section {
                justify-content: center;
                padding: 15px 0;
            }
        }
        
        @media (max-width: 480px) {
            .user-result {
                flex-direction: column;
                text-align: center;
            }
            
            .user-pic {
                margin-right: 0;
                margin-bottom: 10px;
            }
            
            .connect-btn {
                margin-top: 10px;
                width: 100%;
            }
            
            .filter-options {
                justify-content: center;
            }
        }
</style>

<body>
    <!-- Sidebar - Same as main site -->
    <div class="sidebar">
        <div class="logo">
            <h1>SocialConnect</h1>
        </div>
        
        <ul class="menu-list">
            <li><a href="/home"><span>🏠</span> Home</a></li>
            <li><a href="/search" class="active"><span>🔍</span> Search</a></li>
            <li><a href="#"><span>🧭</span> Explore</a></li>
            <li><a href="#"><span>🎬</span> Reels</a></li>
            <li><a href="#"><span>✉️</span> Messages</a></li>
            <li><a href="#"><span>❤️</span> Notifications</a></li>
            <li><a href="#"><span>➕</span> Create</a></li>
            <li><a href="/profile"><span>👤</span> Profile</a></li>
            <li><a href="/logout"><span>🚪</span> Logout</a></li>

        </ul>
        
        <div class="profile-section">
            <img src="<?php echo isset($_SESSION['profile_pic']) ? htmlspecialchars($_SESSION['profile_pic']) : '/api/placeholder/100/100'; ?>" alt="Profile" class="profile-pic">
            <div class="profile-info">
                <div class="profile-name"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></div>
                <div class="profile-username"><?php echo isset($_SESSION['username']) ? '@'.htmlspecialchars($_SESSION['username']) : '@guest'; ?></div>
            </div>
        </div>
    </div>
    
    <div class="content-wrapper">
        <div class="search-container">
            <div class="search-header">
                <div class="search-title">Find Users</div>
                <button class="close-btn">×</button>
            </div>
            
            <div class="search-content">
                <div class="search-form">
                    <form method="GET" action="">
                        <input type="text" name="search" class="search-input" placeholder="Search by username..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                        <button type="submit" class="search-btn">🔍</button>
                    </form>
                </div>
                
                <div class="filter-options">
                    <!-- Filter options if needed -->
                </div>
                
                <div class="results-container">
                    <?php if (empty($users)): ?>
                        <div class="no-results">
                            <p>No users found.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                            <div class="user-result">
                                <!-- Display profile picture -->
                                <img src="<?php echo !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : '/api/placeholder/120/120'; ?>" alt="User" class="user-pic">
                                
                                <div class="user-info">
                                    <!-- Display username -->
                                    <div class="user-name"><?php echo htmlspecialchars($user['username']); ?></div>
                                    <div class="user-username">@<?php echo htmlspecialchars($user['username']); ?></div>
                                    
                                    <!-- Display bio if available -->
                                    <?php if (!empty($user['bio'])): ?>
                                    <div class="user-bio"><?php echo htmlspecialchars($user['bio']); ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <button class="connect-btn">Connect</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                
                <?php if (count($users) > 10): ?>
                    <div class="pagination">
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">»</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>





