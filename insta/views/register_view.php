<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect - Register</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
    /* General Styles */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 450px;
}

.form-container {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    padding: 40px 30px;
    text-align: center;
}

/* Form Header */
.form-header {
    margin-bottom: 30px;
}

.logo {
    width: 70px;
    height: 70px;
    margin-bottom: 15px;
    border-radius: 50%;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.form-header h1 {
    color: #333;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 8px;
}

.form-header p {
    color: #777;
    font-size: 15px;
}

/* Form Elements */
form {
    margin-bottom: 25px;
}

.input-group {
    position: relative;
    margin-bottom: 20px;
}

.name-fields {
    display: flex;
    gap: 15px;
    margin-bottom: 0;
}

.half {
    flex: 1;
}

.icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c63ff;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 15px 15px 15px 45px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s;
}

input:focus {
    border-color: #6c63ff;
    outline: none;
    box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
    cursor: pointer;
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    font-size: 14px;
}

.remember-forgot label {
    display: flex;
    align-items: center;
    color: #666;
}

.remember-forgot input[type="checkbox"] {
    margin-right: 5px;
    accent-color: #6c63ff;
}

.forgot {
    color: #6c63ff;
    text-decoration: none;
}

.terms {
    margin-bottom: 20px;
    font-size: 14px;
    color: #666;
    text-align: left;
}

.terms a {
    color: #6c63ff;
    text-decoration: none;
}

.submit-btn {
    width: 100%;
    padding: 15px;
    background-color: #6c63ff;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
}

.submit-btn:hover {
    background-color: #5a52d5;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108, 99, 255, 0.2);
}

/* Separator */
.separator {
    display: flex;
    align-items: center;
    margin: 25px 0;
}

.separator span {
    color: #888;
    font-size: 14px;
    padding: 0 15px;
}

.separator::before,
.separator::after {
    content: "";
    flex: 1;
    height: 1px;
    background-color: #e0e0e0;
}

/* Social Login */
.social-login {
    display: flex;
    justify-content: center;
    gap: 15px;
}

.social-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 1px solid #e0e0e0;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
}

.social-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.google {
    color: #EA4335;
}

.facebook {
    color: #3b5998;
}

.twitter {
    color: #1DA1F2;
}

/* Form Footer */
.form-footer {
    color: #666;
    font-size: 14px;
}

.form-footer a {
    color: #6c63ff;
    font-weight: 500;
    text-decoration: none;
}

/* Register Page Specific */
.register .form-header {
    margin-bottom: 25px;
}

/* Responsive Adjustments */
@media (max-width: 480px) {
    .form-container {
        padding: 30px 20px;
    }
    
    .name-fields {
        flex-direction: column;
        gap: 0;
    }
    
    .half {
        width: 100%;
    }
}
</style>
<body>
    <div class="container">
        <div class="form-container register">
            <div class="form-header">
                <img src="/api/placeholder/150/150" alt="Connect Logo" class="logo">
                <h1>Connect</h1>
                <p>Create a new account</p>
            </div>
            
            <form action="/" method="POST">
    <div class="input-group">
        <span class="icon"><i class="fas fa-user"></i></span>
        <input type="text" name="username" placeholder="Username" required>
    </div>
    
    <div class="input-group">
        <span class="icon"><i class="fas fa-envelope"></i></span>
        <input type="email" name="email" placeholder="Email address" required>
    </div>
    
    <div class="input-group">
        <span class="icon"><i class="fas fa-lock"></i></span>
        <input type="password" name="password" placeholder="Create password" required>
    </div>
    
    <div class="input-group">
        <span class="icon"><i class="fas fa-lock"></i></span>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
    </div>
    
    <button type="submit" class="submit-btn">Create Account</button>
</form>
            
            <div class="form-footer">
                <p>Already have an account? <a href="/login">login</a></p>
            </div>
        </div>
    </div>
</body>
</html>