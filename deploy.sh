#!/bin/bash

# Deployment Script for Magic of Skills
# This script syncs local files to the production server

# Server Configuration
SERVER_HOST="82.180.142.217"
SERVER_PORT="65002"
SERVER_USER="u954141192"
SERVER_PATH="/home/u954141192/domains/magicofskills.com/public_html"
LOCAL_PATH="./"

# SSH Key Configuration (optional - will use default if not set)
SSH_KEY="${SSH_KEY:-$HOME/.ssh/id_ed25519_github_deploy}"
SSH_OPTS="-p $SERVER_PORT -o StrictHostKeyChecking=no -o ConnectTimeout=10"

# Check if SSH key exists and use it
if [ -f "$SSH_KEY" ]; then
    SSH_OPTS="$SSH_OPTS -i $SSH_KEY"
fi

# Colors for output
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${YELLOW}========================================${NC}"
echo -e "${YELLOW}  Magic of Skills - Deployment Script${NC}"
echo -e "${YELLOW}========================================${NC}"
echo ""

# Check if rsync is available
if ! command -v rsync &> /dev/null; then
    echo -e "${RED}Error: rsync is not installed.${NC}"
    echo "Please install rsync: brew install rsync (on macOS)"
    exit 1
fi

# Function to deploy files
deploy_files() {
    echo -e "${YELLOW}Starting deployment...${NC}"
    echo ""
    
    # Use rsync to sync files (excludes .git, node_modules, etc.)
    rsync -avz --progress \
        -e "ssh $SSH_OPTS" \
        --exclude='.git' \
        --exclude='.gitignore' \
        --exclude='.DS_Store' \
        --exclude='node_modules' \
        --exclude='vendor' \
        --exclude='*.log' \
        --exclude='.env' \
        --exclude='.env.local' \
        --exclude='composer.lock' \
        --exclude='package-lock.json' \
        --exclude='yarn.lock' \
        --exclude='.idea' \
        --exclude='.vscode' \
        --exclude='*.swp' \
        --exclude='*.swo' \
        --exclude='*~' \
        --delete \
        "$LOCAL_PATH" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH"
    
    if [ $? -eq 0 ]; then
        echo ""
        echo -e "${GREEN}✓ Deployment completed successfully!${NC}"
        return 0
    else
        echo ""
        echo -e "${RED}✗ Deployment failed!${NC}"
        return 1
    fi
}

# Function to deploy specific files/directories
deploy_specific() {
    local files="$@"
    echo -e "${YELLOW}Deploying specific files...${NC}"
    echo ""
    
    for file in $files; do
        if [ -e "$file" ]; then
            echo -e "${YELLOW}Deploying: $file${NC}"
            # Build scp command with proper SSH options
            if [ -f "$SSH_KEY" ]; then
                scp -P $SERVER_PORT -i "$SSH_KEY" -r "$file" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/$file"
            else
                scp -P $SERVER_PORT -r "$file" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/$file"
            fi
            if [ $? -eq 0 ]; then
                echo -e "${GREEN}✓ $file deployed successfully${NC}"
            else
                echo -e "${RED}✗ Failed to deploy $file${NC}"
            fi
        else
            echo -e "${RED}✗ File not found: $file${NC}"
        fi
    done
}

# Main menu
if [ "$1" == "--specific" ] || [ "$1" == "-s" ]; then
    shift
    if [ $# -eq 0 ]; then
        echo -e "${RED}Error: Please specify files to deploy${NC}"
        echo "Usage: ./deploy.sh --specific file1.php file2.php directory/"
        exit 1
    fi
    deploy_specific "$@"
else
    # Confirm before deploying
    echo -e "${YELLOW}This will replace files on the server with your local files.${NC}"
    echo -e "${YELLOW}Server: $SERVER_USER@$SERVER_HOST:$SERVER_PATH${NC}"
    echo ""
    read -p "Are you sure you want to continue? (yes/no): " confirm
    
    if [ "$confirm" == "yes" ] || [ "$confirm" == "y" ]; then
        deploy_files
    else
        echo -e "${YELLOW}Deployment cancelled.${NC}"
        exit 0
    fi
fi

