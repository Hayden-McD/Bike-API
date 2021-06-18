# intro-app-dev-2021-s1-activities-Hayden-McD
intro-app-dev-2021-s1-activities-Hayden-McD created by GitHub Classroom

### URL'S ###
Heroku URL: http://bike-store-api.herokuapp.com/
Postman documentation URL:

### How to setup API to run locally (Once repository has been cloned) ###
1. Open laragon and copy the cloned folder into laragon's root folder.
2. Change laragon's php version to 7.4.xx if using an earlier version.
3. Click on the start all button in the bottom left corner of laragon.
4. Open the "App-Dev-Practical" folder using visual studio code.
5. Open a terminal window and enter: `Composer install`.
6. Once composer has finished installing enter in the command line: `copy .env.example .env`.
7. Enter in the command line: `php artisan key:generate` to generate an app key.
8. Enter in the command line: `php artisan migrate` to run migrations. If the database doesnt exist go into laragon, click database, click laragon then right click laragon at the top and create new then click database. Name the database "app_dev_practical".
9. Enter in the command line: `php artisan db:seed` to seed the data.
10. Enter in the command line: `php artisan serve` to run the server locally.
11. CTRL + Click on the address to open the web page.

### how to run the API tests ###
1. Refresh the database by entering the command: `php artisan migrate:fresh`.
2. Repopulate the database by entering the command: `php artisab db:seed`.
3. Run the test by entering the command: `php artisan test`.

### How to deply the api ###
1. Make sure you are on the master branch (This can be done by entering the command: `git branch`. The branch can be changed by entering: `git checkout <branch name>`).
2. Make sure the master branch has been merged and tested before deploying (To see if the branch is upto date enter: `git status`).
3. Add all of the changed files to git by entering the command: `git add *`
4. Add a commit message by entering the command: `git commit -m "message"`
5. Push the updated files to heroku by entering the command: `git push deployment master`


### REFERENCES ###
- Intro app dev github repo
- https://medium.com/swlh/a-guide-on-laravel-relationships-1febfac430f6
- https://www.youtube.com/watch?v=U8xaaWVNIJc
- https://www.youtube.com/watch?v=074AQVmvvdg
- https://www.youtube.com/watch?v=sysR91VZ9C8
- https://www.youtube.com/watch?v=qCMgxDfRKCo
- https://www.youtube.com/watch?v=QVNQq-LfHBk
- https://stackoverflow.com/questions/22615926/migration-cannot-add-foreign-key-constraint?rq=1
- https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8
