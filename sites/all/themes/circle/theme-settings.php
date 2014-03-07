<?php
/**
 * @file
 * Circle theme settings implementation.
 */

/**
 * Circle theme settings. Add custom settings in subtheme theme-settings file.
 */
function circle_form_system_theme_settings_alter(&$form, $form_state) {

  $libraries_exists = module_exists('libraries');

  $form['circle_info'] = array(
    '#prefix' => '<h3>Circle Theme Settings:</h3> ',
    '#weight' => -40,
  );

  // CSS Settings.
  $form['css'] = array(
    '#type'        => 'fieldset',
    '#title'       => '<b> &rarr; </b> ' . t('CSS Settings'),
    '#collapsible' => TRUE,
    '#collapsed'   => TRUE,
    '#weight'      => -35,
  );
  $form['css']['circle_clearcss'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Remove system css.'),
    '#default_value' => theme_get_setting('circle_clearcss'),
    '#description'   => t('Remove several css from core modules.'),
  );
  $form['css']['circle_css_normalize'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include normalize.css'),
    '#default_value' => theme_get_setting('circle_css_normalize'),
    '#description'   => t('File is located in circle/css/normalize.css'),
  );
  $form['css']['circle_css_layout'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include Circle layout styles.'),
    '#default_value' => theme_get_setting('circle_css_layout'),
    '#description'   => t('File is located in circle/css/circle-layout.css'),
  );
  $form['css']['circle_css_circlestyles'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include Circle base styles.'),
    '#default_value' => theme_get_setting('circle_css_circlestyles'),
    '#description'   => t('File is located in circle/css/circle.css'),
  );
  $form['css']['circle_css_ie'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include IE stylesheets.'),
    '#default_value' => theme_get_setting('circle_css_ie'),
    '#description'   => t('Use ie8.css, ie9.css and ie.css conditional styles'),
  );
  $form['css']['circle_css_onefile'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('!! Aggregate all css files into 1 file.'),
    '#default_value' => theme_get_setting('circle_css_onefile'),
    '#description'   => t('This will improve your page load time, but use with care.'),
  );

  // Boostrap settings.
  $form['bootstrap'] = array(
    '#type'        => 'fieldset',
    '#title'       => '<b> &rarr; </b> ' . t('Bootstrap settings'),
    '#collapsible' => TRUE,
    '#collapsed'   => TRUE,
    '#weight'      => -33,
  );
  $form['bootstrap']['circle_css_bootstrap'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Bootstrap 3 styles via CDN.'),
    '#default_value' => theme_get_setting('circle_css_bootstrap'),
    '#description'   => t('Link: //netdna.bootstrapcdn.com/bootstrap/VERSION/css/bootstrap.min.css'),
  );
  $form['bootstrap']['circle_css_bootstrap_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Bootstrap CSS version.'),
    '#default_value' => theme_get_setting('circle_css_bootstrap_version'),
    '#description'   => t('Make sure to include the version you need. Ex.: 3.0.2'),
    '#states' => array(
      'invisible' => array(
       ':input[name="circle_css_bootstrap"]' => array('checked' => FALSE),
      ),
    ),
  );
  $form['bootstrap']['circle_js_bootstrap'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Bootstrap 3 javaScript via CDN.'),
    '#default_value' => theme_get_setting('circle_js_bootstrap'),
    '#description'   => t('Link: //netdna.bootstrapcdn.com/bootstrap/VERSION/js/bootstrap.min.js'),
  );
  $form['bootstrap']['circle_js_bootstrap_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Bootstrap javaScript version.'),
    '#default_value' => theme_get_setting('circle_js_bootstrap_version'),
    '#description'   => t('Make sure to include the version you need. Ex.: 3.0.2'),
    '#states' => array(
      'invisible' => array(
       ':input[name="circle_js_bootstrap"]' => array('checked' => FALSE),
      ),
    ),
  );
  $form['bootstrap']['circle_css_bootstrap_local'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Bootstrap CSS locally.'),
    '#default_value' => theme_get_setting('circle_css_bootstrap_local'),
    '#description'   => $libraries_exists ? t('File is taken from a locally installed library in libraries folder.') : t('Install and enable !libraries module to use this setting', array('!libraries' => l(t('Libraries'), 'http://drupal.org/project/libraries'))),
    '#disabled' => !$libraries_exists,
  );

  $form['bootstrap']['circle_js_bootstrap_local'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Bootstrap JavaScript locally.'),
    '#default_value' => theme_get_setting('circle_js_bootstrap_local'),
    '#description'   => $libraries_exists ? t('File is taken from a locally installed library in libraries folder.') : t('Install and enable !libraries module to use this setting', array('!libraries' => l(t('Libraries'), 'http://drupal.org/project/libraries'))),
    '#disabled' => !$libraries_exists,
  );

  // Foundation settings.
  $form['foundation'] = array(
    '#type'        => 'fieldset',
    '#title'       => '<b> &rarr; </b> ' . t('Foundation settings'),
    '#collapsible' => TRUE,
    '#collapsed'   => TRUE,
    '#weight'      => -33,
  );
  $form['foundation']['circle_css_foundation'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Foundation styles via CDN.'),
    '#default_value' => theme_get_setting('circle_css_foundation'),
    '#description'   => t('Link: //cdn.jsdelivr.net/foundation/VERSION/css/foundation.min.css'),
  );
  $form['foundation']['circle_css_foundation_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Foundation CSS version.'),
    '#default_value' => theme_get_setting('circle_css_foundation_version'),
    '#description'   => t('Make sure to include the version you need. Ex.: 4.3.2'),
    '#states' => array(
      'invisible' => array(
       ':input[name="circle_css_foundation"]' => array('checked' => FALSE),
      ),
    ),
  );
  $form['foundation']['circle_js_foundation'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Foundation javaScript via CDN.'),
    '#default_value' => theme_get_setting('circle_js_foundation'),
    '#description'   => t('Link: //cdnjs.cloudflare.com/ajax/libs/foundation/VERSION/js/foundation.min.js'),
  );
  $form['foundation']['circle_js_foundation_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Foundation javaScript version.'),
    '#default_value' => theme_get_setting('circle_js_foundation_version'),
    '#description'   => t('Make sure to include the version you need. Ex.: 4.3.2'),
    '#states' => array(
      'invisible' => array(
       ':input[name="circle_js_foundation"]' => array('checked' => FALSE),
      ),
    ),
  );
  $form['foundation']['circle_css_foundation_local'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Foundation CSS locally.'),
    '#default_value' => theme_get_setting('circle_css_foundation_local'),
    '#description'   => $libraries_exists ? t('File is taken from a locally installed library in libraries folder.') : t('Install and enable !libraries module to use this setting', array('!libraries' => l(t('Libraries'), 'http://drupal.org/project/libraries'))),
    '#disabled' => !$libraries_exists,
  );
  $form['foundation']['circle_js_foundation_local'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add Foundation JavaScript locally.'),
    '#default_value' => theme_get_setting('circle_js_foundation_local'),
    '#description'   => $libraries_exists ? t('File is taken from a locally installed library in libraries folder.') : t('Install and enable !libraries module to use this setting', array('!libraries' => l(t('Libraries'), 'http://drupal.org/project/libraries'))),
    '#disabled' => !$libraries_exists,
  );

  // JavaScript settings.
  $form['js'] = array(
    '#type'        => 'fieldset',
    '#title'       => '<b> &rarr; </b> ' . t('JavaScript Settings'),
    '#collapsible' => TRUE,
    '#collapsed'   => TRUE,
    '#weight'      => -30,
  );
  $form['js']['circle_modernizr'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include modernizr.js'),
    '#default_value' => theme_get_setting('circle_modernizr'),
    '#description'   => t('File is taken from CDN for faster page load.'),
  );
  $form['js']['circle_modernizr_local'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Include modernizr.js locally.'),
    '#default_value' => theme_get_setting('circle_modernizr_local'),
    '#description'   => $libraries_exists ? t('File is taken from a locally installed library in libraries folder.') : t('Install and enable !libraries module to use this setting', array('!libraries' => l(t('Libraries'), 'http://drupal.org/project/libraries'))),
    '#disabled' => !$libraries_exists,
  );
  $form['js']['circle_js_placeholder'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add placeholder support for IE'),
    '#default_value' => theme_get_setting('circle_js_placeholder'),
    '#description'   => t('Placeholder.js official !link.', array('!link' => l('Github page', 'https://github.com/NV/placeholder.js'))),
  );
  $form['js']['circle_js_htmlshiv'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add html5 support for old browsers by CDN'),
    '#default_value' => theme_get_setting('circle_js_htmlshiv'),
    '#description'   => t('html5shiv librarie will be included for that. Link: http://html5shiv.googlecode.com/svn/trunk/html5.js'),
  );
  $form['js']['circle_js_jquerycdn'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use jQuery from CDN.'),
    '#default_value' => theme_get_setting('circle_js_jquerycdn'),
    '#description'   => t('This will improve your page load time for mobile devices. Version of jQuery can be chosen below.'),
  );
  $form['js']['circle_js_jquerycdn_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('jQuery CDN version.'),
    '#default_value' => theme_get_setting('circle_js_jquerycdn_version'),
    '#description'   => t('Write the version number. Ex.: 1.4.4 or 1.8.1'),
    '#states' => array(
      'invisible' => array(
       ':input[name="circle_js_jquerycdn"]' => array('checked' => FALSE),
      ),
    ),
  );
  $form['js']['circle_footer_js'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('!! Place all scripts in footer.'),
    '#default_value' => theme_get_setting('circle_footer_js'),
    '#description'   => t('Force all scripts to the footer, unless they are explicit about being in the header.'),
  );
  $form['js']['circle_js_onefile'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('!! Aggregate all JavaScript into 1 file.'),
    '#default_value' => theme_get_setting('circle_js_onefile'),
    '#description'   => t('This will improve your page load time, but use with care.'),
  );

  // Breadcrumb settings.
  $form['breadcrumb_settings'] = array(
    '#type'        => 'fieldset',
    '#title'       => '<b> &rarr; </b> ' . t('Breadcrumb Settings'),
    '#collapsible' => TRUE,
    '#collapsed'   => TRUE,
    '#weight'      => -25,
  );
  $form['breadcrumb_settings']['breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#default_value' => theme_get_setting('breadcrumb_separator'),
    '#description'   => t('Plain text only. Ex.: » ;'),
  );
  $form['breadcrumb_settings']['breadcrumb_append_current'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_append_current'),
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
  );
  $form['breadcrumb_settings']['breadcrumb_hide_single'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Hide breadcrumb if it only has 1 item'),
    '#default_value' => theme_get_setting('breadcrumb_hide_single'),
    '#description'   => t('It will still print empty breadcrumb wrapper.'),
  );

  // Circle Features.
  $form['circle_features'] = array(
    '#type'        => 'fieldset',
    '#title'       => '<b> &rarr; </b> ' . t('Circle theme Features'),
    '#collapsible' => TRUE,
    '#collapsed'   => TRUE,
    '#weight'      => -10,
  );
  $humans_txt_exists = file_exists(DRUPAL_ROOT . '/humans.txt');
  $form['circle_features']['humanstxt'] = array(
    '#type' => 'checkbox',
    '#title' => t('Link to humans.txt'),
    '#description' => $humans_txt_exists ? t('!alert. This checkbox will allow you to link to it from the page source.', array('!alert' => '<strong>' . t('humans.txt was found') . '</strong>')) : t('!alert. Create a humans.txt in the Drupal root (or not..). Read !link for more info.', array('!alert' => '<strong>' . t('humans.txt is missing') . '</strong>', '!link' => '<a href="http://humanstxt.org/" target="_blank">humanstxt.org</a>')),
    '#disabled' => !$humans_txt_exists,
    '#default_value' => $humans_txt_exists && theme_get_setting('humanstxt'),
  );
  $form['circle_features']['circles_enable_less'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Add LESS Support to theme.'),
    '#default_value' => theme_get_setting('circles_enable_less'),
    '#description'   => t('!!! Do not forget to disable this function on production. Less.js will be added to theme from CDN. To use less files, in your .info file use: stylesheets-less[][] = name.less'),
  );

  $form['#validate'][] = 'circle_validate_libraries';
}

