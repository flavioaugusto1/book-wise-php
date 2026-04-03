<?php
require 'models/Livro.php';
require 'models/Usuario.php';

session_start();

$config = require 'config.php';
require 'Flash.php';
require 'functions.php';
require 'Database.php';
require 'routes.php';
