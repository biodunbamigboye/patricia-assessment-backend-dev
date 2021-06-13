<p align="center">Patricia Backend Developer Intern Assessment  (API)</p>


## About 

This project is powered by Laravel 8 
it is a backend api which all routes return a json value <br>
Accept : application/json

## Authentication

Laravel Sanctum is used to for user authentication and token Management<br>
Authorization : Bearer Token

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
    }
    accessibility: public<br>re

Register : 
    route : hosturl/api/register
    method : POST,
    formData : {
        email : 'demo@assessment.com',
        name :'Demo Name',
        password : '123456',
        password_confirmation : '123456'
    }
    accessibility : public

Update : 
    route : hosturl/api/update
    method : PUT,
    formData : {
        email : 'optional',
        name : 'optional',
        password : 'optional'
    }
    accessibility : protected

Fetch User Data : 
    route : hosturl/api/user/{id}
    method : GET  
    accesibility : protected

Delete :
    route : hosturl/api/user/{id}
    method : delete
    accesibility : protected

Logout :
    route : hosturl/api/logout
    method : POST
    accesibility : protected

## Error Reporting
all error responses is in this format
{
    message : 'error message'
    success : boolean
}
if the operation is successful the success value will be true and
if the operation is not successful the success value will be false

Note that authenticated users are not given the permission to access
resources belonging to another user


