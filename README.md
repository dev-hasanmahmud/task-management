## Project Name: Task Management API with JWT Authentication
Description: Create a RESTful API for managing tasks with JWT authentication. The API should allow users to register, login, create, read, update, and delete tasks. Tasks should belong to specific users, and users should only be able to access, modify, and delete their own tasks.

## Usage
Tech Stack:
Laravel (latest version)
MySQL or SQLite for database
JWT Authentication
PHPUnit or Laravel Dusk for testing

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install or composer update`
- Run `php artisan key:generate`
- Run `php artisan migrate`


### API Endpoints
- Auth
	`Register:(Method- POST) https://w3insiders.com/task-management/public/api/v1/auth/register`
	`Login:(Method- POST) https://w3insiders.com/task-management/public/api/v1/auth/login`
	`Refresh:(Method- POST) https://w3insiders.com/task-management/public/api/v1/auth/refresh`
	`Profile:(Method- GET) https://w3insiders.com/task-management/public/api/v1/auth/profile`
	`Logout:(Method- POST) https://w3insiders.com/task-management/public/api/v1/auth/logout`

- Task
	`Read:(Method- GET) https://w3insiders.com/task-management/public/api/v1/tasks`
	`Store:(Method- POST) https://w3insiders.com/task-management/public/api/v1/task`
	`Update:(Method- POST) https://w3insiders.com/task-management/public/api/v1/task/1`
	`Delete:(Method- Delete) https://w3insiders.com/task-management/public/api/v1/task/2`
