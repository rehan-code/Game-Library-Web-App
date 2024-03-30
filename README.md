# W24 CIS*4250 Team 8 Sprint 8
Team Lead: Ivan Odiel Magtangob

## Authors
 Harir Al-Rubaye, Nour Tayem, Thulasi Jothiravi, Rehan Nagoor Mohideen, Harikrishan Singh, and Ivan Odiel Magtangob

## Contents of this file
 * [Description](#whats-new-in-sprint-8)
 * [Requirements](#requirements)
 * [Installation](#installation)
 * [Usage (Local Development)](#usage-local-development)


## What's [NEW] in Sprint 9
 Below are the breakdown's details for sprint 9:

1. Cyber Coin Game: 
- Question Expansion: we added 20 new questions to each theme
- Question Randomization
- Leadership Board: introduced a leaderboard to display top scores, fostering a competitive environment.
- Timer Addition: added a timer to add challenge and pace to the game
- UI Updates: Updated the user interface


2. Cryptogram Game:
- Content Update: Added new messages
- UI Enhancements: Updated the UI to provide feedback on incorrect guesses
- Fixed Mismatched Hints: corrected mismatched hints for a smoother user experience.

3. New Game Development: we developed a new game, Slide Puzzle


## Requirements

### To run in local development
1. Install Docker engine: https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository
2. Install Docker Desktop: https://www.docker.com/products/docker-desktop/

## Installation
1. Go to the page of the repository that you want to clone (sprint-2 branch)
2. Click on “Clone or download” and copy the URL.
3. Use the git clone command along with the copied URL from earlier.
4. Run the following on the command line:

```
$ git clone --branch sprint-2 https://github.com/USERNAME/REPOSITORY
```
5. Press Enter.

## Usage (Local Development)
1. Pull branch sprint-2
2. Make sure your docker engine is running (by launching docker)
3. Run: `make` which will run the `docker compose up` and nginx/php will run on localhost:8000
4. Run: `make down`: which will run `docker compose down` and close the docker enviroment [After you are done]

 * Access the web application at the following URL: http://localhost:8000/
