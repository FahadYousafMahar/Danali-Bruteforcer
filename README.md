# Danali-Bruteforcer
PHP-Bruteforcer to attack any vulnerable site using wordlist

![Contributors](https://img.shields.io/github/contributors/fahadyousafmahar/Danali-Bruteforcer.svg)
![License](https://img.shields.io/github/license/fahadyousafmahar/Danali-Bruteforcer.svg)
![Repo Size](https://img.shields.io/github/repo-size/fahadyousafmahar/Danali-Bruteforcer.svg)

### Description
Danali is a PHP commandline script to bruteforce any vulnerable website using properties of its login form.

Any site which doesn't check for CSRF and doesnt limit Maximum Login Tries in login form is vulnerable.

If you encounter a website which is invunlerable to CSRF but doesn't limit login tries can be attacked using  Ahmed Ishaq 's [AK-47-Bruteforcer](https://github.com/Ahmad-Ishaq/AK-47-Bruteforcer)

### System Requirements
PHP with cURL enabled 

you can use [xampp](https://www.apachefriends.org/download.html) to install PHP.
Manually you can use PHP binaries from [official PHP website](http://php.net/downloads.php)
cURL is by default enabled, most of the time.

### Usage Instructions
1- Download the repository and extract it to a folder

2- Open a terminal.

3- cd to PHP installation directory
```
   cd C:\xampp\php
```
4- write command
```
   php yourExtractedFolder/danali.php
```
5- Fill the prompt requirements.
```
    Enter value of action from login form for Target URL.
    Enter value of name from form's username input field for Username field.
    Enter value of name from form's password input field for Password field.
    Enter value of name from form's submit button for Submit field.
    Enter the username you want to bruteforce.
```

If you are stuck anywhere or need any help you can raise an issue.
### Screenshot

![Danali  ScreenShot](https://raw.githubusercontent.com/FahadYousafMahar/Danali-Bruteforcer/master/screenshot.jpg)

## Authors

* **Fahad Yousaf Mahar** 

See also the list of [contributors](https://github.com/FahadYousafMahar/easypay-whmcs-gateway/graphs/contributors) who participated in this project.

## License

This project is licensed under the GNU LGPLv3 License - see the [LICENSE](LICENSE) file for details
