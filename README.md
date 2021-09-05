# Ranker

## Installation

### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop)

### Setup

- Unpack the code in a folder
- Open terminal and go to that folder `cd ./path/to/your/folder`
- Run the following command: (It might take a few minutes the first time you start the project, to install all dependencies)
```
./vendor/bin/sail up -d
```
- Run these commands: (They create the database tables and add dummy data)
```
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```
- Go to this link: [http://localhost/](http://localhost/)

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
