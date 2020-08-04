# MintSoftwareTask2
Symfony - login and register

## How to run test app

1. Clone app from git
2. Create database and your own .env.local environment file containing:
`DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7`
3. Install all Symfony dependencies by `composer install`
4. Install node dependencies by `npm install`
5. Run `npm run dev` to generate css and js files in dev env
6. Run `bin/console doctrine:migrations:diff` to check diffs in your database
7. Run `bin/console doctrine:migrations:migrate` to migrate database schema
8. Run `bin/console doctirne:fixtures:load` to load exemplary user accounts with passwords Test1234!
9. Run `symfony server:start` if you've already have global symfony installation and have fun using this app! :)