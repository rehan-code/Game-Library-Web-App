Research for CI/CD by Nour Tayem & Thulasi Jothiravi

## Resources:
https://docs.gitlab.com/ee/ci/quick_start/index.html
https://www.youtube.com/watch?v=mnYbOrj-hLY
https://www.youtube.com/watch?v=qP8kir2GUgo



## What is GitLab CI/CD?
GitLab CI/CD is essential in automating software development and deployment by creating pipelines in the GitLab repository for building, testing, and deploying applications.


## 2. CI/CD Overall

In the CI/CD sequence, code modifications lead to testing, building, and VM release. Automation is achieved through GitLab pipelines, activated by events such as code merges. The pipeline outlines the process, covering tests, building, packaging, and deployment to a server.



## 3. Pipeline Creation OPTION 1: Creating a YAML file

Define your GitLab pipeline with a YAML file (.gitlab-ci.yml) at the repository's root. This file outlines stages and jobs, where jobs specify actions (like testing or deploying) organized into stages for sequential execution.

Upon adding the .gitlab-ci.yml file, this should trigger the pipeline to run automatically during different events such as code merges.


## 4. Pipeline Creation OPTION 2: Creating the Pipeline on GitLab

To create the pipeline, navigate to 'Build' --> Pipelines in the GitLab menu and select 'Create new CI/CD pipeline'. This will generate a basic pipeline template which you can then customize for your project

Upon creating a pipeline, navigate to 'Build' --> Pipelines in the GitLab menu and select 'Run pipeline' to execute pipeline.


## 5. YAML Structure and Template

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


## 6. Build, Test, and Deploy Stages Explained

# Build Stage

If requires, compile source code into executable programs or scripts, constructing the application.

# Test Stage

CI/CD pipeline runs automated tests, including unit and integration tests as instructed in the YAML file, ensuring code behaves as intended. Crucial for maintaining code quality and preventing disruptions to existing functionality.

# Deploy Stage

Transfers the built application to a server or production environment. Involves actions such as script execution for environment setup. Modern workflows often deploy to cloud services or container platforms like Kubernetes and Docker.

