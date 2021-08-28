# issabel Send Mail When Called 00

1. Copy all downloaded file in `/var/www/html` directory on issabel

2. Set `775` or `777` permission to all downloaded files

3. Go to `/var/www/html` directory

``` bash script

cd /var/www/html 

```

4. Open `checkcdr00.php` and set issabel database username and password and save
``` php
$username = "root";
$password = "pass_of_root";
```
5. Open `zarbinnetwork_mail.php` and set an gmail account (note: issabel only work with gmail)
  - `issabel_Gmail@gmail.com` is issabel email address that sends reports to `admin_mail@yahoo.com`
```php
$agi->set_variable("mail_user", "issabel_Gmail@gmail.com"); 
$agi->set_variable("mail_password","pass_of_issabel_Gmail");
$agi->set_variable("mail_to", "admin_mail@yahoo.com");
```

6. On to the `issabel_Gmail@gmail.com` google account setting security tab, enable `Less Secure app access`

7. open `/etc/asterisk/extensions_custom.conf` create `zarbinnetwork` context and include it
```
[from-internal-custom]
include => zarbinnetwork

[zarbinnetwork]
exten => _900.,n,AGI(zarbinnetwork_mail.php)
```
8. Reload asterisk dialplan
```bash script
asterisk -r
reload
exit
```
9. you can check 900 destination with `https://issabel_IP_Address/checkcdr00.php`
10. you can also check 900 destination on `User Feild` of CDR Report 
