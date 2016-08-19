#account

####login
######POST /api/account/login JSON
######REQ
user_name OR|AND telephone OR|AND email
password
######RES
user info
######DES
NONE

####register
######POST /api/account/register JSON
######REQ
user_name OR|AND telephone OR|AND email
password
######RES
user info
######DES
Auto login after registered.