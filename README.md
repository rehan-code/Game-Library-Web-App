# W24 CIS*4250 Team 8 Sprint 1

## Authors
 Harir Al-Rubaye, Nour Tayem, Thulasi Jothiravi, Rehan Nagoor Mohideen, Harikrishan Singh, and Ivan Odiel Magtangob 

## Contents of this file
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
1. pull branch sprint-1
2. Make sure your docker engine is running (by launching docker)
3. run: `make` which will run the `docker compose up` and nginx/php will run on localhost:8000
4. run: `make down`: which will run `docker compose down` and close the docker enviroment 

 * Access the web application at the following URL: http://localhost:8000/


## Additional Research

### Continuous Integration and Continuous Deployment (CI/CD)
Research for CI/CD by Nour Tayem & Thulasi Jothiravi

#### Resources:
1. https://docs.gitlab.com/ee/ci/quick_start/index.html
1. https://www.youtube.com/watch?v=mnYbOrj-hLY
1. https://www.youtube.com/watch?v=qP8kir2GUgo
1. https://www.youtube.com/watch?v=tQy0O1EGixs



#### 1. What is GitLab CI/CD?
GitLab CI/CD is essential in automating software development and deployment by creating pipelines in the GitLab repository for building, testing, and deploying applications.


#### 2. CI/CD Overall

In the CI/CD sequence, code modifications lead to testing, building, and VM release. Automation is achieved through GitLab pipelines, activated by events such as code merges. The pipeline outlines the process, covering tests, building, packaging, and deployment to a server.



#### 3. Pipeline Creation OPTION 1: Creating a YAML file

Define your GitLab pipeline with a YAML file (.gitlab-ci.yml) at the repository's root. This file outlines stages and jobs, where jobs specify actions (like testing or deploying) organized into stages for sequential execution.

Upon adding the .gitlab-ci.yml file, this should trigger the pipeline to run automatically during different events such as code merges.


#### 4. Pipeline Creation OPTION 2: Creating the Pipeline on GitLab

To create the pipeline, navigate to 'Build' --> Pipelines in the GitLab menu and select 'Create new CI/CD pipeline'. This will generate a basic pipeline template which you can then customize for your project

Upon creating a pipeline, navigate to 'Build' --> Pipelines in the GitLab menu and select 'Run pipeline' to execute pipeline.


#### 5. Basic YAML Structure and Template

The structure of the .gitlab-ci.yml file is commonly as follows:

image: python
stages:
  - build
  - test
  - deploy

build_job:
  stage: build
  script:
    - echo "Building the application..."

test_job:
  stage: test
  script:
    - echo "Running tests..."

deploy_job:
  stage: deploy
  script:
    - echo "Deploying to server..."


#### 6. How to Configure CI/CD

To add tests to a CI/CD pipeline in GitLab, first, you'll edit the .gitlab-ci.yml file in your project's root directory. 

This file is where you define the stages of your pipeline, such as building, testing, and deploying. 

Example configuration in YAML file (.gitlab-ci.yml):

```
stages:
  - build
  - lint
  - test
  - staging
  - production
```



Within this file, you'll create specific 'jobs' for each test under the 'test' stage.


Example configuration in YAML file (.gitlab-ci.yml):

```
test_server:
  stage: test
  script:
    - cd ./backend
    - npm install
    - npm run test # runs the test script in package.json to run the tests
  dependencies:
    - lint_server
  allow_failure: false
```


Note: You can take advantage of GitLab's built-in templates for common test types or develop your own scripts for more specific tests. Remember to create artifacts for sharing data across jobs and stages. This approach effortlessly includes your tests into the CI/CD workflow, guaranteeing that your code is immediately tested every time it is committed to the repository. This can help you during code reviews and also improve code quality and stability.

A good resource to support you with this: https://www.youtube.com/watch?v=tQy0O1EGixs 



#### 7. Build, Test, and Deploy Stages Explained

##### Build Stage

If requires, compile source code into executable programs or scripts, constructing the application.

##### Test Stage

CI/CD pipeline runs automated tests, including unit and integration tests as instructed in the YAML file, ensuring code behaves as intended. Crucial for maintaining code quality and preventing disruptions to existing functionality.

##### Deploy Stage

Transfers the built application to a server or production environment. Involves actions such as script execution for environment setup. Modern workflows often deploy to cloud services or container platforms like Kubernetes and Docker.

