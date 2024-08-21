#!/bin/bash

# Export the database
mysqldump -u $DB_USER -p'$DB_PASSWORD' $DB_NAME > /database/backup.sql

# Import the database
mysql -u $DB_USER -p'$DB_PASSWORD' $DB_NAME < /database/backup.sql
