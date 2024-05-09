<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
$postid = get_the_ID();
?>

<?php get_website_service_single_page_builder(); ?>

<?php get_footer(); ?>
