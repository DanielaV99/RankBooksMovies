# Ranker

## Installation

### Prerequisites

- If you want to install the project on your local OS:
    - [PHP >7.3](https://www.php.net/)
    - [Composer](https://getcomposer.org/download/) (Dependency manager for PHP)
    - [MySQL](https://dev.mysql.com/downloads/)
- If you want to use Docker:
    - [Docker Desktop](https://www.docker.com/products/docker-desktop)

### Setup

- Unpack the code in a folder
- Open terminal and go to that folder `cd ./path/to/your/folder`
- Run the following command:
    - If you use local installation:
      ```
      composer install
      ```
    - If you use Docker: (It might take a few minutes the first time you start the project, to install all dependencies) 
      ```
      ./vendor/bin/sail up -d
      ```
- Run these commands only once: (They create the database tables and add dummy data)
    - If you use local installation:
      ```
      php artisan migrate
      php artisan db:seed
      ```
    - If you use Docker: (It might take a few minutes the first time you start the project, to install all dependencies)
      ```
      ./vendor/bin/sail artisan migrate
      ./vendor/bin/sail artisan db:seed
      ```
- To start the web server:
    - If you use local installation:
      ```
      php artisan serve
      ```
      Go to this link: [http://127.0.0.1:8000/rank-items](http://127.0.0.1:8000/rank-items)
    - If you use Docker:
      
      Go to this link: [http://localhost/](http://localhost/)


### Dummy data

You can access the app with the following users:
- Admin user
```
email: demo.admin@example.com
password: password
```
- Normal user
```
email: demo.user@example.com
password: password
```
