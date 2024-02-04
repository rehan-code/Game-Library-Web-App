# W24 CIS*4250 Team 8 Sprint 3

## Authors
 Harir Al-Rubaye, Nour Tayem, Thulasi Jothiravi, Rehan Nagoor Mohideen, Harikrishan Singh, and Ivan Odiel Magtangob 

## Contents of this file
 * Description
 * Visuals
 * Requirements
 * Installation 
 * Usage (Local Development)

## Description
During Sprint 3, the team focused on updating the game functionality, which was renamed to "I - Spot". Several features and improvements were implemented:

1. **New Levels**: The game now features additional levels, enhancing the gameplay experience and providing more challenges for players.

2. **Custom Images**: Visuals have been revamped with custom images, enhancing the overall aesthetic appeal and uniqueness of the game.

3. **Unit Tests**: Unit tests have been integrated into the codebase to ensure robustness and reliability, allowing for smoother development and maintenance cycles.

4. **Linting Issues**: Various linting issues were addressed and fixed, improving code quality and consistency across the project.

5. **Updated UI/Frontend**: The user interface and frontend elements, including the game over screen, have been updated for improved usability and visual coherence.

6. **Fullscreen Option**: A fullscreen option has been added to provide players with a more immersive gaming experience and greater flexibility in how they engage with the game.

These enhancements represent significant progress in refining the "I - Spot" game, making it more engaging, visually appealing, and user-friendly.

## Visuals

### Landing Page
|                  Landing Page - part 1                   |                  landing Page - part 2                   |
| :------------------------------------------------------: | :------------------------------------------------------: |
| ![Landing_Page_1](html/images/screens/landing_page1.png) | ![Landing_Page_2](html/images/screens/landing_page2.png) |

### Where's Waldo Game
|                   Game Start Page                    |                         Game Page                          |
| :--------------------------------------------------: | :--------------------------------------------------------: |
| ![starting_game](html/images/screens/start_game.png) | ![select_stage](html/images/screens/select_stage_Screen.png) |

### Stages
|                         Stage 1                         |                       Stage 2                        |
| :-----------------------------------------------------: | :--------------------------------------------------: |
| ![stage_1](html/images/screens/stage1_screen.png) | ![stage_2](html/images/screens/stage2_screen.png) |

|                         Stage 3                         |                        Game Over                        |
| :-----------------------------------------------------: | :-----------------------------------------------------: |
| ![stage_3](html/images/screens/stage3_screen.png) | ![game_over](html/images/screens/game_over_screen.png) |

### Learn More

|                   Instructions Page                   |                 About Us Page                 |
| :---------------------------------------------------: | :-------------------------------------------: |
| ![Insturctions](html/images/screens/instructions.png) | ![About_Us](html/images/screens/about_us.png) |

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


## Additional Research

### PHP_CodeSniffer for PHP Linting (CI/CD)
Research for CodeSniffer by Ivan Odiel Magtangob

#### Resources:
1. https://github.com/squizlabs/PHP_CodeSniffer
2. https://github.com/squizlabs/PHP_CodeSniffer/wiki/Configuration-Options

#### 1. What is PHP_CodeSniffer?
PHP_CodeSniffer is a set of two PHP scripts; the main `phpcs` script that tokenizes PHP, JavaScript and CSS files to
detect violations of a defined coding standard, and a second `phpcbf` script to automatically correct coding standard
violations. PHP_CodeSniffer is an essential development tool that ensures your code remains clean and consistent.

#### 2. Installation
To avoid modifying the VM, the two PHP_CodeSniffer scripts were installed into the repository using `curl`:

```
curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar
```

#### 3. Usage
To use either script:

```
phpcs /path/to/code/myfile.php
phpcbf /path/to/code/myfile.php
```

#### 4. Configuration
PHP_CodeSniffer can be further configured to ignore certain warnings, enable coloured output messages, etc.. Settings
such as these can be implemented in a `CodeSniffer.conf` file:

```
<?php
 $phpCodeSnifferConfig = array (
  'colors' => '1',
  'ignore_warnings_on_exit' => '1',
);
?>
```

Some other configuration options can also be added within the PHP files to be linted, or specified in the command
when executing the script. For example, to ignore all of a certain error:

```
phpcs --exclude=Generic.Files.LineEndings /path/to/code/myfile.php
```
