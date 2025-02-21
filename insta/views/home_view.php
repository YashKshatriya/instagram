<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Media App</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fafafa;
      color: #262626;
    }
    
    .app-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      min-height: 100vh;
      border-left: 1px solid #dbdbdb;
      border-right: 1px solid #dbdbdb;
      padding-bottom: 60px;
    }
    
    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      border-bottom: 1px solid #dbdbdb;
      position: sticky;
      top: 0;
      background-color: white;
      z-index: 10;
    }
    
    .logo {
      font-size: 24px;
      font-weight: bold;
      font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    }
    
    .header-icons {
      display: flex;
      gap: 18px;
    }
    
    .feed {
      padding-bottom: 60px;
    }
    
    .post {
      border-bottom: 1px solid #dbdbdb;
      margin-bottom: 10px;
    }
    
    .post-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 16px;
    }
    
    .post-user {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .post-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
    }
    
    .post-username {
      font-weight: 600;
      font-size: 14px;
    }
    
    .post-image {
      width: 100%;
      height: auto;
    }
    
    .post-actions {
      padding: 12px 16px;
      display: flex;
      justify-content: space-between;
    }
    
    .post-actions-left {
      display: flex;
      gap: 16px;
    }
    
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      border-top: 1px solid #dbdbdb;
      display: flex;
      justify-content: space-around;
      padding: 10px 0;
      z-index: 100;
    }
    
    .nav-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: #262626;
      gap: 4px;
    }
    
    .nav-label {
      font-size: 12px;
      color: #262626;
    }
    
    .nav-icon {
      width: 24px;
      height: 24px;
    }

    @media (max-width: 600px) {
      .app-container {
        border: none;
      }
    }
  </style>
</head>
<body>
  <div class="app-container">
    <header class="header">
      <div class="logo">Photogram</div>
      <div class="header-icons">
        <svg aria-label="New post" class="nav-icon" viewBox="0 0 24 24">
          <path d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455" y1="12.001" y2="12.001"/>
          <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003" y1="6.545" y2="17.455"/>
        </svg>
        <svg aria-label="Notifications" class="nav-icon" viewBox="0 0 24 24">
          <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"/>
        </svg>
      </div>
    </header>

    <div class="feed">
      <div class="post">
        <div class="post-header">
          <div class="post-user">
            <img class="post-avatar" src="/api/placeholder/32/32" alt="User avatar">
            <span class="post-username">username</span>
          </div>
          <svg aria-label="More options" class="nav-icon" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="1.5"/>
            <circle cx="6" cy="12" r="1.5"/>
            <circle cx="18" cy="12" r="1.5"/>
          </svg>
        </div>
        <img class="post-image" src="/api/placeholder/600/600" alt="Post image">
        <div class="post-actions">
          <div class="post-actions-left">
            <svg aria-label="Like" class="nav-icon" viewBox="0 0 24 24">
              <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"/>
            </svg>
            <svg aria-label="Comment" class="nav-icon" viewBox="0 0 24 24">
              <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"/>
            </svg>
            <svg aria-label="Share" class="nav-icon" viewBox="0 0 24 24">
              <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"/>
              <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"/>
            </svg>
          </div>
          <svg aria-label="Save" class="nav-icon" viewBox="0 0 24 24">
            <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          </svg>
        </div>
      </div>
    </div>

    <nav class="bottom-nav">
      <a href="#" class="nav-item">
        <svg aria-label="Home" class="nav-icon" viewBox="0 0 24 24">
          <path d="M9.005 16.545a2.997 2.997 0 012.997-2.997h0A2.997 2.997 0 0115 16.545V22h7V11.543L12 2 2 11.543V22h7.005z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"/>
        </svg>
        <span class="nav-label">Home</span>
      </a>
      
      <a href="#" class="nav-item">
        <svg aria-label="Search" class="nav-icon" viewBox="0 0 24 24">
          <path d="M19 10.5A8.5 8.5 0 1110.5 2a8.5 8.5 0 018.5 8.5z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22" y1="16.511" y2="22"/>
        </svg>
        <span class="nav-label">Search</span>
      </a>
      
      <a href="#" class="nav-item">
        <svg aria-label="New post" class="nav-icon" viewBox="0 0 24 24">
          <path d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455" y1="12.001" y2="12.001"/>
          <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003" y1="6.545" y2="17.455"/>
        </svg>
        <span class="nav-label">Create</span>
      </a>
      
      <a href="#" class="nav-item">
        <svg aria-label="Reels" class="nav-icon" viewBox="0 0 24 24">
          <path d="M2.049 7.002H21.95" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <path d="M13.504 2.001L16.362 7.002" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <path d="M7.207 2.11L10.002 7.002" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <path d="M2 12.001v3.449c0 2.849.698 4.006 1.606 4.945.94.908 2.098 1.607 4.946 1.607h6.896c2.848 0 4.006-.699 4.946-1.607.908-.939 1.606-2.096 1.606-4.945V8.552c0-2.848-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552v3.449z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <path d="M9.763 17.664a.908.908 0 01-.454-.787V11.63a.909.909 0 011.364-.788l4.545 2.624a.909.909 0 010 1.575l-4.545 2.624a.91.91 0 01-.91 0z" fill-rule="evenodd"/>
        </svg>
        <span class="nav-label">Reels</span>
      </a>
      
      <a href="#" class="nav-item">
        <svg aria-label="Profile" class="nav-icon" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="9.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <circle cx="12" cy="10" r="3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <path d="M18.5 20.5c-.5-2.796-2.898-5-6.5-5s-6 2.204-6.5 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        </svg>
        <span class="nav-label">Profile</span>
      </a>
    </nav>
  </div>
</body>
</html>