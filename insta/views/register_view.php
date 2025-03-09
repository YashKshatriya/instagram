<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialConnect - Register</title>
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #6a8caf;
            --accent-color: #ff6b6b;
            --background-color: #f4f7fc;
            --text-color: #333;
            --light-text: #666;
            --white: #fff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo h1 {
            color: var(--primary-color);
            font-size: 2rem;
        }
        
        .form-container {
            background-color: var(--white);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: var(--primary-color);
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--light-text);
            font-weight: 500;
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            outline: none;
            transition: border 0.3s ease;
        }
        
        .input-group input:focus {
            border-color: var(--primary-color);
        }
        
        .row {
            display: flex;
            gap: 15px;
        }
        
        .row .input-group {
            flex: 1;
        }
        
        .terms {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .terms input {
            margin-right: 10px;
            margin-top: 5px;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: var(--secondary-color);
        }
        
        .form-footer {
            margin-top: 20px;
            text-align: center;
        }
        
        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .separator {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .separator hr {
            flex: 1;
            border: none;
            height: 1px;
            background-color: #ddd;
        }
        
        .separator span {
            padding: 0 10px;
            color: var(--light-text);
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-login button {
            flex: 1;
            padding: 10px;
            background-color: #fff;
            color: var(--text-color);
            border: 1px solid #ddd;
        }
        
        .social-login button:hover {
            background-color: #f5f5f5;
        }
        
        .alert {
            padding: 10px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            display: none;
        }
        
        .alert-error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }
        
        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>SocialConnect</h1>
        </div>
        
        <div class="form-container">
            <h2>Create an Account</h2>
            
            <div class="alert alert-error" id="error-message"></div>
            <div class="alert alert-success" id="success-message"></div>
            
            <form action="/" method="POST" id="register-form">
                <div class="row">
                </div>
                
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                
                
                <button type="submit">Create Account</button>
                
        
                
                <div class="form-footer">
                    <p>Already have an account? <a href="/login">Sign in</a></p>
                </div>
            </form>
        </div>
    </div>

    
</body>
<script>
    // Display flash messages
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(isset($_SESSION['error'])): ?>
            var errorElement = document.getElementById('error-message');
            errorElement.textContent = "<?php echo $_SESSION['error']; ?>";
            errorElement.style.display = 'block';
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['success'])): ?>
            var successElement = document.getElementById('success-message');
            successElement.textContent = "<?php echo $_SESSION['success']; ?>";
            successElement.style.display = 'block';
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        
        // Auto-hide messages after 5 seconds
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                if (alert.style.display === 'block') {
                    alert.style.opacity = '1';
                    fadeOut(alert);
                }
            });
        }, 5000);
        
        function fadeOut(element) {
            var opacity = 1;
            var timer = setInterval(function() {
                if (opacity <= 0.1) {
                    clearInterval(timer);
                    element.style.display = 'none';
                }
                element.style.opacity = opacity;
                opacity -= opacity * 0.1;
            }, 50);
        }
    });
</script>
</html>