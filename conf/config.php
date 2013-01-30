<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2009 Catalyst IT Ltd and others; see:
 *                         http://wiki.mahara.org/Contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    mahara
 * @subpackage core
 * @author     Catalyst IT Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2009 Catalyst IT Ltd http://catalyst.net.nz
 *
 */

//
// MAHARA CONFIGURATION FILE
//
// This config file was customized to suit Heroku cloud env
//
// Copy this file from config-dist.php to config.php, and change the values in
// it to suit your environment.
//
// Information about this file is available on the Mahara wiki:
// http://wiki.mahara.org/System_Administrator's_Guide/Installing_Mahara#Create_Mahara's_config.php
//

$cfg = new StdClass;

$branch = 'master';

// database connection details
// Change these values to suit your Heroku Postgres DB settings
$cfg->dbtype   = 'postgres8';
$cfg->dbhost   = 'ec2-54-243-224-88.compute-1.amazonaws.com';
$cfg->dbport   = 5432;
$cfg->dbuser   = 'tpczjldejqnvzo';
$cfg->dbname   = 'd2i23qvb5nd5ru';
$cfg->dbpass   = 'j0YI5cGacAelai9x34ofDFrJeK';

// Note: database prefix is NOT required, you don't need to set one except if 
// you're installing Mahara into a database being shared with other 
// applications (this happens most often on shared hosting)
$cfg->dbprefix = '';

// wwwroot - the web-visible path to your Mahara installation
// Normally, this is automatically detected - if it doesn't work for you
// then try specifying it here.
// This value must end with a /
$cfg->wwwroot = 'http://mahara.herokuapp.com/';	// <-- change to your Heroku Mahara application URL

// If you are using a proxy to force HTTPS connections, you will need to
// enable the next line. If you have set this to true, ensure your wwwroot
// is a HTTPS address.
//$cfg->sslproxy = true;

// dataroot - uploaded files are stored here
// This is a ABSOLUTE FILESYSTEM PATH. This is NOT a URL.
// For example, valid paths are:
//  * /home/user/maharadata
//  * /var/lib/mahara
//  * c:\maharadata
// INVALID paths:
//  * http://yoursite/files
//  * ~/files
//  * ../data
//
// This path must be writable by the webserver and outside document root (the 
// place where the Mahara files like index.php have been installed).
// Mahara will NOT RUN if this is inside your document root, because
// this is a big security hole.
$cfg->dataroot = "/app/maharadata";

// If set, this email address will be displayed in the error message if a form
// submission is suspected of being spam. This reduces the frustration for the
// user in the event of a false positive.
$cfg->sendemail = true;
$cfg->sendallemailto = 'son.nguyen@catalyst.net.nz'; // <-- change to your email address

// Debugging settings
$cfg->log_dbg_targets     = LOG_TARGET_SCREEN | LOG_TARGET_ERRORLOG;
$cfg->log_info_targets    = LOG_TARGET_SCREEN | LOG_TARGET_ERRORLOG;
$cfg->log_warn_targets    = LOG_TARGET_SCREEN | LOG_TARGET_ERRORLOG;
$cfg->log_environ_targets = LOG_TARGET_SCREEN | LOG_TARGET_ERRORLOG;
$cfg->perftofoot = true;

// Set this to enable a secondary hash that is only present in the config file
$cfg->passwordsaltmain = 'replace this string by a really long random string';

// When changing the salt (or disabling it), you will need to set the current salt as an alternate salt
// There are up to 20 alternate salts
// $cfg->passwordsaltalt1 = 'old salt value';


