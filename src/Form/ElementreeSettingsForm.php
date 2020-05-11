<?php
/**
 * @file
 * Contains \Drupal\elementree\Form\ElementreeSettingsForm.
 */

namespace Drupal\elementree\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Controller location for Live Weather Settings Form.
 */
class ElementreeSettingsForm extends ConfigFormBase {

  /**
   * Implements \Drupal\Core\Form\FormInterface::getFormID().
   */
  public function getFormId() {
    return 'elementree_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'elementree.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = \Drupal::config('elementree.settings')
                ->get('config');
    
    $form['#tree'] = TRUE;

    $form['settings']['components_js_path'] = array(
      '#type' => 'textarea',
      '#title' => t('Components js path'),
      '#description' => t(''),
      '#default_value' => $config['components_js_path'],
    );

    $form['settings']['components_css_path'] = array(
      '#type' => 'textarea',
      '#title' => t('Components css path'),
      '#description' => t(''),
      '#default_value' => $config['components_css_path'],
    );

    $form['settings']['reset_ssr'] = array(
      '#type' => 'checkbox',
      '#title' => t('Delete server side rendering in browser'),
      '#description' => t(''),
      '#default_value' => $config['reset_ssr'],
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $form_value = $form_state->getValue('settings');

    \Drupal::service('config.factory')
      ->getEditable('elementree.settings')
      ->set('config', $form_value)
      ->save();
  }

}
