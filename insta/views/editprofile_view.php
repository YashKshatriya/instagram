<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - SocialConnect</title>
    <style>
        /* Reset and Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f4f7fc;
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        /* Form Container */
        .edit-profile-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            overflow: hidden;
        }
        
        /* Form Header */
        .form-header {
            background-color: #4a6fa5;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            text-decoration: none;
        }
        
        /* Alert messages */
        .alert {
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        /* Form Content */
        .form-content {
            padding: 25px;
        }
        
        /* Profile Picture Section */
        .profile-pic-section {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .profile-pic-wrapper {
            position: relative;
        }
        
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .change-pic-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            opacity: 0;
            transition: opacity 0.2s;
            cursor: pointer;
        }
        
        .profile-pic-wrapper:hover .change-pic-overlay {
            opacity: 1;
        }
        
        .camera-icon {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .file-input {
            display: none;
        }
        
        .profile-info {
            flex-grow: 1;
        }
        
        .profile-name {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        
        .profile-username {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Form Groups */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #555;
        }
        
        .form-input, .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: #f9f9f9;
        }
        
        .form-input:focus, .form-textarea:focus {
            border-color: #4a6fa5;
            box-shadow: 0 0 0 2px rgba(74, 111, 165, 0.2);
            outline: none;
            background-color: #fff;
        }
        
        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .input-info {
            display: block;
            font-size: 0.8rem;
            color: #888;
            margin-top: 5px;
        }
        
        /* Form Sections */
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
            color: #4a6fa5;
        }
        
        /* Button Group */
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .cancel-btn, .submit-btn {
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }
        
        .cancel-btn {
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            color: #666;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .cancel-btn:hover {
            background-color: #e4e4e4;
        }
        
        .submit-btn {
            background-color: #4a6fa5;
            border: none;
            color: white;
        }
        
        .submit-btn:hover {
            background-color: #3c5a84;
        }
        
        .cancel-btn:active, .submit-btn:active {
            transform: translateY(1px);
        }
        
        /* Responsive */
        @media (max-width: 500px) {
            .profile-pic-section {
                flex-direction: column;
                text-align: center;
            }
            
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .submit-btn, .cancel-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="edit-profile-container">
        <div class="form-header">
            <div class="form-title">Edit Profile</div>
            <a href="/profile" class="close-btn">×</a>
        </div>
        
        <div class="form-content">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
            
            <form id="editProfileForm" action="/editpf" method="POST" enctype="multipart/form-data">
                <div class="profile-pic-section">
                    <div class="profile-pic-wrapper">
                        <img src="<?php echo !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : '/api/placeholder/200/200'; ?>" 
                             alt="Profile Picture" class="profile-pic" id="profilePicPreview">
                        <label for="profilePic" class="change-pic-overlay">
                            <div class="camera-icon">📷</div>
                            <div>Change</div>
                        </label>
                        <input type="file" id="profilePic" name="profilePic" class="file-input" accept="image/*">
                    </div>
                    
                    <div class="profile-info">
                        <div class="profile-name"><?php echo htmlspecialchars($user['username']); ?></div>
                        <div class="profile-username">@<?php echo htmlspecialchars($user['username']); ?></div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="section-title">Basic Information</div>
                    
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-input" 
                               value="<?php echo htmlspecialchars($user['username']); ?>">
                        <span class="input-info">Used for your profile URL: socialconnect.com/<?php echo htmlspecialchars($user['username']); ?></span>            
                    </div>
                    
                    <div class="form-group">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea id="bio" name="bio" class="form-textarea" 
                                  placeholder="Tell us about yourself..."><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
                        <span class="input-info">Brief description of yourself (maximum 150 characters)</span>
                    </div>
                </div>
                
                <div class="button-group">
                    <a href="/profile" class="cancel-btn">Cancel</a>
                    <button type="submit" class="submit-btn">Save Changes</button>
                </div>
            </form> 
        </div>
    </div>
    
    <script>
        // Preview uploaded profile picture
        document.getElementById('profilePic').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePicPreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>