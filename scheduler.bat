@ECHO OFF
:LOOP
ECHO Cron
TIMEOUT 60 >NUL
cd %CD%
php artisan schedule:run 1>> NUL 2>&1
goto LOOP