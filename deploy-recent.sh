#!/bin/bash

# Script to find recently changed files and generate deploy command
# Usage: ./deploy-recent.sh [hours] [--execute]

HOURS=${1:-1}  # Default to 1 hour if not specified
EXECUTE=${2:-""}  # Check if --execute flag is set

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${YELLOW}Finding files modified in the last $HOURS hour(s)...${NC}"
echo ""

# Find files modified in the last N hours, excluding common directories/files
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
    ! -name 'composer.lock' \
    ! -name 'package-lock.json' \
    ! -name 'yarn.lock' \
    ! -name '.env' \
    ! -name '.env.local' \
    ! -name 'deploy.sh' \
    ! -name 'deploy.ps1' \
    ! -name 'deploy.php' \
    ! -name 'deploy-recent.sh' \
    ! -name 'DEPLOYMENT.md' \
    2>/dev/null | sed 's|^\./||' | sort)

if [ -z "$RECENT_FILES" ]; then
    echo -e "${YELLOW}No files modified in the last $HOURS hour(s).${NC}"
    exit 0
fi

# Count files
FILE_COUNT=$(echo "$RECENT_FILES" | wc -l | tr -d ' ')
echo -e "${GREEN}Found $FILE_COUNT file(s) modified in the last $HOURS hour(s):${NC}"
echo ""

# Display files
echo "$RECENT_FILES" | while IFS= read -r file; do
    if [ -n "$file" ]; then
        MOD_TIME=$(stat -f "%Sm" -t "%Y-%m-%d %H:%M:%S" "$file" 2>/dev/null || stat -c "%y" "$file" 2>/dev/null | cut -d'.' -f1)
        echo -e "  ${BLUE}•${NC} $file ${YELLOW}($MOD_TIME)${NC}"
    fi
done

echo ""
echo -e "${YELLOW}Generated deploy command:${NC}"
echo ""

# Build the command
DEPLOY_CMD="./deploy.sh --specific"
FILE_LIST=""

while IFS= read -r file; do
    if [ -n "$file" ]; then
        FILE_LIST="$FILE_LIST \"$file\""
    fi
done <<< "$RECENT_FILES"

FULL_CMD="$DEPLOY_CMD$FILE_LIST"

echo -e "${GREEN}$FULL_CMD${NC}"
echo ""

# Copy to clipboard if available
if command -v pbcopy &> /dev/null; then
    echo "$FULL_CMD" | pbcopy
    echo -e "${GREEN}✓ Command copied to clipboard!${NC}"
elif command -v xclip &> /dev/null; then
    echo "$FULL_CMD" | xclip -selection clipboard
    echo -e "${GREEN}✓ Command copied to clipboard!${NC}"
fi

# Execute if --execute flag is set
if [ "$EXECUTE" == "--execute" ] || [ "$EXECUTE" == "-e" ]; then
    echo ""
    read -p "Execute deployment now? (yes/no): " confirm
    if [ "$confirm" == "yes" ] || [ "$confirm" == "y" ]; then
        echo ""
        eval "$FULL_CMD"
    else
        echo -e "${YELLOW}Deployment cancelled.${NC}"
    fi
fi

