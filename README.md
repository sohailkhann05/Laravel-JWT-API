## Frontend Steps

=>  Extract inside htdocs
=>  create database named `books_db`
=>  Run command `php artisan migrate --seed`, it will create random users, books {all users password is set to `password`}
=>  go to database users table take any user email and login using 	`password` as password {default for all users}
=>  when login you can do Books CRUD operation from frontend views

## Postman Laravel Passport API
=> Open postman
=> find `Laravel Passport API.postman_collection.json` inside root directory, incase of bug i have included version-II json file as well.
=> import it
=> you will find all routes used for api
=> first step is to login user and get bearer `token`
=> set header `Authorization` with value `Bearer {API Token}`
=> e.g.
	`Authorization` => `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L3Rhc2svYXBpL2xvZ2luIiwiaWF0IjoxNjI0OTA0ODk2LCJleHAiOjE2MjQ5MDg0OTYsIm5iZiI6MTYyNDkwNDg5NiwianRpIjoiZm1jekhFT1h3N2RjVllFbiIsInN1YiI6MiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.uKD-5QaEZEBekFsKZPc_hr7pXXXlJcsqcs7QIxKRl0w`
=> with each request pass the authorization header