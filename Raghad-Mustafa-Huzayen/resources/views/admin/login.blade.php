<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Admin Login - Yalla Dodge</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        
        .login-header {
            background: #f23a2e;
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .login-header h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 10px;
        }
        
        .login-header p {
            opacity: 0.9;
            font-size: 0.9rem;
        }
        
        .login-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #f23a2e;
            box-shadow: 0 0 0 3px rgba(242, 58, 46, 0.1);
        }
        
        .login-btn {
            width: 100%;
            padding: 16px;
            background: #f23a2e;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .login-btn:hover {
            background: #d63031;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(242, 58, 46, 0.2);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            padding: 20px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 0.9rem;
        }
        
        .login-footer a {
            color: #f23a2e;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-footer a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            background: #fee;
            color: #d63031;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: none;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: none;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #f23a2e;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">YD</div>
            <h1>Admin Login</h1>
            <p>Access the Yalla Dodge admin dashboard</p>
        </div>
        
        <div class="login-body">
            <!-- Error Message (for invalid login) -->
            <div id="errorMessage" class="error-message">
                Invalid email or password. Please try again.
            </div>
            
            <!-- Success Message (for logout) -->
            <div id="successMessage" class="success-message">
                You have been logged out successfully.
            </div>
            
            <form id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           placeholder="admin@yalladodge.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" 
                           placeholder="Enter your password" required>
                </div>
                
                <button type="submit" class="login-btn"><a href="{{ route('admin.dashboard') }}">Sign In</a></button>
            </form>
        </div>
        
        <div class="login-footer">
            <p>All rights reserved.</p>
            <p><a href="{{ url('/') }}">← Back to Website</a></p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const errorMessage = document.getElementById('errorMessage');
        const successMessage = document.getElementById('successMessage');
        
        // Check if we have logout success message in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('logout') === 'success') {
            successMessage.style.display = 'block';
        }
        
        // Check if we have login error in URL
        if (urlParams.get('error') === '1') {
            errorMessage.style.display = 'block';
        }
        
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Simple validation
            if (!email || !password) {
                errorMessage.textContent = 'Please fill in all fields';
                errorMessage.style.display = 'block';
                return;
            }
            
            // Show loading state
            const submitBtn = loginForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Signing In...';
            submitBtn.disabled = true;
            
            // In a real application, you would send this to your backend
            // For now, we'll use a simple hardcoded check
            setTimeout(() => {
                // Replace these with your actual admin credentials
                const adminEmail = 'admin@yalladodge.com';
                const adminPassword = 'admin123';
                
                if (email === adminEmail && password === adminPassword) {
                    // Successful login - redirect to dashboard
                    window.location.href = '/admin/dashboard';
                } else {
                    // Failed login
                    errorMessage.textContent = 'Invalid email or password';
                    errorMessage.style.display = 'block';
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    
                    // Shake animation for error
                    loginForm.style.animation = 'shake 0.5s';
                    setTimeout(() => {
                        loginForm.style.animation = '';
                    }, 500);
                }
            }, 1000);
        });
        
        // Add shake animation for error
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    });
    </script>
</body>
</html>