<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



/*
  |--------------------------------------------------------------------------
  | Pagination global config for Bootstrap
  |--------------------------------------------------------------------------
  | by Tho Nguyen
  | These modes are used when working with pagination
  |
 */

# CONFIG
$config['pagination_conf'] = array(
  'case1' => array(
      'full_tag_open'         => '<ul class="pagination pagination-sm m-t-none m-b-none">',
      'full_tag_close'        => '</ul>',
      'next_link'             => '<i class="fa fa-chevron-right"></i>',
      'next_tag_open'         => '<li>',
      'next_tag_close'        => '</li>',
      'prev_link'             => '<i class="fa fa-chevron-left"></i>',
      'prev_tag_open'         => '<li>',
      'prev_tag_close'        => '</li>',
      'cur_tag_open'          => '<li><a class="danghoatdong">',
      'cur_tag_close'         => '</a></li>',
      'num_tag_open'          => '<li>',
      'num_tag_close'         => '</li>',
      'num_links'             => 3,
      'per_page'              => 3 //số bản ghi trên 1 trang
  ),
  'case2' => array(
      'full_tag_open'         => '<ul class="pagination pagination-sm m-t-none m-b-none">',
      'full_tag_close'        => '</ul>',
      'next_link'             => '<i class="fa fa-chevron-right"></i>',
      'next_tag_open'         => '<li>',
      'next_tag_close'        => '</li>',
      'prev_link'             => '<i class="fa fa-chevron-left"></i>',
      'prev_tag_open'         => '<li>',
      'prev_tag_close'        => '</li>',
      'cur_tag_open'          => '<li><a class="danghoatdong">',
      'cur_tag_close'         => '</a></li>',
      'num_tag_open'          => '<li>',
      'num_tag_close'         => '</li>',  
      'num_links'             => 3,
      'per_page'              => 3
  ),
);
