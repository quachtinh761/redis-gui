# Redis GUI

## About Redis-GUI
This project is used to make tool for Redis management.

Source code is made by Laravel Framework.

## Installation
### Requirements
- `PHP >= 7.1.3`
- `Mbstring PHP Extension`
- `OpenSSL PHP Extension`
- `PDO PHP Extension`
- `composer`

### Setup
- Step 1: Copy file `.env.example` to `.env`
- Step 2: install vendors by following command:
    ```
    composer install
    ```
- Step 3: make app key by following command:
    ```
    php artisan key:generate
    ```
- Step 4: Set up server:
    If you want to use server (Apache, Nginx,...), please config your virtual host to `public` folder.

    Additional, you can run project by using command:
    ```
    php artisan serve
    ```
    
    Command's output will be like this:
    ```
    Laravel development server started: <http://127.0.0.1:xxxx>
    ```
    Then you can access to `<http://127.0.0.1:xxxx>`.

## Contributing
Thank you for considering contributing. Please contact to email [quachtinh761@gmail.com](mailto:quachtinh761@gmail.com)

## License

