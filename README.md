## Project Name: Task Management API with JWT Authentication
Description: Create a RESTful API for managing tasks with JWT authentication. The API should allow users to register, login, create, read, update, and delete tasks. Tasks should belong to specific users, and users should only be able to access, modify, and delete their own tasks.

## Usage
Tech Stack: Laravel, MySQL, JWT Authentication, PHPUnit

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install or composer update`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan serve`


### API Endpoints
- Auth
	- `Register:(Method- POST) http://127.0.0.1:8000/api/v1/auth/register`
	- `Login:(Method- POST) http://127.0.0.1:8000/api/v1/auth/login`
	- `Refresh:(Method- POST) http://127.0.0.1:8000/api/v1/auth/refresh`
	- `Profile:(Method- GET) http://127.0.0.1:8000/api/v1/auth/profile`
	- `Logout:(Method- POST) http://127.0.0.1:8000/api/v1/auth/logout`

- Task
	- `Read:(Method- GET) http://127.0.0.1:8000/api/v1/tasks`
	- `Store:(Method- POST) http://127.0.0.1:8000/api/v1/task`
	- `Update:(Method- POST) http://127.0.0.1:8000/api/v1/task/1`
	- `Delete:(Method- Delete) http://127.0.0.1:8000/api/v1/task/2`
