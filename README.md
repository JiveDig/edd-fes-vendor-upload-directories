# Vendor Upload Directories #

An add-on for Easy Digital Downloads and Frontend Submissions that creates a separate directory in /uploads/edd/ for each vendors downloads and files.

By default, EDD and FES save all download files to /uploads/edd/.  This plugin automatically creates and upload directory per user.  If my user nicename in WordPress is 'MikeHemberger', Vendor Upload Directories will automatically put all my files in /uploads/edd/mikehemberger/

All you have to do is activate it and it just works.

## Requirements
 * WordPress 3.8
 * Easy Digital Downloads 2.0
 * Frontend Submissions 2.3

## Installation

### Upload

1. Download the latest tagged archive (choose the "zip" option).
2. Go to the __Plugins -> Add New__ screen and click the __Upload__ tab.
3. Upload the zipped archive directly.
4. Go to the Plugins screen and click __Activate__.

### Manual

1. Download the latest tagged archive (choose the "zip" option).
2. Unzip the archive.
3. Copy the folder to your `/wp-content/plugins/` directory.
4. Go to the Plugins screen and click __Activate__.

Check out the Codex for more information about [installing plugins manually](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

### Git

Using git, browse to your `/wp-content/plugins/` directory and clone this repository:

`git clone git@github.com:cdils/edd-fes-vendor-upload-directories`
Then go to your Plugins screen and click __Activate__.


## Credits

Built by [Mike Hemberger](https://twitter.com/jivedig)
Copyright 2013 [Mike Hemberger](http://thestizmedia.com/)

Props to [Chris Christoff](https://twitter.com/chriscct7) for making this happen.

## FAQS ##

### Can this plugin put all my existing files in the directories? ###

Unfortunatley, this plugin only works on all future uploads. To get you existing files in the new directories you have to go to each download and upload you file again. This will put it in the new vendor directory.