<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialConnect - Profile</title>
    <style>
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
            --button-bg: #4a6fa5;
            --button-hover: #3c5a84;
            --modal-overlay: rgba(0, 0, 0, 0.5);
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
            padding: 20px;
        }
        
        /* Profile header */
        .profile-header {
            background-color: var(--post-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 40px;
        }
        
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: var(--shadow);
            position: relative;
        }
        
        .profile-details {
            flex: 1;
        }
        
        .profile-info-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 20px;
        }
        
        .profile-username-large {
            font-size: 1.8rem;
            font-weight: 600;
        }
        
        .profile-action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .follow-btn, .message-btn, .more-options-btn, .edit-profile-btn {
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .follow-btn {
            background-color: var(--button-bg);
            color: white;
            border: none;
        }
        
        .follow-btn:hover {
            background-color: var(--button-hover);
        }
        
        .follow-btn.following {
            background-color: var(--background-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        .message-btn, .edit-profile-btn {
            background-color: var(--background-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        .message-btn:hover, .edit-profile-btn:hover {
            text-decoration:none;
            background-color: #e8eef7;
        }
        
        .more-options-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            padding: 8px 12px;
        }
        
        .profile-stats {
            display: flex;
            gap: 30px;
            margin-bottom: 20px;
        }
        
        .stat-item {
            display: flex;
            gap: 5px;
        }
        
        .stat-number {
            font-weight: 700;
        }
        
        .stat-label {
            color: var(--text-color);
        }
        
        .profile-fullname {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        /* Profile tabs */
        .profile-tabs {
            display: flex;
            justify-content: center;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 30px;
        }
        
        .tab {
            padding: 15px 40px;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--light-text);
            font-size: 0.85rem;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .tab.active {
            border-bottom: 2px solid var(--text-color);
            color: var(--text-color);
        }
        
        .tab-icon {
            font-size: 1.2rem;
        }
        
        /* Post grid */
        .post-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        
        .post-item {
            position: relative;
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .post-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .post-item:hover .post-image {
            transform: scale(1.05);
        }
        
        .post-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        
        .post-item:hover .post-overlay {
            opacity: 1;
        }
        
        .post-stat {
            color: white;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--modal-overlay);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal {
            background-color: var(--post-bg);
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }
        
        .modal-overlay.active .modal {
            transform: translateY(0);
        }
        
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .modal-title {
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--light-text);
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .edit-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--light-text);
        }
        
        .form-input, .form-textarea {
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s;
        }
        
        .form-input:focus, .form-textarea:focus {
            border-color: var(--primary-color);
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .profile-pic-edit {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .profile-pic-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: var(--shadow);
        }
        
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        
        .file-input-button {
            background-color: var(--button-bg);
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            display: inline-block;
        }
        
        .file-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }
        
        .form-submit {
            margin-top: 10px;
            background-color: var(--button-bg);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .form-submit:hover {
            background-color: var(--button-hover);
        }
        
        /* Media queries */
        @media (max-width: 1024px) {
            .post-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 20px 0;
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
                padding: 15px;
            }
            
            .profile-section {
                justify-content: center;
                padding: 15px 0;
            }
            
            .profile-header {
                flex-direction: column;
                align-items: center;
                gap: 20px;
                text-align: center;
            }
            
            .profile-info-header {
                flex-direction: column;
                margin-bottom: 15px;
                gap: 15px;
            }
            
            .profile-stats {
                justify-content: center;
            }
            
            .profile-avatar {
                width: 120px;
                height: 120px;
            }
        }
        
        @media (max-width: 480px) {
            .post-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .tab {
                padding: 15px 20px;
                font-size: 0.75rem;
            }
            
            .profile-tabs {
                margin-bottom: 20px;
            }
            
            .profile-pic-edit {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Instagram-like Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>SocialConnect</h1>
        </div>
        
        <ul class="menu-list">
            <li><a href="/home"><span>🏠</span> Home</a></li>
            <li><a href="/search"><span>🔍</span> Search</a></li>
            <li><a href="#"><span>🧭</span> Explore</a></li>
            <li><a href="#"><span>🎬</span> Reels</a></li>
            <li><a href="#"><span>✉️</span> Messages</a></li>
            <li><a href="#"><span>❤️</span> Notifications</a></li>
            <li><a href="#"><span>➕</span> Create</a></li>
            <li><a href="/profile" class="active"><span>👤</span> Profile</a></li>
            <li><a href="/logout"><span>🚪</span> Logout</a></li>

        </ul>
        
        <div class="profile-section">
            <img src="<?php echo !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : '/api/placeholder/100/100'; ?>" alt="Profile" class="profile-pic">
            <div class="profile-info">
                <div class="profile-name"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                <div class="profile-username">@<?php echo htmlspecialchars($user['username']); ?></div>
            </div>
        </div>
    </div>
    
    <div class="content-wrapper">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        
        <!-- Profile Header -->
        <div class="profile-header">
            <img src="<?php echo !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : '/api/placeholder/300/300'; ?>" alt="User Profile" class="profile-avatar">
            
            <div class="profile-details">
                <div class="profile-info-header">   
                    <div class="profile-username-large"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                    
                    <div class="profile-action-buttons">
                        <a href="/editpf" class="edit-profile-btn" id="editProfileBtn">Edit Profile</a>
                    </div>
                </div>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">posts</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">followers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">following</div>
                    </div>
                </div>
                
                <div class="profile-fullname"><?php echo htmlspecialchars($user['bio'] ?? 'No bio yet.'); ?></div>
            </div>
        </div>
        
        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <div class="tab active"><span class="tab-icon">📷</span> Posts</div>
            <div class="tab"><span class="tab-icon">🎬</span> Reels</div>
            <div class="tab"><span class="tab-icon">🏷️</span> Tagged</div>
        </div>
        
        <!-- Post Grid -->
        <div class="post-grid">
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 243</div>
                    <div class="post-stat">💬 18</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 187</div>
                    <div class="post-stat">💬 12</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 324</div>
                    <div class="post-stat">💬 32</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 156</div>
                    <div class="post-stat">💬 8</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 283</div>
                    <div class="post-stat">💬 24</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 198</div>
                    <div class="post-stat">💬 15</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 275</div>
                    <div class="post-stat">💬 19</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 142</div>
                    <div class="post-stat">💬 7</div>
                </div>
            </div>
            <div class="post-item">
                <img src="/api/placeholder/400/400" alt="Post" class="post-image">
                <div class="post-overlay">
                    <div class="post-stat">❤️ 311</div>
                    <div class="post-stat">💬 28</div>
                </div>
            </div>
        </div>  
        
                        
        
    </div>
    
</body>
</html>                                                                                                                         