# PowerShell Deployment Script for Magic of Skills
# This script syncs local files to the production server

# Server Configuration
$SERVER_HOST = "82.180.142.217"
$SERVER_PORT = "65002"
$SERVER_USER = "u954141192"
$SERVER_PATH = "/home/u954141192/domains/magicofskills.com/public_html"
$LOCAL_PATH = Get-Location

Write-Host "========================================" -ForegroundColor Yellow
Write-Host "  Magic of Skills - Deployment Script" -ForegroundColor Yellow
Write-Host "========================================" -ForegroundColor Yellow
Write-Host ""

# Function to deploy files using SCP
function Deploy-Files {
    Write-Host "Starting deployment..." -ForegroundColor Yellow
    Write-Host ""
    
    # Get all files excluding common ignore patterns
    $files = Get-ChildItem -Path $LOCAL_PATH -Recurse -File | 
        Where-Object {
            $_.FullName -notmatch '\.git' -and
            $_.FullName -notmatch 'node_modules' -and
            $_.FullName -notmatch 'vendor' -and
            $_.FullName -notmatch '\.DS_Store' -and
            $_.FullName -notmatch '\.log$' -and
            $_.FullName -notmatch '\.env$' -and
            $_.FullName -notmatch 'composer\.lock' -and
            $_.FullName -notmatch 'package-lock\.json' -and
            $_.FullName -notmatch 'yarn\.lock' -and
            $_.FullName -notmatch '\.idea' -and
            $_.FullName -notmatch '\.vscode'
        }
    
    $count = 0
    $total = $files.Count
    
    foreach ($file in $files) {
        $count++
        $relativePath = $file.FullName.Substring($LOCAL_PATH.Path.Length + 1)
        $remotePath = "$SERVER_PATH/$relativePath".Replace('\', '/')
        
        Write-Progress -Activity "Deploying files" -Status "$relativePath" -PercentComplete (($count / $total) * 100)
        
        # Create directory structure on server if needed
        $remoteDir = Split-Path $remotePath -Parent
        $remoteDir = $remoteDir.Replace('\', '/')
        
        # Use scp to copy file
        $scpCommand = "scp -P $SERVER_PORT `"$($file.FullName)`" ${SERVER_USER}@${SERVER_HOST}:`"$remotePath`""
        
        try {
            Invoke-Expression $scpCommand
            Write-Host "✓ $relativePath" -ForegroundColor Green
        }
        catch {
            Write-Host "✗ Failed: $relativePath" -ForegroundColor Red
        }
    }
    
    Write-Progress -Activity "Deploying files" -Completed
    Write-Host ""
    Write-Host "✓ Deployment completed!" -ForegroundColor Green
}

# Function to deploy specific files
function Deploy-Specific {
    param([string[]]$Files)
    
    Write-Host "Deploying specific files..." -ForegroundColor Yellow
    Write-Host ""
    
    foreach ($file in $Files) {
        if (Test-Path $file) {
            Write-Host "Deploying: $file" -ForegroundColor Yellow
            $relativePath = (Resolve-Path $file).Path.Substring($LOCAL_PATH.Path.Length + 1)
            $remotePath = "$SERVER_PATH/$relativePath".Replace('\', '/')
            
            $scpCommand = "scp -P $SERVER_PORT -r `"$file`" ${SERVER_USER}@${SERVER_HOST}:`"$remotePath`""
            
            try {
                Invoke-Expression $scpCommand
                Write-Host "✓ $file deployed successfully" -ForegroundColor Green
            }
            catch {
                Write-Host "✗ Failed to deploy $file" -ForegroundColor Red
            }
        }
        else {
            Write-Host "✗ File not found: $file" -ForegroundColor Red
        }
    }
}

# Main execution
if ($args[0] -eq "--specific" -or $args[0] -eq "-s") {
    if ($args.Count -lt 2) {
        Write-Host "Error: Please specify files to deploy" -ForegroundColor Red
        Write-Host "Usage: .\deploy.ps1 --specific file1.php file2.php directory\" -ForegroundColor Yellow
        exit 1
    }
    $filesToDeploy = $args[1..($args.Count - 1)]
    Deploy-Specific -Files $filesToDeploy
}
else {
    Write-Host "This will replace files on the server with your local files." -ForegroundColor Yellow
    Write-Host "Server: ${SERVER_USER}@${SERVER_HOST}:${SERVER_PATH}" -ForegroundColor Yellow
    Write-Host ""
    $confirm = Read-Host "Are you sure you want to continue? (yes/no)"
    
    if ($confirm -eq "yes" -or $confirm -eq "y") {
        Deploy-Files
    }
    else {
        Write-Host "Deployment cancelled." -ForegroundColor Yellow
    }
}

