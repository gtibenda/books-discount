Running the Project
=========

### Setup
System requirements:
- PHP 7.4 or above
- Composer

### Steps
- Download the project from the given github link
- Git checkout to branch ``` master ```
- Run ``` composer install ```
- Then Run ```  php bin/console  app:calculate-discount 1 1 1 1 1 ```

The parameters on the front of the command represent the number of books per volume 
from the given five volumes. (1 1 1 1 1 means each volume has only one book, 
1,5 means one volume has one book and another volume has 5 books)

The output should be similar to

```
╭─testmachine:/home
╰─$ php bin/console app:calculate-discount 1 1 1 1 1

The discounted price is 30 €