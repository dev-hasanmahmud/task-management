## Project Name: Task Management API with JWT Authentication
Description: Create a RESTful API for managing tasks with JWT authentication. The API should allow users to register, login, create, read, update, and delete tasks. Tasks should belong to specific users, and users should only be able to access, modify, and delete their own tasks.

## Usage
Tech Stack: Laravel, MySQL, JWT Authentication, PHPUnit

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Need to setup database and mail credentials for task Notification 
- Run `composer install or composer update`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan serve`

For API test:
Auth:
- You need at first register user
- Login and get token
- Refresh token by using existing token
- Profile data get by using existing token
- Profile data update by using existing token
- User logout by using existing token

Category:
- Get all categories by using existing token
- Store category by using existing token
- Update category by using existing token
- Delete category by using existing token

Task:
- Get all tasks by using existing token
- Store task by using existing token
- Update task by using existing token
- Delete task by using existing token

### API Endpoints
- Auth
	- `Register:(Method- POST) http://127.0.0.1:8000/api/v1/auth/register`
	- `Login:(Method- POST) http://127.0.0.1:8000/api/v1/auth/login`
	- `Refresh:(Method- POST) http://127.0.0.1:8000/api/v1/auth/refresh`
	- `Profile:(Method- GET) http://127.0.0.1:8000/api/v1/auth/profile`
	- `Profile Update:(Method- POST) http://127.0.0.1:8000/api/v1/auth/profile`
	- `Logout:(Method- POST) http://127.0.0.1:8000/api/v1/auth/logout`

- Task
	- `Read:(Method- GET) http://127.0.0.1:8000/api/v1/tasks`
	- `Store:(Method- POST) http://127.0.0.1:8000/api/v1/task`
	- `Update:(Method- POST) http://127.0.0.1:8000/api/v1/task/1`
	- `Delete:(Method- Delete) http://127.0.0.1:8000/api/v1/task/2`

- Category
	- `Read:(Method- GET) http://127.0.0.1:8000/api/v1/categories`
	- `Store:(Method- POST) http://127.0.0.1:8000/api/v1/category`
	- `Update:(Method- POST) http://127.0.0.1:8000/api/v1/category/1`
	- `Delete:(Method- Delete) http://127.0.0.1:8000/api/v1/category/2`

### PHPunit test
- Run `php artisan test`
- Run specific test: `php artisan test --filter UserRegisterAPITest`

- Auth Test
	- UserRegisterAPITest (Need to give unique data for test)
	- UserLoginAPITest

### Features added (Cover all code challenge)
- User Authentication with JWT
- Task Management with pagination and filtering
- Authorization check by logic
- Validation
- PHPunit Test
- User Profile update (bonus)
- Task Categories (bonus)
- Task reminder by mail notification (bonus)
- Rate limiting added in Auth section (bonus)

### Postman test screenshots
![Register API](https://github.com/dev-hasanmahmud/task-management/blob/57583036d3df76615d1a251e78986991824d00a1/public/screenshots/1.png)

![Login API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/2.png)

![Profile API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/3.png)

![Profile Update API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/4.png)

![Refresh API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/5.png)

![Logout API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/6.png)

![Categories API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/7.png)

![Category store API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/8.png)

![Category update API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/9.png)

![Category delete API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/10.png)

![Tasks API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/11.png)

![Task store API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/12.png)

![Task update API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/13.png)

![Task delete API](https://github.com/dev-hasanmahmud/task-management/blob/c53b9acbc478392218adb12793c11713a19c6578/public/screenshots/14.png)