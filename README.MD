# This Program for check issabel CDR Report for call destination 900*

1. copy all file on /var/www/html on issabel with WinSCP

2. set permission 775 or 777 to all files with WinSCP or Linux CLI

3. go to /var/www/html directory

``` bash script

cd /var/www/html 

```

4. open file checkcdr00.php and give it database user and pass and save it
``` php
$username = "root";
$password = "pass_of_root";
```
5. open file mail.php file and set emails on it
  - issabel@gmail.com is issabel Gmail for send mail to admin@yahoo.com
```php
$mail->Username = "issabel@gmail.com";                 
$mail->Password = "pass_of_issabel_Gmail";
$mail->From = "issabel@gmail.com";
$mail->addAddress("admin@yahoo.com", "Recepient Name");
```

6. Go to the issabel@gmail.com Gmail (Manage your Google Account) then go to the Security and Less Secure app access and enable it

7. run file checkcdr00.sh
``` bash
./checkcdr00.sh
```

## for automatic daily run on crontab
```bash
crontab -e
0 1 * * * /var/www/html/checkcdr00.sh
```
