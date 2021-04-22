<?php
// require classes
require 'core/classes/route.php';
require 'core/classes/view.php';
require 'core/classes/portal.php';
require 'core/classes/component.php';
require 'core/classes/idiorm.php';
require 'core/classes/paris.php';
require 'core/classes/csrf.php';
require 'core/classes/cache.php';
require 'core/classes/validator.php';
require 'core/classes/helpers.php';
require 'core/classes/url.php';
require 'core/classes/acl.php';

require 'core/helpers/helpers.php';

// require database
require 'app/config/database.php';

// require controllers
require 'app/controllers/controller.php';
require 'app/controllers/users.php';
require 'app/controllers/alunos.php';

// require models
require 'app/models/user.php';
require 'app/models/aluno.php';

//require routes
require 'routes.php';