<?php
/**
 * @file
 * Contains \Drupal\elementree\Plugin\Block\DanHotelsRoomListBlock.
 */
namespace Drupal\elementree\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'ElementreeBlock' block.
 *
 * @Block(
 *   id = "elementree_block",
 *   admin_label = @Translation("Elementree block"),
 *   category = @Translation("Elementree")
 * )
 */
class ElementreeBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['component_name'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('Component name'),
      '#description' => $this->t(''),
      '#default_value' => isset($config['component_name']) ? $config['component_name'] : '',
    );

    $form['props'] = array (
      '#type' => 'textarea',
      '#title' => $this->t('Props'),
      '#description' => $this->t(''),
      '#default_value' => isset($config['props']) ? $config['props'] : '',
      '#format' => 'full_html',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('component_name', $form_state->getValue('component_name'));
    $this->setConfigurationValue('props', $form_state->getValue('props'));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    return elementree_item($config['component_name'], $config['props']);
  }
}
