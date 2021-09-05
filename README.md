# mia-category-mezzio

1. Incluir libreria:
```bash
composer require agencycoda/mia-category-mezzio
```
2. Incluir rutas:
```php
$app->route('/mia-category/fetch/{id}', [\Mia\Auth\Handler\AuthHandler::class, \Mia\Category\Handler\MiaCategory\FetchHandler::class], ['GET', 'OPTIONS', 'HEAD'], 'mia_category.fetch');
$app->route('/mia-category/list', [\Mia\Auth\Handler\AuthHandler::class, \Mia\Category\Handler\MiaCategory\ListHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_category.list');
$app->route('/mia-category/remove/{id}', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Category\Handler\MiaCategory\RemoveHandler::class], ['GET', 'DELETE', 'OPTIONS', 'HEAD'], 'mia_category.remove');
$app->route('/mia-category/save', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Category\Handler\MiaCategory\SaveHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_category.save');
```