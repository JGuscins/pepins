<?php

/**
 * @file
 * Administration page callbacks for the simple fb connect module.
 */
function awave_linkedin_api_keys_settings($form, &$form_state) {
  $form['awave_linkedin_appid'] = array(
    '#type' => 'textfield',
    '#required' => TRUE,
    '#title' => t('Application ID'),
    '#default_value' => variable_get('awave_linkedin_appid', NULL),
  );

  $form['awave_linkedin_secret'] = array(
    '#type' => 'textfield',
    '#required' => TRUE,
    '#title' => t('Application Secret'),
    '#default_value' => variable_get('awave_linkedin_secret', NULL),
  );

  return system_settings_form($form);
}
