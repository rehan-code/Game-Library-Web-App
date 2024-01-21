# Project Title : W24 CIS*4250 Team 8 Sprint 1

## Authors
 Harir Al-Rubaye, 

# Contents of this file
 * Description
 * Visuals
 * Requirements
 * Installation 
 * Usage (Local Development)

## Description
We have a team VM hosted on a SoCS server. The Debian Linux VM has NGINX, PHP,
and MySQL installed. The web server is configured and is already running with HTTPS
enabled. The website PHP directory is /var/www/html

The website includes: 
1. Landing Page
2. About Us Page. 

## Requirements 

### To run in local development 
1. install Docker engine: https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository
2. install Docker Desktop: https://www.docker.com/products/docker-desktop/

## Installation
1. Go to the page of the repository that you want to clone (sprint-1 branch) 
2. Click on “Clone or download” and copy the URL.
3. Use the git clone command along with the copied URL from earlier.
4. Run the following on the command line: 

```
$ git clone --branch sprint-1 https://github.com/USERNAME/REPOSITORY
```
5. Press Enter.

## Usage (Local Development)
1. pull branch sprint-1-docker-setup
2. Make sure your docker engine is running (by launching docker)
3. run: `make` which will run the `docker compose up` and nginx/php will run on localhost:8000
4. run: `make down`: which will run `docker compose down` and close the docker enviroment 

 * Access the web application at the following URL: http://localhost:8000/