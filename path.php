<?php
define("ROOT_PATH",realpath(dirname(__FILE__))); 
define("BASE_URL", "http://localhost/ECOMMERCE/");
define("admin_URL", "http://localhost/ECOMMERCE/admin/");

// ROOT_PATH has nothing to do with Canonical URL. It simply refers to the path to a file (In this case, a source code file) on the disk (not on the browser).
// Canonical URL is simply a way to tell Google and other search engines to associate the ranking/indexing of a particular page that can be accessed through multiple URLs to a particular URL specified as the canonical URL.
// Hope this makes sense.