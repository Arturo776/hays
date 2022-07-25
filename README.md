# Hays Technical Test

Technical test for Hays company.

## Author

Arturo B. Martín

[![Linked In](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white
)](https://www.linkedin.com/in/arturobm-dev)

## Description

- ### Register and login

    This project has a register formulary and a login formulary, both of them properly validated before and after being sent.

- ### User list

    A table displaying the data of all the users registered into the database. Only logged in users are allowed to visit this page.

- ### Redirects

    If the user logs in successfully, he will then be redirected to a 'successful login' page and automatically redirected to the 'user list'.

    If the user could not log in, he will be redirected to a 'user does not exist' page and then automatically redirected to the login page.

## Features

- ### Responsive design

    Every single page is responsive in big and small devices via CSS '@media' rule.

- ### Formulary validation

    Passwords are encrypted before being inserted in the database. They are also encrypted in the log in process to check whether the user exists or not.

    Both formularies have a validation script that checks the following characteristics:

    1. The username must be a string containing letters, numbers and underscores only.
    2. The password must be at least 8 characters long and both passwords must be the same.
    3. The email must be well formed.
    
    They also have a PHP back-end validation that validates and filters all fields. It also checks none of the fields are empty and that both passwords are the same after encryptation.

- ### Custom 404 error

    Any 404 error is handled in the .htaccess file. Users will be redirected to the 404.php page and automatically redirected to the previous page.

- ### Timeout redirections

    'Successful login', 'user does not exist' and '404 not found' pages include a Javascript file that redirects the user to another specific page after a 2 seconds timeout.

- ### UI/UX formulary design

    Both register and login submit buttons are hidden until the user completes all fields correctly.

## Technologies

- Pure PHP for back-end.
- Vanilla Javascript for a better UI/UX design and front-end validation.
- MySQL database.
- XAMPP (optional but recommended).

## Installation

Install the required technologies in case they are not installed yet and download the project.

For an excellent performance, keep the original 'hays' name for the source code folder.

If you want to run your project using XAMPP download the source code folder directly into your '/xampp/htdocs' directory. It should look like '/xampp/htdocs/hays'.

## Run

Before running this project a database connection is needed. To create a connection with your database do the following:

1. Open '/hays/database/connection.php' in your code editor.
2. Change the 'Database local configuration' variables to match your local MySQL database connection.
3. Check that the connection was successful.

Now you can run this project in any of these two ways:

1. On default PHP server:

    Open a console in the root of the project and run
    ```bash
    php -S localhost:8000
    ``` 

2. On XAMPP Apache server:

    1. Move the source code folder into '/xampp/htdocs'.
    2. Start Apache service.
    3. Go to 'localhost/hays' in your browser.

Once the project has been executed a default test user will be available:

- Username:
    **test**

- Password:
    **test1234**

### *Note*

Using MySQL Workbench as the database manager is recommended.

Even using XAMPP Apache server, this project was not developed to be managed with XAMPP PHPMyAdmin. Therefore, further configuration must be done in order to use PHPMyAdmin as the database manager instead of MySQL Workbench.

## Troubleshooting

- 'User list' page may not have a decent responsive design in extremely small screens.
- '404 error' page only works on Apache servers. If the project is run via default PHP server a default 404 error will be displayed instead of custom 404 error page.
- Even with the submit button hidden, both formularies can be sent pressing the Enter key.
- The green 'complete all fields' banner in both formularies is always displayed and cannot be hidden in small screens.