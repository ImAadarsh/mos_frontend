<?php
/**
 * PHP Deployment Script for Magic of Skills
 * This script syncs local files to the production server
 * 
 * Usage: php deploy.php [--specific file1.php file2.php]
 */

// Server Configuration
define('SERVER_HOST', '82.180.142.217');
define('SERVER_PORT', '65002');
define('SERVER_USER', 'u954141192');
define('SERVER_PATH', '/home/u954141192/domains/magicofskills.com/public_html');
define('LOCAL_PATH', __DIR__);

// Colors for terminal output
class Colors {
    const GREEN = "\033[0;32m";
    const RED = "\033[0;31m";
    const YELLOW = "\033[1;33m";
    const NC = "\033[0m"; // No Color
}

echo Colors::YELLOW . "========================================" . Colors::NC . "\n";
echo Colors::YELLOW . "  Magic of Skills - Deployment Script" . Colors::NC . "\n";
echo Colors::YELLOW . "========================================" . Colors::NC . "\n\n";

/**
 * Deploy all files using rsync
 */
function deployAllFiles() {
    echo Colors::YELLOW . "Starting deployment..." . Colors::NC . "\n\n";
    
    $excludes = [
        '.git',
        '.gitignore',
        '.DS_Store',
        'node_modules',
        'vendor',
        '*.log',
        '.env',
        '.env.local',
        'composer.lock',
        'package-lock.json',
        'yarn.lock',
        '.idea',
        '.vscode',
        '*.swp',
        '*.swo',
        '*~',
        'deploy.sh',
        'deploy.ps1',
        'deploy.php'
    ];
    
    $excludeArgs = '';
    foreach ($excludes as $exclude) {
        $excludeArgs .= " --exclude='" . escapeshellarg($exclude) . "'";
    }
    
    $command = sprintf(
        'rsync -avz --progress -e "ssh -p %s" %s %s %s@%s:%s',
        SERVER_PORT,
        $excludeArgs,
        escapeshellarg(LOCAL_PATH . '/'),
        SERVER_USER,
        SERVER_HOST,
        SERVER_PATH
    );
    
    echo "Executing: rsync command...\n\n";
    passthru($command, $returnCode);
    
    if ($returnCode === 0) {
        echo "\n" . Colors::GREEN . "✓ Deployment completed successfully!" . Colors::NC . "\n";
        return true;
    } else {
        echo "\n" . Colors::RED . "✗ Deployment failed!" . Colors::NC . "\n";
        return false;
    }
}

/**
 * Deploy specific files
 */
function deploySpecificFiles($files) {
    echo Colors::YELLOW . "Deploying specific files..." . Colors::NC . "\n\n";
    
    foreach ($files as $file) {
        $filePath = LOCAL_PATH . '/' . $file;
        
        if (!file_exists($filePath)) {
            echo Colors::RED . "✗ File not found: $file" . Colors::NC . "\n";
            continue;
        }
        
        echo Colors::YELLOW . "Deploying: $file" . Colors::NC . "\n";
        
        $remotePath = SERVER_PATH . '/' . $file;
        $command = sprintf(
            'scp -P %s -r %s %s@%s:%s',
            SERVER_PORT,
            escapeshellarg($filePath),
            SERVER_USER,
            SERVER_HOST,
            escapeshellarg($remotePath)
        );
        
        exec($command, $output, $returnCode);
        
        if ($returnCode === 0) {
            echo Colors::GREEN . "✓ $file deployed successfully" . Colors::NC . "\n";
        } else {
            echo Colors::RED . "✗ Failed to deploy $file" . Colors::NC . "\n";
        }
    }
}

// Main execution
$args = array_slice($argv, 1);

if (isset($args[0]) && ($args[0] === '--specific' || $args[0] === '-s')) {
    if (count($args) < 2) {
        echo Colors::RED . "Error: Please specify files to deploy" . Colors::NC . "\n";
        echo "Usage: php deploy.php --specific file1.php file2.php directory/\n";
        exit(1);
    }
    $filesToDeploy = array_slice($args, 1);
    deploySpecificFiles($filesToDeploy);
} else {
    echo Colors::YELLOW . "This will replace files on the server with your local files." . Colors::NC . "\n";
    echo Colors::YELLOW . "Server: " . SERVER_USER . "@" . SERVER_HOST . ":" . SERVER_PATH . Colors::NC . "\n\n";
    echo "Are you sure you want to continue? (yes/no): ";
    
    $handle = fopen("php://stdin", "r");
    $confirm = trim(fgets($handle));
    fclose($handle);
    
    if (strtolower($confirm) === 'yes' || strtolower($confirm) === 'y') {
        deployAllFiles();
    } else {
        echo Colors::YELLOW . "Deployment cancelled." . Colors::NC . "\n";
    }
}

