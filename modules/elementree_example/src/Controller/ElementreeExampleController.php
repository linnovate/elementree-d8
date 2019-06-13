<?php

/**
 * @file
 * Contains \Drupal\elementree_example\Controller\ElementreeExampleController.
 */

namespace Drupal\elementree_example\Controller;


use Drupal\Core\Controller\ControllerBase;


/**
 * Provides route responses for the Example module.
 */
class ElementreeExampleController extends ControllerBase {

    /**
     * Returns a simple page.
     *
     * @return array
     *   A simple renderable array.
     */
    public function myPage() {
        $config = [];
        $item = elementree_item('MyPageComponentName', $config);
        // $item['#attached']['library'][] = 'elementree_example/components';
        return $item;
    }
}