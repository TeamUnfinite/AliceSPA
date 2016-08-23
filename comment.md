#API protocol
##request
###authentication
####HTTP header
```
AliceSPA-UserID: user id
AliceSPA-WebToken: web token
AliceSPA-SessionID: session id
```
##return format
```
{
    'status': 'SUCCESS' or 'FAILURE',
    'errors': [errorCode],
    'data': data,
    'APIException': APIException info,
    'sessionID': session id
}
```
