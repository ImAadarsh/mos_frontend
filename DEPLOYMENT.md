# Deployment Scripts for Magic of Skills

This directory contains deployment scripts to sync your local files to the production server.

## Available Scripts

1. **deploy.sh** - Bash script (macOS/Linux)
2. **deploy.ps1** - PowerShell script (Windows)
3. **deploy.php** - PHP script (Cross-platform)

## Prerequisites

- SSH access to the server
- Password: `1@Aadarsh`
- SSH client installed on your system

## Server Information

- **Host:** 82.180.142.217
- **Port:** 65002
- **User:** u954141192
- **Path:** /home/u954141192/domains/magicofskills.com/public_html

## Usage

### Option 1: Deploy All Files (Bash - macOS/Linux)

```bash
./deploy.sh
```

### Option 2: Deploy All Files (PowerShell - Windows)

```powershell
.\deploy.ps1
```

### Option 3: Deploy All Files (PHP - Cross-platform)

```bash
php deploy.php
```

### Deploy Specific Files

To deploy only specific files or directories:

**Bash:**
```bash
./deploy.sh --specific index.php include/header.php courses.php
```

**PowerShell:**
```powershell
.\deploy.ps1 --specific index.php include/header.php courses.php
```

**PHP:**
```bash
php deploy.php --specific index.php include/header.php courses.php
```

## What Gets Excluded

The scripts automatically exclude:
- `.git` directory and git files
- `node_modules` directory
- `vendor` directory
- `.env` files
- Log files (`.log`)
- Lock files (`composer.lock`, `package-lock.json`, etc.)
- IDE files (`.idea`, `.vscode`)
- Temporary files (`.swp`, `.swo`, `*~`)
- `.DS_Store` files

## Security Note

⚠️ **Important:** The password is hardcoded in the scripts. For production use, consider:
1. Using SSH keys instead of passwords
2. Using environment variables for sensitive data
3. Using a deployment service (GitHub Actions, GitLab CI, etc.)

## First-Time Setup (SSH Keys - Recommended)

To avoid entering password each time:

1. Generate SSH key (if you don't have one):
```bash
ssh-keygen -t rsa -b 4096
```

2. Copy your public key to the server:
```bash
ssh-copy-id -p 65002 u954141192@82.180.142.217
```

3. Enter password when prompted: `1@Aadarsh`

After this, you won't need to enter the password anymore.

## Troubleshooting

### Permission Denied
Make sure the script has execute permissions:
```bash
chmod +x deploy.sh
```

### rsync not found (Bash script)
Install rsync:
```bash
# macOS
brew install rsync

# Linux (Ubuntu/Debian)
sudo apt-get install rsync

# Linux (CentOS/RHEL)
sudo yum install rsync
```

### Connection Timeout
- Check your internet connection
- Verify the server IP and port are correct
- Check if your firewall allows SSH connections

## Example Workflow

1. Make changes to your local files
2. Test locally
3. Run deployment script:
   ```bash
   ./deploy.sh
   ```
4. Enter `yes` when prompted
5. Wait for deployment to complete
6. Verify changes on the live site

