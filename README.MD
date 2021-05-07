# Checking Issabel CDR For 900* Call Destination

1. Copy all downloaded file in "/var/www/html" directory on issabel

2. Set "775" or "777" permission to all downloaded files

3. Go to "/var/www/html" directory

``` bash script

cd /var/www/html 

```

4. Open "checkcdr00.php" and set issabel database username and password and save
``` php
$username = "root";
$password = "pass_of_root";
```
5. Open "mail.php" and set an gmail account (note: issabel only work with gmail)
  - "example@gmail.com" is issabel email address that sends reports to "example@example.example"
```php
$mail->Username = "example@gmail.com";                 
$mail->Password = "pass_of_issabel_Gmail";
$mail->From = "example@gmail.com";
$mail->addAddress("example@example.example", "Recepient Name");
```

6. On to the "example@gmail.com" google account setting security tab, enable "Less Secure app access"

7. Run "checkcdr00.sh"
``` bash
./checkcdr00.sh
```

## Using "crontab" for automatic daily report
```bash
crontab -e
0 1 * * * /var/www/html/checkcdr00.sh
```
