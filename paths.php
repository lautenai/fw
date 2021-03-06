<?php
// require database
require 'app/config/config.php';

// require classes
require 'core/classes/route.php';
require 'core/classes/view.php';
require 'core/classes/portal.php';
require 'core/classes/component.php';
require 'core/classes/idiorm.php';
require 'core/classes/paris.php';
require 'core/classes/csrf.php';
require 'core/classes/cache.php';
// require 'core/classes/validator.php';
require 'core/classes/helpers.php';
require 'core/classes/url.php';
require 'core/classes/acl.php';
require 'core/classes/auth.php';
require 'core/classes/database.php';

require 'core/helpers/helpers.php';
require 'core/helpers/request.php';
require 'core/helpers/input.php';
require 'core/helpers/paginator.php';

require 'app/config/database.php';

// require controllers
// require 'core/classes/autoloader.php';
require 'app/controllers/controller.php';
require 'app/controllers/users.php';
require 'app/controllers/groups.php';
require 'app/controllers/pedagogico/aulas.php';
require 'app/controllers/biblioteca/livros.php';

// require models
require 'app/models/user.php';
require 'app/models/group.php';
require 'app/models/aula.php';
require 'app/models/biblioteca/livro.php';
require 'app/models/escola.php';

//require routes
require 'routes.php';