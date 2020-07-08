#!/bin/sh

git filter-branch --env-filter '

CORRECT_NAME="miiy"
CORRECT_EMAIL="miiy@users.noreply.github.com"

    export GIT_COMMITTER_NAME="$CORRECT_NAME"
    export GIT_COMMITTER_EMAIL="$CORRECT_EMAIL"
    export GIT_AUTHOR_NAME="$CORRECT_NAME"
    export GIT_AUTHOR_EMAIL="$CORRECT_EMAIL"
' --tag-name-filter cat -- --branches --tags

