#account

####login
######POST /AliceSPA/api/account/login JSON
######REQ
```
{
    "user_name OR|AND telephone OR|AND email":"value",
    "password":"password"

}
```
######RES
```
{
    "id":"id",
    "user_name":"user name",
    "email":"email",
    "telephone":"telephone",
    "web_token":"web token",
    "update_time":"update time",
    "create_time":"create time"
}
```
######DES
Server do not hash password.

####register
######POST /AliceSPA/api/account/register JSON
######REQ
```
{
    "user_name OR|AND telephone OR|AND email":"value",
    "password":"password"

}
```
######RES
```
{
    "id":"id",
    "user_name":"user name",
    "email":"email",
    "telephone":"telephone",
    "web_token":"web token",
    "update_time":"update time",
    "create_time":"create time"
}
```
######DES
Auto login after registered.
Server do not hash password.

####info
######POST /ALiceSPA/api/account/info JSON LIN
######REQ
NONE
######RES
```
{
    "id":"id",
    "user_name":"user name",
    "email":"email",
    "telephone":"telephone",
    "web_token":"web token",
    "update_time":"update time",
    "create_time":"create time"
}
```
######DES
NONE

####logout
######POST /AliceSPA/api/account/logout LIN
######REQ
NONE
######RES
NONE
######DES
NONE

#captcha
####image
######GET /AliceSPA/api/captcha/image JSON
######REQ
NONE
######RES
```
{
    "id": captcha id,
    "data": captcha image data encoded by base 64, PNG
}
```
######DES
NONE

#environment
####errors
######GET /AliceSPA/api/envrionment/errors JSON
######REQ
NONE
######RES
```
[
    {
        "CODE":code number,
        "DESCRIPTION":"description"
    },
    ...
]
```
######DES
NONE

####check session
######GET /AliceSPA/api/envrionment/checkSession
######REQ
NONE
######RES
NONE
######DES
Only handle session process.

####clear session
######POST /AliceSPA/api/envrionment/clearSessions LIN ROLE(admin)
######REQ
NONE
######RES
NONE
######DES
Clear expired sessions. (sessionValidTime in config)
