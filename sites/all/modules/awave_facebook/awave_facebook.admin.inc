<?php

/**
 * @file
 * Administration page callbacks for the simple fb connect module.
 */
function awave_facebook_api_keys_settings($form, &$form_state) {
  $form['awave_facebook_appid'] = array(
    '#type' => 'textfield',
    '#required' => TRUE,
    '#title' => t('Application ID'),
    '#default_value' => variable_get('awave_facebook_appid', NULL),
  );

  $form['awave_facebook_secret'] = array(
    '#type' => 'textfield',
    '#required' => TRUE,
    '#title' => t('Application Secret'),
    '#default_value' => variable_get('awave_facebook_secret', NULL),
  );

  return system_settings_form($form);
}
