
# PRIFITRA

a super simple Tools to migrate or transfer your files from old to new server

## Deployment

Here is quick start to doploy this script into your server

1. Download or clone this repository and upload to your new server
2. Unzip the file
3. You're ready to go.

#### Note
Please change the `/inc/login/login.json` file permission to `0600` or `0400`
## Server Requirements

- PHP 7.4 or later
- cURL Enabled
- PHP JSON Extension Enabled

#### Tested On
- cPanel
- Cyberpanel

## FAQ

#### Why this script not using SQL?

Well, to be honest this script was made only to quickly transfer your files. If you need to setup database just to transfer or migrate 1 file, that would be troublesome.

#### What is the Default Password?

You can login to PRIFITRA on your server using these login info:

 Username: `prifitra`
 Password: `password`

or

 username: `guest`
 Password: `password`

 #### Whats is the difference between user 1 and user 2?
There's no difference at all...

#### How to change default username and password?
1. Open and edit this file: `/inc/login/login.json`
2. Chage the username as you wish
3. For the password, you can use [Bcrypt Generator](https://bcrypt-generator.com/) to encrypt and validate your password.

#### Thanks to
- [Colorlib](https://colorlib.com/wp/template/login-form-v4/) for Awesome login page design
- [htmlCodex](https://htmlcodex.com/bootstrap-5-admin-template/) for Awesome dashboard design


## License

[MIT](https://choosealicense.com/licenses/mit/)

