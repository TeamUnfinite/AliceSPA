#API protocol
##request
###authentication
####HTTP header
```
AliceSPA_UserID: user id
AliceSPA_WebToken: web token
```
##return format
```
{
    'status': 'SUCCESS' or 'FAILURE',
    'errors': [errorCode],
    'data': data,
    'APIException': APIException info (OPTION)
}
```
