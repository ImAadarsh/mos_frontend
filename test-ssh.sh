#!/bin/bash

# Test SSH connection script
# Usage: ./test-ssh.sh

SERVER_HOST="82.180.142.217"
SERVER_PORT="65002"
SERVER_USER="u954141192"
SSH_KEY="$HOME/.ssh/id_ed25519_github_deploy"

echo "Testing SSH connection..."
echo ""

# Test with SSH key
if [ -f "$SSH_KEY" ]; then
    echo "Testing with SSH key: $SSH_KEY"
    ssh -p $SERVER_PORT -i $SSH_KEY -o ConnectTimeout=10 $SERVER_USER@$SERVER_HOST "echo 'SSH key authentication successful!' && pwd && ls -la | head -5"
    
    if [ $? -eq 0 ]; then
        echo ""
        echo "✓ SSH key authentication works!"
        echo "You can now deploy without entering password."
    else
        echo ""
        echo "✗ SSH key authentication failed. Will use password authentication."
    fi
else
    echo "SSH key not found at: $SSH_KEY"
    echo "Testing password authentication..."
    ssh -p $SERVER_PORT -o ConnectTimeout=10 $SERVER_USER@$SERVER_HOST "echo 'Password authentication test'"
fi

