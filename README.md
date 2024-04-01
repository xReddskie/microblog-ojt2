<h1 align="center">HiPE OJT2 Microblog Web Application</h1>
<h3 align="center">GitHub Repository for the Microblog Web Application developed by HiPE OJT2</h3>

<h3 align="center">Languages and Tools:</h3>
<p align="center"> <a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> </a> <a href="https://www.docker.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original-wordmark.svg" alt="docker" width="40" height="40"/> </a> <a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-plain-wordmark.svg" alt="laravel" width="40" height="40"/> </a> <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://nodejs.org" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original-wordmark.svg" alt="nodejs" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> </p>


# Dockerization (Ubuntu)

Microblog Project Dockerization


## Installation

Requirements

```bash
Docker Desktop
Ubuntu/WSL - local terminal: wsl --install -d Ubuntu

Note:
Must enable ubuntu in Docker Desktop Settings
-> Settings -> Resources -> WSL Integration -> Check Ubuntu -> Apply and Restart

```
    
## Deployment

To deploy this project run
```bash
Ubuntu cmd:

- mkdir <project-name>
- cd <project-name>
- code .
```
```bash
Vscode terminal(bash):

- git init
- git clone -b dev https://github.com/XPERIA679/OJT1-Microblog
- cd OJT1-Microblog
- sudo apt install make
- make build 
- make permissions
-> uncomment node service in docker-compose.yml
- make down-up
- make vendor
-> configure your .env file
- make migrate
```
DONE!
## Authors

- [@xReddskie](https://www.github.com/xReddskie)
- [@XPERIA679](https://www.github.com/XPERIA679)
