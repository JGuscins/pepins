<?php

function pepins_theme() {
  $items = array();

  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'pepins') . '/templates',
    'template' => 'user-register-form',
  );

  return $items;
}


function pepins_menu_link__user_menu($variables) {
  $element  = $variables['element'];
  $title    = $element['#title'];
  $sub_menu = '';

  if($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  if($element['#title'] == 'Log in') {
    $link       = l($title, $element['#href'], array('attributes' => array('id' => array('login-button'))));
    $login_form = drupal_get_form("user_login"); 
    $login_form = drupal_render($login_form);

    $forgot_password_form = drupal_get_form("user_pass");
    $forgot_password_form = drupal_render($forgot_password_form);

    return '<li '.drupal_attributes($element['#attributes']).'>'.$link.'<div id="login-box-wrapper"><div id="login-box"><div class="triangle"></div>'.$login_form.'</div><div id="forgot-password-box">'.$forgot_password_form.'</div></div></li>';
  } else {
    $link = l($title, $element['#href'], $element['#localized_options']);
    return '<li '.drupal_attributes($element['#attributes']).'>'.$link.$sub_menu.'</li>';
  }
}