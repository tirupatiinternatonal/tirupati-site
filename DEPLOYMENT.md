# Deployment Process

This project deploys to production using cPanel Git Version Control.

## Source of truth

- `main` branch on GitHub

## Production deploy flow

1. Make code changes locally.
2. Commit and push to `main`.
3. In cPanel, open `Git Version Control`.
4. Open repository `tirupati-site`.
5. Open `Pull or Deploy` tab.
6. Click `Update from Remote`.
7. Click `Deploy HEAD Commit`.

## cPanel deployment config

- Deployment is defined in `.cpanel.yml`.
- cPanel copies files from `public_html/` in the repo to `/home/tiruinter/public_html`.

## Notes

- GitHub Actions SSH deploy workflow was removed because the hosting provider resets SSH connections from GitHub runners.
- Keep production deployment through cPanel unless hosting network policy changes.