/**
 * Theme settings validation.
 */
function circle_validate_libraries(&$form, &$form_state) {
  $fn_css_checked = isset($form_state['values']['circle_css_foundation_local']) ? $form_state['values']['circle_css_foundation_local'] : 0;
  $fn_js_checked = isset($form_state['values']['circle_js_foundation_local']) ? $form_state['values']['circle_js_foundation_local'] : 0;
  $bs_css_checked = isset($form_state['values']['circle_css_bootstrap_local']) ? $form_state['values']['circle_css_bootstrap_local'] : 0;
  $bs_js_checked = isset($form_state['values']['circle_js_bootstrap_local']) ? $form_state['values']['circle_js_bootstrap_local'] : 0;
  $modernizer_checked = isset($form_state['values']['circle_modernizr_local']) ? $form_state['values']['circle_modernizr_local'] : 0;
  // Check if any libary is enabled.
  $any_library_checked = $fn_css_checked || $fn_js_checked || $bs_css_checked || $bs_js_checked || $modernizer_checked;
  $libraries_exists = module_exists('libraries');

  if ($any_library_checked && $libraries_exists) {
    // Modernizr library check.
    if ($modernizer_checked && !libraries_get_path('modernizr')) {
      form_set_error('circle_modernizr_local', t('Please download Modernizr and insert it into sites/all/libraries/modernizr first, to use it locally.'));
     }
    // Foundation library check.
    if (($fn_css_checked || $fn_js_checked) && !libraries_get_path('foundation'))  {
      form_set_error('circle_css_foundation_local', t('Please download Foundation and insert it into sites/all/libraries/foundation first, to use it locally.'));
    }
    if (($bs_css_checked || $bs_js_checked) && !libraries_get_path('bootstrap'))  {
      form_set_error('circle_css_bootstrap_local', t('Please download Bootstrap and insert it into sites/all/libraries/bootstrap first, to use it locally.'));
    }
  }
  elseif ($any_library_checked && !$libraries_exists) {
    form_set_error('', t('Please download the libraries module if you want to include any components locally.'));
  }
}
