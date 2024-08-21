#!/bin/bash
mysql -u $DB_USERNAME -p $DB_PASSWORD $DB_DATABASE < database_backup.sql
