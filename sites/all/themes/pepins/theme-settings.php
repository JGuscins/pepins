<?php

function pepins_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['theme_settings']['registration_page'] = array(
  	'#type' 		=> 'fieldset',
  	'#title' 		=> t('Registration page'),
  	'#collapsible' 	=> TRUE,
    '#collapsed' 	=> TRUE,
  );	

  $form['theme_settings']['registration_page']['registration_punch_line_1'] = array(
    '#type'     => 'textfield',
    '#title'    => t('Punch line 1'),
    '#required' => FALSE,
    '#default_value' => theme_get_setting('registration_punch_line_1'), 
  );

  $form['theme_settings']['registration_page']['registration_punch_line_2'] = array(
    '#type'     => 'textfield',
    '#title'    => t('Punch line 2'),
    '#required' => FALSE,
    '#default_value' => theme_get_setting('registration_punch_line_2'), 
  );


  $form['theme_settings']['registration_page']['registration_header_iamge'] = array(
    '#type'     => 'managed_file',
    '#title'    => t('Header image'),
    '#required' => FALSE,
    '#upload_location' => file_default_scheme() . '://theme/backgrounds/',
    '#default_value' => theme_get_setting('registration_header_iamge'), 
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );
}