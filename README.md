<h1 align="center">Patricia Backend Developer Intern Assessment  (API)</h1>


## About 

This project is powered by Laravel 8 <br>
Accept : application/json<br>
Returns : JSON <br>
Postman Documentation :  https://documenter.getpostman.com/view/8843198/TzeTKpyR <br><br>

## Authentication

Laravel Sanctum is used to for user authentication and token Management<br>
Authorization : Bearer Token<br><br>

## Routes
Note : hosturl is the url of the server hosting the api <br>
accessibility : This indicates if a route is a protected route or a public route <br>
{id} : This is a variable in the route and it should be replaced with the corresponding id of the user, <br>
as it is saved on the user table<br>
method : this is the http request method by which the request is sent<br>

Login : <br>
    route : hosturl/api/login <br>
    method : POST,<br>
    formData : {
        email : 'demo@assessment.com,
        password : '123456'
    }<br>
    accessibility: public<br><br>

Register : <br>
    route : hosturl/api/register<br>
    method : POST,<br>
    formData : {
        email : 'demo@assessment.com',
        name :'Demo Name',
        password : '123456',
        password_confirmation : '123456'
    }<br>
    accessibility : public<br><br>

Update : <br>
    route : hosturl/api/update<br>
    method : PUT,<br>
    formData : {
        email : 'optional',
        name : 'optional',
        password : 'optional'
    }<br>
    accessibility : protected<br><br>

Fetch User Data : <br>
    route : hosturl/api/user/{id}<br>
    method : GET  <br>
    accesibility : protected<br><br>

Delete :<br>
    route : hosturl/api/user/{id}<br>
    method : delete<br>
    accesibility : protected<br><br>

Logout :<br>
    route : hosturl/api/logout<br>
    method : POST<br>
    accesibility : protected<br><br>

## Error Reporting<br>
all error responses is in this format<br>
{
    message : 'error message'
    success : boolean
}<br><br>
if the operation is successful the success value will be true and<br>
if the operation is not successful the success value will be false<br>

Note that authenticated users are not given the permission to access<br>
resources belonging to another user


