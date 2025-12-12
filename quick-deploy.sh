#!/bin/bash

# Quick deploy script - finds recent files and deploys them
# Usage: ./quick-deploy.sh [hours]

HOURS=${1:-1}

echo "Finding files modified in the last $HOURS hour(s)..."

# Find and deploy recent files
RECENT_FILES=$(find . -type f -mmin -$((HOURS * 60)) \
    ! -path './.git/*' \
    ! -path './node_modules/*' \
    ! -path './vendor/*' \
    ! -path './.idea/*' \
    ! -path './.vscode/*' \
    ! -name '*.log' \
    ! -name '.DS_Store' \
    ! -name '*.swp' \
    ! -name '*.swo' \
    ! -name '*~' \
    ! -name 'comploy.lock' \
    ! -name 'package-lock.json' \
    ! -name 'yarn.lock' \
    ! -name '.env' \
    ! -name 'deploy*.sh' \
    ! -name 'deploy*.php' \
    ! -name 'deploy*.ps1' \
    ! -name 'DEPLOYMENT.md' \
    2>/dev/null | sed 's|^\./||' | sort | tr '\n' ' ')

if [ -z "$RECENT_FILES" ]; then
    echo "No files modified in the last $HOURS hour(s)."
    exit 0
fi

echo "Deploying files..."
./deploy.sh --specific $RECENT_FILES

