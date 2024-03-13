# Unique ID

Advanced Custom field that creates and stores a unique ID.

## Installation via Composer

In your composer.json file, be sure to let Composer know where to install WordPress plugins:
```json
{
  "extra": {
    "installer-paths": {
      "path/tp/plugins/{$name}/": [
        "type:wordpress-plugin"
      ]
    }
  }
}
```
Require the plugin:
```bash
composer require johnshopkins/acf-uniqid
  ```
