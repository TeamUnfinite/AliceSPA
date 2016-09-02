#account

####login
######POST /AliceSPA/api/account/login JSON
######REQ
user_name OR|AND telephone OR|AND email
password
######RES
user info
######DES
NONE

####register
######POST /AliceSPA/api/account/register JSON
######REQ
user_name OR|AND telephone OR|AND email
password
######RES
user info
######DES
Auto login after registered.

#captcha
####image
######GET /AliceSPA/api/captcha/image
######REQ
NONE
######RES
```
{
    "id": captcha id,
    "data": captcha image data encoded by base 64, PNG
}
```
