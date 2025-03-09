<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialConnect - Home</title>
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
        }
        
        /* Stories section - Instagram style */
        .stories-container {
            background-color: var(--post-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 15px;
            margin: 20px;
            overflow-x: auto;
            max-width: 600px;
        }
        
        .stories {
            display: flex;
            gap: 15px;
        }
        
        .story {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }
        
        .story-avatar {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            border: 3px solid #e1306c;
            padding: 2px;
            background-color: white;
            margin-bottom: 5px;
        }
        
        .story-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .story-username {
            font-size: 0.75rem;
            max-width: 70px;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
        }
        
        /* Feed */
        .feed {
            max-width: 600px;
            padding: 0 20px 20px 20px;
            margin-left: 20px;
            margin-right: auto;
        }
        
        .create-post {
            background-color: var(--post-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            width: 100%;
        }
        
        .create-post-header {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .create-post-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            resize: none;
        }
        
        .create-post-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        
        .post-attachment-buttons {
            display: flex;
            gap: 15px;
        }
        
        .attachment-btn {
            background: none;
            border: none;
            color: var(--light-text);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .attachment-btn:hover {
            color: var(--primary-color);
        }
        
        .post-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 500;
        }
        
        .post-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .post {
            background-color: var(--post-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 0;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }
        
        .post-header {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
        }
        
        .post-user-info {
            flex: 1;
        }
        
        .post-username {
            font-weight: 600;
        }
        
        .post-time {
            color: var(--light-text);
            font-size: 0.8rem;
        }
        
        .post-options {
            color: var(--light-text);
            cursor: pointer;
        }
        
        .post-media {
            width: 100%;
            max-height: 600px;
            object-fit: cover;
        }
        
        .post-content {
            padding: 15px;
        }
        
        .post-actions {
            display: flex;
            padding: 0 15px 10px;
            gap: 15px;
        }
        
        .post-action {
            background: none;
            border: none;
            font-size: 1.3rem;
            cursor: pointer;
            color: var(--text-color);
        }
        
        .post-action:hover {
            color: var(--accent-color);
        }
        
        .post-like-count {
            padding: 0 15px 5px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .post-caption {
            padding: 0 15px 15px;
        }
        
        .post-caption-username {
            font-weight: 600;
            margin-right: 5px;
        }
        
        .post-comments {
            padding: 0 15px 15px;
            color: var(--light-text);
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .post-add-comment {
            display: flex;
            padding: 15px;
            border-top: 1px solid var(--border-color);
        }
        
        .comment-input {
            flex: 1;
            border: none;
            background: none;
            outline: none;
            padding: 0 10px;
        }
        
        .comment-submit {
            background: none;
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            cursor: pointer;
        }
        
        .comment-submit:disabled {
            color: var(--light-text);
            cursor: default;
        }
        
        /* Right sidebar for suggestions */
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
        
        .suggestions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            margin-top: 60px;
        }
        
        .suggestions-title {
            color: var(--light-text);
            font-weight: 600;
        }
        
        .see-all {
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: none;
            color: var(--text-color);
        }
        
        .suggestion-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .suggestion-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .suggestion-info {
            flex: 1;
        }
        
        .suggestion-username {
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .suggestion-relation {
            color: var(--light-text);
            font-size: 0.75rem;
        }
        
        .follow-btn {
            color: var(--primary-color);
            background: none;
            border: none;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
        }
        
        .footer-links {
            margin-top: 30px;
            font-size: 0.75rem;
            color: var(--light-text);
        }
        
        .footer-links a {
            color: var(--light-text);
            text-decoration: none;
            margin-right: 5px;
        }
        
        .copyright {
            margin-top: 20px;
            font-size: 0.75rem;
            color: var(--light-text);
        }
        
        /* Media queries */
        @media (max-width: 1200px) {
            .right-sidebar {
                display: none;
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
            }
            
            .profile-section {
                justify-content: center;
                padding: 15px 0;
            }
            
            .feed, .stories-container {
                margin-left: 10px;
            }
        }
        
        @media (max-width: 480px) {
            .stories-container {
                margin: 10px;
            }
            
            .feed {
                padding: 0 10px 10px 10px;
                margin-left: 0;
            }
            
            .create-post {
                padding: 15px;
            }
            
            .post-attachment-buttons {
                gap: 10px;
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
            <li><a href="/home" class="active"><span>🏠</span> Home</a></li>
            <li><a href="/search"><span>🔍</span> Search</a></li>
            <li><a href="#"><span>🧭</span> Explore</a></li>
            <li><a href="#"><span>🎬</span> Reels</a></li>
            <li><a href="#"><span>✉️</span> Messages</a></li>
            <li><a href="#"><span>❤️</span> Notifications</a></li>
            <li><a href="#"><span>➕</span> Create</a></li>
            <li><a href="/profile"><span>👤</span> Profile</a></li>
            <li><a href="/logout"><span>🚪</span> Logout</a></li>
        </ul>   
        
        <div class="profile-section">
            <img src="/api/placeholder/100/100" alt="Profile" class="profile-pic">
            <div class="profile-info">
                <div class="profile-name">John Doe</div>
                <div class="profile-username">@johndoe</div>
            </div>
        </div>
    </div>
    
    <div class="content-wrapper">
        <!-- Stories - Instagram style -->
        <div class="stories-container">
            <div class="stories">
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="Your Story">
                    </div>
                    <div class="story-username">Your Story</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="user1">
                    </div>
                    <div class="story-username">user1</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="user2">
                    </div>
                    <div class="story-username">user2</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="user3">
                    </div>
                    <div class="story-username">user3</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="image.png" alt="user4">
                    </div>
                    <div class="story-username">user4</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="user5">
                    </div>
                    <div class="story-username">user5</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="user6">
                    </div>
                    <div class="story-username">user6</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="/api/placeholder/100/100" alt="user7">
                    </div>
                    <div class="story-username">user7</div>
                </div>
            </div>
        </div>
        
        <!-- Main feed -->
        <div class="feed">
            <!-- Create post -->
            <div class="create-post">
                <div class="create-post-header">
                    <img src="<?php echo !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : '/api/placeholder/100/100'; ?>" alt="Profile" class="profile-pic">
                    <textarea class="create-post-input" placeholder="What's on your mind?"></textarea>
                </div>
                
                <div class="create-post-actions">
                    <div class="post-attachment-buttons">
                        <button class="attachment-btn">📷 Photo</button>
                        <button class="attachment-btn">🎬 Video</button>
                        <button class="attachment-btn">📍 Location</button>
                    </div>
                    <button class="post-btn">Post</button>
                </div>
            </div>
            
            <!-- Posts - Instagram style -->
            <div class="post">
                <div class="post-header">
                    <img src="/api/placeholder/100/100" alt="User" class="profile-pic">
                    <div class="post-user-info">
                        <div class="post-username">alex_photos</div>
                        <div class="post-time">New York, NY</div>
                    </div>
                    <div class="post-options">⋮</div>
                </div>
                
                <img src="image.png" alt="Post" class="post-media">
                
                <div class="post-actions">
                    <button class="post-action">❤️</button>
                    <button class="post-action">💬</button>
                    <button class="post-action">✈️</button>
                </div>
                
                <div class="post-like-count">142 likes</div>
                
                <div class="post-caption">
                    <span class="post-caption-username">alex_photos</span>
                    Beautiful sunset in New York City! #nyc #sunset #photography
                </div>
                
                <div class="post-comments">View all 24 comments</div>
                
                <div class="post-add-comment">
                    <img src="image.png" alt="Profile" class="profile-pic">
                    <input type="text" placeholder="Add a comment..." class="comment-input">
                    <button class="comment-submit" disabled>Post</button>
                </div>
            </div>
            
            <div class="post">
                <div class="post-header">
                    <img src="/api/placeholder/100/100" alt="User" class="profile-pic">
                    <div class="post-user-info">
                        <div class="post-username">travel_adventures</div>
                        <div class="post-time">Paris, France</div>
                    </div>
                    <div class="post-options">⋮</div>
                </div>
                
                <img src="/api/placeholder/600/800" alt="Post" class="post-media">
                
                <div class="post-actions">
                    <button class="post-action">❤️</button>
                    <button class="post-action">💬</button>
                    <button class="post-action">✈️</button>
                </div>
                
                <div class="post-like-count">328 likes</div>
                
                <div class="post-caption">
                    <span class="post-caption-username">travel_adventures</span>
                    The Eiffel Tower never gets old! 🗼 #paris #travel #eiffeltower
                </div>
                
                <div class="post-comments">View all 42 comments</div>
                
                <div class="post-add-comment">
                    <img src="/api/placeholder/100/100" alt="Profile" class="profile-pic">
                    <input type="text" placeholder="Add a comment..." class="comment-input">
                    <button class="comment-submit" disabled>Post</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>