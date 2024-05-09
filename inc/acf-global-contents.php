<?php


function get_website_contents(){
	if(is_home()){
		if( have_rows('module_section', get_option('page_for_posts')) ){
			while ( have_rows('module_section', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/block-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('module_section') ){
			while ( have_rows('module_section') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/block-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_home_builder(){
	if(is_home()){
		if( have_rows('Home_page_builder', get_option('page_for_posts')) ){
			while ( have_rows('Home_page_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/section-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('Home_page_builder') ){
			while ( have_rows('Home_page_builder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/section-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_service_builder(){
	if(is_home()){
		if( have_rows('pagebuilder', get_option('page_for_posts')) ){
			while ( have_rows('pagebuilder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/service-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('pagebuilder') ){
			while ( have_rows('pagebuilder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/service-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}

function get_website_case_study_builder(){
	if(is_home()){
		if( have_rows('at_a_glance_builder', get_option('page_for_posts')) ){
			while ( have_rows('at_a_glance_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/case-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('at_a_glance_builder') ){
			while ( have_rows('at_a_glance_builder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/case-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_glance_builder(){
	if(is_home()){
		if( have_rows('at_a_glance_builder', get_option('page_for_posts')) ){
			while ( have_rows('at_a_glance_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/glance-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('at_a_glance_builder') ){
			while ( have_rows('at_a_glance_builder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/glance-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_single_case_builder(){
	if(is_home()){
		if( have_rows('project_builder', get_option('page_for_posts')) ){
			while ( have_rows('project_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/single_case-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('project_builder') ){
			while ( have_rows('project_builder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/single_case-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_service_single_page_builder(){
	if(is_home()){
		if( have_rows('service_single_page_builder', get_option('page_for_posts')) ){
			while ( have_rows('service_single_page_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/single_service-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('service_single_page_builder') ){
			while ( have_rows('service_single_page_builder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/single_service-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_article_glance_builder(){
	if(is_home()){
		if( have_rows('at_a_glance_builder', get_option('page_for_posts')) ){
			while ( have_rows('at_a_glance_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/article-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('at_a_glance_builder') ){
			while ( have_rows('at_a_glance_builder') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/article-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}
function get_website_article_builder_block(){
	if(is_home()){
		if( have_rows('article_builder_block', get_option('page_for_posts')) ){
			while ( have_rows('article_builder_block', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/single-article-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('article_builder_block') ){
			while ( have_rows('article_builder_block') ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/single-article-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}


function get_website_footer_builder_block(){
	if(is_home()){
		if( have_rows('footer_builder', get_option('page_for_posts')) ){
			while ( have_rows('footer_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/footer-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}
	}else{
		if( have_rows('footer_builder', get_option('page_for_posts')) ){
			while ( have_rows('footer_builder', get_option('page_for_posts')) ) {
				the_row();
				$tpl = get_template_directory().'/templates/block/footer-'.get_row_layout().'.php';
				if(file_exists($tpl)){
					if(!isset($acf_layout_counter)){
						$acf_layout_counter = 0;
					}
					$acf_layout_counter++;
					include($tpl);
				}else{
					echo $tpl.': file not found';
				}
			}
		}else{
		}
	}
}