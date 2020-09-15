# imc_way

# Admin Controllers
app\Http\Controllers\ADMIN\InitBusinessOwnerController.php

app\Http\Controllers\ADMIN\InitCategoryController.php

app\Http\Controllers\ADMIN\InitProjectController.php

app\Http\Controllers\ADMIN\InitiativesController.php

app\Http\Controllers\ADMIN\MediaController.php

# Front Controllers
app\Http\Controllers\InitiativeController.php


# models
app\InitBusinessOwner.php

app\InitCategory.php

app\InitProject.php

app\InitProjectCategory.php


app\InitiativeCategory.php

app\InitiativeMedia.php

app\Initiatives.php

# views folder
resources\views\admin

resources\views\layouts\sidebar.blade.php

# routes
routes\web.php


# database migration
database\migrations\2020_09_04_221552_create_init_categories_table.php
database\migrations\2020_09_06_174359_create_init_projects_table.php
database\migrations\2020_09_06_211520_create_init_project_categories_table.php
database\migrations\2020_09_07_211333_create_initiatives_table.php
database\migrations\2020_09_07_221911_create_init_business_owners_table.php
database\migrations\2020_09_09_180425_create_initiative_categories_table.php
database\migrations\2020_09_10_230136_create_initiative_media_table.php

# Composer.json  
 Run ->  composer require 
 "laravelcollective/html":"^5.4" 
 on command line

# database 
dbchanges\imc.sql
