<?php

declare(strict_types=1);

$cfg['blowfish_secret'] = 'abcdefghijklmnopqrstuvwxyZ012345';

# Server configuration
$i = 0;
$i++;

# Authentification type
$cfg['Servers'][$i]['auth_type'] = 'cookie';

# Server parameters
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = true;

# Directories for saving and loading files from server
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
