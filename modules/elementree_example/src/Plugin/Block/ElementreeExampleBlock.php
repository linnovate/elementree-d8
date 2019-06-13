<?php

namespace Drupal\elementree_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'ElementreeExampleBlock' block.
 *
 * @Block(
 *   id = "elementree_example_block",
 *   admin_label = @Translation("Elementree Example block"),
 *   category = @Translation("Elementree")
 * )
 */
class ElementreeExampleBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['count'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('Count'),
      '#description' => $this->t(''),
      '#default_value' => isset($config['count']) ? $config['count'] : '',
    );

    $form['section_title'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('Section title'),
      '#description' => $this->t(''),
      '#default_value' => isset($config['section_title']) ? $config['section_title'] : '',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('count', $form_state->getValue('count'));
    $this->setConfigurationValue('section_title', $form_state->getValue('section_title'));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $item = elementree_item('MyComponentName', $config);
    // $item['#attached']['library'][] = 'elementree_example/components';
    return $item;
  }
}
