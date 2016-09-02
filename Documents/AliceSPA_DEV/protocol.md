#API protocol
##request
###request header
```
AliceSPA-UserID: user id | OPETION
AliceSPA-WebToken: web token | OPETION
AliceSPA-SessionID: session id | OPETION
```
###request body
```
{
    "YOUR":"DATA",//customer app data.
    "AliceSPA_Captcha":{  //verified by AliceSPA automatically.
        "id": captcha ID,
        "code": captcha code
        }
}
```
###response format
```
{
    'status': 'SUCCESS' or 'FAILURE',
    'errors': [errorCode],
    'data': data,
    'APIException': APIException info,
    'sessionID': session id
}
```
