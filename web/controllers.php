<?php

use Symfony\Component\HttpFoundation\Response;

function list_action()
{
	$posts = get_all_posts();
	require 'templates/list.php';
}

function show_action($id)
{
	$post = get_post_by_id($id);
	require 'templates/show.php';
}

function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html = ob_get_clean();

	return $html;
}