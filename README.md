# The Vault of Secrets

A password manager app.

## General Info
This project will be written using the Laravel Framework to create a REST API and PostgreSQL for the backend. The app will use 256-bit AES to encrypt the saved passwords.

## Toolstack
* [Laravel](https://laravel.com/)
* [PostgreSQL](https://www.postgresql.org/)
* [Docker](https://docs.docker.com/)

## Learning Process
### Laravel
I used a combination of these tutorials and documentation to get a working basic laravel api.
* [Medium.com REST API Larevel tutorial](https://medium.com/techvblogs/build-rest-api-with-laravel-879137ef8679)
* [Getting Started with Laravel](https://laravel.com/docs/9.x#getting-started-on-macos)
* [TDD REST API Tutorial](https://www.avyatech.com/build-laravel-rest-api-with-test-driven-development/#9-step-4-generate-the-keys-using)
* [Docker REST API Tutorial](https://rapidapi.com/blog/how-to-create-an-api-in-php/)

## Build Instructions

<details>
    <summary>Install Docker Desktop</summary>
    <ul>
        <li>Follow these instructions for your operating system: <a href="https://docs.docker.com/desktop/">https://docs.docker.com/desktop/</a></li>
    </ul>
</details>

Clone repository

        git clone https://github.com/starwarsnerd77/Vault-of-Secrets.git

Navigate to project repository

        cd Vault-of-Secrets

Navigate to Docker project directory

        cd vault-of-secrets

Launch the api

        ./vendor/bin/sail up

The api can be accesssed in a web browser at http://localhost